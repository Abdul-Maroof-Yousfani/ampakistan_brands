<div class="row align-items-center ">
    <div class="col-md-6">
        <h3 style="font-weight: bold;text-transform: uppercase">List of Barcode/Qr Code</h3>
    </div>

    <div class="col-md-6 text-right">
        <input type="hidden" id="voucherItemQty" value="{{$voucherItemCount}}">
            <button class="btn-primary">Document QTY : <span class="voucher_qty">{{$voucherItemCount}}</span></button>
            <button class="btn-{{count($barcode) == $voucherItemCount ? 'success' : 'danger'}}">Barcode Scanned : <span class="voucher_qty scanned">{{count($barcode)}}</span></button>
            <button class="btn-warning">Remaining for Scanning : <span class="voucher_qty remaining_qty">{{$voucherItemCount-count($barcode)}}</span></button>
    </div>
</div>
<table class="table table-bordered sf-table-list">
    <thead >
    <tr class="text-center">
        <th class="text-center">S.no</th>
        <th class="text-center">Barcode / QR Code</th>
        <th class="text-center">Product</th>
        <th class="text-center">Document No</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($stockbarcode as $key => $sb)
        <tr id="barcode-{{ $sb->id }}">
            <td>{{$key+1}}</td>
            <td>{{$sb->barcode}}</td>

            <td>{{$sb->product_name}}</td>
            <td class="text-uppercase">{{$sb->voucher_no}}</td>
            <td>
                <button class="btn btn-danger btn-xs" onclick="deleteBarcode('{{ $sb->id }}', '{{ $sb->barcode }}')">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
<div id="paginationLinks">
    {{ $stockbarcode->links() }}
</div>


<script>
    // Pass the barcode array from PHP to JavaScript
    var existingBarcodes = @json($barcode); // Use this variable in jQuery or localStorage

    // Optionally, you can store it in localStorage for later use
    localStorage.setItem('existingBarcodes', JSON.stringify(existingBarcodes));

    function deleteBarcode(id, barcode) {
        if (!confirm('Are you sure you want to delete this barcode?')) {
            return;
        }

        $.ajax({
            url: '{{ url("purchase/stockBarcode") }}/' + id,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            },
            dataType: 'json',
            success: function(response) {
                $(`#barcode-${id}`).remove();
                existingBarcodes = existingBarcodes.filter(barcodeValue => barcodeValue != barcode);
                localStorage.setItem('existingBarcodes', JSON.stringify(existingBarcodes));

                var totalQty = parseInt($('#voucherItemQty').val()) || 0;
                var scannedQty = existingBarcodes.length;
                var remainingQty = totalQty - scannedQty;

                $(".scanned").text(scannedQty);
                $(".remaining_qty").text(remainingQty);

                // Update list badges color
                var $scannedBtn = $(".scanned").closest('button');
                if (scannedQty === totalQty) {
                    $scannedBtn.removeClass('btn-danger').addClass('btn-success');
                } else {
                    $scannedBtn.removeClass('btn-success').addClass('btn-danger');
                }

                // Synchronize with the main GRN form table if rowId is available
                var rowId = '{{ $rowId ?? "" }}';
                if (rowId) {
                    $('#barcodeCountRow' + rowId).text(' (' + scannedQty + ')');
                    var $parentBtn = $('#barcodeCountRow' + rowId).closest('button');
                    if (remainingQty === 0) {
                        $parentBtn.removeClass('btn-info').addClass('btn-success');
                    } else {
                        $parentBtn.removeClass('btn-success').addClass('btn-info');
                    }
                }
                
                console.log('Success:', response);
            },
            error: function(xhr, status, error) {
                var errorMessage = "Error deleting barcode.";
                if (xhr.responseJSON && typeof xhr.responseJSON === 'string') {
                    errorMessage = xhr.responseJSON;
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                alert(errorMessage);
            }
        });
    }

</script>
