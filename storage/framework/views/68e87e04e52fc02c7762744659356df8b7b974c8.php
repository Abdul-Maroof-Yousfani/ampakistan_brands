<?php
use App\Helpers\CommonHelper;
use App\Helpers\ReuseableCode;
$export=ReuseableCode::check_rights(240);
        $ItemId = "";
        $ItemName = "";
if(isset($_GET['item_id']))
    {
        $ItemId = $_GET['item_id'];
        $ItemName = CommonHelper::get_item_name($ItemId);
    }
    else{
        $ItemId = "";
        $ItemName = "";
    }

?>
<?php use App\Helpers\PurchaseHelper; ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('select2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <style>
        element.style {
            width: 183px;
        }
    </style>


    <div class="container-fluid">
    <div class="well_N">
        <div class="dp_sdw">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                <?php echo CommonHelper::displayPrintButtonInBlade('printDemandVoucherList','','1');?>
                <?php if($export == true):?>
                    <a id="dlink" style="display:none;"></a>
                    <button type="button" class="btn btn-warning" onclick="ExportToExcel('xlsx')">Export <b>(xlsx)</b></button>
                <?php endif;?>
            </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group ">
                        <label for="email">Category <span style="color: red">*</span></label>
                        <select onchange="get_sub_item('category_id1')" name="category" id="category_id1"  class="form-control category select2 normal_width">
                            <option value="select">Select</option>
                           <?php $__currentLoopData = CommonHelper::get_all_category(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>:
                            <option value="<?php echo e($category->id); ?>"> <?php echo e($category->main_ic); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group ">
                        <label for="email">Sub Item <span style="color: red">*</span></label>
                <select name="item_id[]" id="item_id1" class="form-control select2">
                    <option>Select</option>
                </select>
                    </div>

        </div>


     

            

      

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div>&nbsp;</div>
                <button type="button" class="btn btn-sm btn-primary" style="margin: 5px 0px 0px px;" onclick="BookDayList();">Submit</button>
                </div>

            </div>

        






            <div id="printBankReceiptVoucherList">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel">
                            <div class="panel-body">
                                <?php //echo CommonHelper::headerPrintSectionInPrintView($m);?>
                                <?php echo CommonHelper::displayPrintButtonInBlade('filterBookDayList','HrefHide','1');?>
                                <?php //echo CommonHelper::displayExportButton('EmpExitInterviewList','','1')?>
                                <div id="filterBookDayList"></div>

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
            var elt = document.getElementById('data');
            var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                    XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
                    XLSX.writeFile(wb, fn || ('Stock Report <?php echo date('d-m-Y')?>.' + (type || 'xlsx')));
        }
    </script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });

    function subItemListLoadDepandentCategoryId(id,value) {
        //alert(id+' --- '+value);
        var arr = id.split('_');
        var m = '<?php echo $_GET['m'];?>';
        $.ajax({
            url: '<?php echo url('/')?>/pmfal/subItemListLoadDepandentCategoryId',
            type: "GET",
            data: { id:id,m:m,value:value},
            success:function(data) {
                $('#sub_item_id_'+arr[2]+'_'+arr[3]+'').html(data);
            }
        });
    }

</script>


<script>
    $(document).ready(function(){
        var ItemId = '<?php echo $ItemId?>';
        if(ItemId !="")
        {
            BookDayList();
        }
    });

    function BookDayList(){
        var location = $('#location').val();
        var category = $('#category_id1').val();

        var sub_1 = $('#item_id1').val();
        var item_des = $('#item_des').val();
        var m = '<?php echo $_GET['m']?>';
        $('#filterBookDayList').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="loader"></div></div>');

        $.ajax({
            url: '<?php echo url('/')?>/pdc/get_stock_region_wise',
            method:'GET',
            data:{location:location, category:category,  m:m,sub_1:sub_1,item_des:item_des},
            error: function(){
                alert('error');

            },
            success: function(response){
                $('#filterBookDayList').html(response);
            }
        });
        //}
    }


    $('.sam_jass').bind("enterKey",function(e){


        $('#items').modal('show');
        e.preventDefault();

    });
    $('.sam_jass').keyup(function(e){
        if(e.keyCode == 13)
        {
            selected_id=this.id;
            $(this).trigger("enterKey");
            e.preventDefault();

        }

    });


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>