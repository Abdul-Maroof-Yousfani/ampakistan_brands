<?php $__env->startSection('content'); ?>
<?php
use App\Helpers\CommonHelper;
$so_no = CommonHelper::generateUniquePosNo('production_work_order', 'work_no', 'WO');
?>
<div class="row well_N align-items-center">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <ul class="cus-ul">
            <li>
                <h1>Finance</h1>
            </li>
            <li>
                <h3><span class="glyphicon glyphicon-chevron-right"></span> &nbsp; Debit Note</h3>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <!-- LEFT SIDE FORM -->
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="well_N dp_sdw">
            <form method="POST" id="submitForm">
            <div class="panel">
                <div class="panel-body">
                    <div class="headquid">
                        <h2 class="subHeadingLabelClass">Create Debit Note</h2>
                    </div>

                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="row qout-h">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stores</label>
                                    <select name="store" onchange="getData()" id="ClientId" class="form-control select2">
                                        <option value="">Select Store</option>
                                        <?php $__currentLoopData = \App\Helpers\CommonHelper::get_customer(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($customer->id); ?>" <?php echo e(old('store') == $customer->id ? "selected" : ""); ?>><?php echo e($customer->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Delivery Man</label>
                                    <input type="text" class="form-control" name="delivery_man" value="<?php echo e(old('delivery_man')); ?>" placeholder="-">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date Time</label>
                                    <input type="date" class="form-control" name="date_and_time" value="<?php echo e(old("date_and_time")); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" value="-" class="form-control" name="amount">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea class="form-control" name="details"><?php echo e(old("details")); ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label>Credit</label>
                                    <select class="form-control select2" name="credit">
                                        <option value="">Select Credit</option>
                                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($y->id); ?>">
                                                <?php echo e($y->code .' ---- '. $y->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            

                            <div class="col-md-6">
                                <div class="form-group d-flex align-items-center">
                                    <label class="me-2">On Record</label>
                                    <input type="checkbox" name="on_record">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Type</label>
                                    <select class="form-control select2" name="voucher_type">
                                        <option value="">Select Voucher Type</option>
                                        <?php $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($voucher->id); ?>"><?php echo e($voucher->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Branch</label>
                                    <select class="form-control select2" name="branch">
                                        <option value="">Select Branch</option>
                                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->branch_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12" style="margin-top: 30px; padding-left: 0px; width: 100%;" id="receipt-table"></div>
                <div class="col-md-12" style="margin-top: 30px; padding-left: 0px;">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Issue Voucher</button>
                </div>
            </form>
            </div>
    </div>

    <!-- RIGHT SIDE PANELS -->
    <div class="col-lg-4 col-md-4 col-sm-12" style="display: none;">
        <div class="d-flex flex-column gap-3">
            
            <!-- Pending Invoices -->
            <div class="panel panel-default shadow-sm" style="border-radius:10px; overflow:hidden;">
                <div class="panel-heading text-white" style="background-color:#007bff; padding:10px 15px;">
                    <strong>PENDING INVOICES (PARTIAL PAYMENT)</strong>
                </div>
                <div class="panel-body" style="background-color:#f8f9fa;">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-condensed mb-0" id="table">
                            
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pending Debit Note -->
            

        </div>
    </div>
</div>


<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>


function issue() {
    console.log($("#submitReceipt"));
    $("#submitReceipt").trigger("submit");
}

// 🔹 Event binding
// $(document).on("submit", "#submitReceipt", function(e) {
//     e.preventDefault(); // stop reload

//     issueVoucher(this); // ✅ 'this' is the actual <form> element
// });
</script>

<script>
    
    var  temp = [];
    // document.getElementById("submitForm").addEventListener("submit", function(event) {
    //     const receiptTable = $("#receipt-table");
    //     if (!receiptTable.children().length) {
    //         event.preventDefault(); 
    //         alert("Enter at least one invoice");
    //     }
    // });
    $(document).on("click", "#receiptCreate", function() {
        receiptData(temp);
    });
    
     function CheckUncheck(Counter,Id)
        {
            if($("input:checkbox:checked").length > 0)
            {

            }
            else
            {
                temp = [];
            }
            $('.AllCheckbox').each(function()
            {

                if ($(this).is(':checked'))
                {
                    $('.BtnSub'+Id).prop('disabled',false);

                }
                else
                {
                    $('.BtnSub'+Id).prop('disabled',true);
                    //temp =[];
                }

            });


            $(".AddRemoveClass"+Id).each(function() {
                if ($(this).is(':checked')) {
                    var checked = ($(this).attr('value'));
                    temp.push(checked);

                    // if(temp.indexOf(checked))
                    // {
                    //     if ($(this).is(':checked')) {
                    //         alert('Please Checked Same Client and then Create Receipt...!');
                    //         $(this).prop("checked", false);
                    //         $('.BtnSub'+Id).prop("disabled", true);
                    //     }
                    // }
                    // else
                    // {
                    //     $('.BtnSub'+Id).prop("disabled", false);
                    // }
                }
                else
                {

                }
            });



        }

    function receiptData() {
        $('#ShowHide').html('<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="loader"></div></div></div>');
        let checkedValues = $('.AllCheckbox[type="checkbox"]:checked')
                .map(function() {
                    return $(this).val();
                })
                .get();
        $.ajax({
            url: '<?php echo e(url('/debitNote/customer/showReceipt')); ?>',
            type: 'Get',
            data: {checkbox: temp},

            success: function (response) {
                $('#receipt-table').html(response);
            }
        });
    }
    function getData() {
        var ClientId = $('#ClientId').val();

        var m = 1;
        $('#ShowHide').html('<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="loader"></div></div></div>');

        $.ajax({
            url: '<?php echo e(url('/sdc/getRecieptDataClientWise/create')); ?>',
            type: 'Get',
            data: {ClientId: ClientId,m:m},

            success: function (response) {
                $('#table').html(response);
            }
        });
    }
</script>

<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Select an option",
        allowClear: true,
        width: '100%'
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>