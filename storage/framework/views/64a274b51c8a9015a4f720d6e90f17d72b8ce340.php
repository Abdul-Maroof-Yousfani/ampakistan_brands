<?php $__env->startSection('content'); ?>
<?php echo $__env->make('select2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row well_N align-items-center">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <ul class="cus-ul">
                <li>
                    <h1>Sale</h1>
                </li>
                <li>
                    <h3><span class="glyphicon glyphicon-chevron-right"></span> &nbsp; Sale Order List</h3>
                </li>
            </ul>
        </div>

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-right">

            <ul class="cus-ul2">
                <li>
                    <a href="<?php echo e(route('createSaleOrder')); ?>" class="btn btn-primary">Create New Sale Order</a>
                </li>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right" style="margin-top: 40px;">
                    <?php if(true):?>
                        <a id="dlink" style="display:none;"></a>
                        <button type="button" class="btn btn-warning" onclick="ExportToExcel('xlsx')">Export <b>(xlsx)</b></button>
                    <?php endif;?>
                </div>
                
                
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="well_N">
                <div class="dp_sdw2">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="panel">
                                <div class="panel-body">

                                    <div class="row">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form id="filterForm">
                                                <div class="row " style="display: none;">
                                                    <div class="col-md-1 mb-3">
                                                        <label for="customers" class="form-label">Show Entries</label>
                                                        <select name="per_page" class="form-control">
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                            <option value="1000">1000</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-11 mb-3 ">
                                                        <div class="row justify-content-end text-right">
                                                            <div class="col-md-2 mb-3">
                                                                <label>User </label>
                                                                <select name="username[]" multiple class="form-control select2">
                                                                    <option disabled>Select User</option>
                                                                    <?php $__currentLoopData = $username; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($item->username); ?>"><?php echo e($item->username); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2 mb-3">
                                                                <label>Date</label>
                                                                <input type="date" name="date" class="form-control" />
                                                            </div>
                                                            <div class="col-md-2 mb-3">
                                                                <label for="customers" class="form-label">Status</label>
                                                                <select name="status" class="form-control">
                                                                    <option value="">All</option>
                                                                    <option value="1">Approved</option>
                                                                    <option value="0">Pending</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="customers" class="form-label">Search</label>
                                                                <input type="text" class="form-control" id="search"
                                                                    placeholder="Search by Doc No or Customer"
                                                                    name="search" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <div id="filteredData">
                                                <div class="text-center spinnerparent">
                                                    <div class="loader" role="status"></div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo e(URL::asset('assets/custom/js/exportToExcelXlsx.js')); ?>"></script>
    <script !src="">
        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('filteredData');
            var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                    XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
                    XLSX.writeFile(wb, fn || ('Sale Report <?php echo date('d-m-Y')?>.' + (type || 'xlsx')));
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            filterationCommonGlobal('<?php echo e(route('getlistSaleOrder')); ?>');
        });



$(document).ready(function() {
    let saleOrderId = localStorage.getItem("showSaleOrderId");
    let route = localStorage.getItem("showSaleOrderRoute");

    if (saleOrderId && route) {
        showDetailModelOneParamerter(route, saleOrderId, 'View Sale Order');
        // clear after use
        localStorage.removeItem("showSaleOrderId");
        localStorage.removeItem("showSaleOrderRoute");
    }
});



    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>