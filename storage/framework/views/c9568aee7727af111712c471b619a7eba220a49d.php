       <?php
       
       use App\Helpers\CommonHelper;
       use App\Helpers\ReuseableCode;
       $edit = ReuseableCode::check_rights(291);
       $delete = ReuseableCode::check_rights(292);
       ?>






       <table id="table" class="table table-bordered">
           <thead>
               <th class="text-center">S.No</th>
               <th class="text-center">System Code</th>
               <th class="text-center">Creation Date</th>
               <th class="text-center">Product BarCode</th>
               <th class="text-center">SKU Code</th>
               <th class="text-center hide">Uom</th>
               <th class="text-center hide">Hs Code Id</th>
               <!-- <th class="text-center hide">Brand</th> -->
               <th class="text-center">Product Name</th>
               <th class="text-center">Product Type</th>
               <th class="text-center hide">Product Description
               </th>
               <th class="text-center hide">Packing</th>
               <th class="text-center hide">Product BarCode
               </th>
               <th class="text-center hide">Group</th>
               <th class="text-center hide">Product
                   Classification</th>
               <th class="text-center hide">Product Type</th>
               <th class="text-center hide">Product Trend</th>
               <th class="text-center hide">Purchase Price</th>
               <th class="text-center">Brand Name</th>
               <th class="text-center">Sale Price</th>
               <th class="text-center">MRP Price</th>
               <th class="text-center hide">Is Tax Apply</th>
               <th class="text-center hide">Tax Type Id</th>
               <th class="text-center hide">Tax Applied On</th>
               <th class="text-center hide">Tax Policy</th>
               <th class="text-center hide">Tax</th>
               <th class="text-center hide">Flat Discount</th>
               <th class="text-center hide">Min Qty</th>
               <th class="text-center hide">Max Qty</th>
               <th class="text-center hide">Locality</th>
               <th class="text-center hide">Origin</th>
               <th class="text-center hide">Color</th>
               <th class="text-center hide">Product Status</th>
               <th class="text-center">Action</th>
           </thead>
           <tbody id="viewSubItemList">



               <?php $__currentLoopData = $subitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr id="RemoveTr<?php echo e($row->id); ?>" title="<?php echo e($row->id); ?>">
                       <td class="text-center"><?php echo e($loop->iteration); ?></td>
                       <td class="text-center"><?php echo e($row->sys_no); ?></td>
                       <td class="text-center"><?php echo e(\Carbon\Carbon::parse($row->date)->format('d-M-Y')); ?></td>
                       <td><?php echo e($row->product_barcode); ?></td>
                       <td><?php echo e($row->sku_code); ?></td>
                       <td><?php echo e($row->product_name); ?></td>
                       <td><?php echo e(\App\Helpers\CommonHelper::get_product_type_by_id_subitem($row->id)); ?></td>
                       <td><?php echo e($row->brand_name); ?></td>
                       <td class="hide"><?php echo e($row->purchase_price); ?></td>
                       <td><?php echo e($row->sale_price); ?></td>
                       <td><?php echo e($row->mrp_price); ?></td>
                       <td class="hide"><?php echo e($row->min_qty); ?></td>
                       <td class="hide"><?php echo e($row->max_qty); ?></td>
                       <td class="text-center hide"><?php echo e($row->stock_count); ?></td>
                       <td class="text-center">
                           <div class="dropdown">
                               <button class="drop-bt dropdown-toggle" type="button" data-toggle="dropdown"
                                   aria-expanded="false">
                                   <i class="fa-solid fa-ellipsis-vertical"></i>
                               </button>
                               <ul class="dropdown-menu">
                                   <li>
                                       <a onclick="showDetailModelOneParamerter('purchase/viewSubItemForm','<?php echo e($row->id); ?>','viewSubItemForm','1','')"
                                           class="dropdown-item_sale_order_list dropdown-item">
                                           <i class="fa-regular fa-eye"></i> View
                                       </a>
                                       <?php if($edit): ?>
                                           <a class="edit-modal dropdown-item_sale_order_list dropdown-item"
                                               href="<?php echo e(url('purchase/editSubItemForm?id=' . $row->id)); ?>">
                                               <i class="fa-solid fa-pencil"></i> Edit
                                           </a>
                                       <?php endif; ?>
                                       <?php if($delete): ?>
                                           <a class="delete-modal dropdown-item_sale_order_list dropdown-item"
                                               href="<?php echo e(url('purchase/deleteSubItemRecord?id=' . $row->id . '&m=' . Session::get('run_company'))); ?>">
                                               <i class="fa-solid fa-trash"></i> Delete
                                           </a>
                                       <?php endif; ?>
                                   </li>
                               </ul>
                           </div>
                       </td>
                       <td class="hide">
                           <select name="item[]">
                               <option value="1,<?php echo e($row->id); ?>" <?php echo e($row->finish_good == 1 ? 'selected' : ''); ?>>
                                   Yes</option>
                               <option value="0,<?php echo e($row->id); ?>" <?php echo e($row->finish_good == 0 ? 'selected' : ''); ?>>No
                               </option>
                           </select>
                       </td>
                   </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           </tbody>
       </table>
       <div class="row d-flex" id="paginationLinks">
           <div class="col-md-6">
               <p> Showing <?php echo e($subitems->firstItem()); ?> to <?php echo e($subitems->lastItem()); ?> of <?php echo e($subitems->total()); ?>

                   entries</p>
           </div>
           <div class="col-md-6 text-right">
               <div id="">
                   <?php echo e($subitems->links()); ?>

               </div>
           </div>
       </div>
