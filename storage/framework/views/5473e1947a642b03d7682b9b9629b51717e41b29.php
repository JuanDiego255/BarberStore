<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Product List'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-2 pt-4 pl-4 shadow">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="<?php echo e(route('admin.product.search')); ?>" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="product_name" value="<?php echo e(@request()->product_name); ?>"
                                    class="form-control get-trx-id" placeholder="<?php echo app('translator')->get('Search for Product '); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="product_category" value="<?php echo e(@request()->product_category); ?>"
                                    class="form-control get-username" placeholder="<?php echo app('translator')->get('Search Category'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn waves-effect waves-light btn-primary"><i
                                        class="fas fa-search"></i> <?php echo app('translator')->get('Search'); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="media mb-4 float-right">
                <a href="<?php echo e(route('admin.product.create')); ?>" class="btn btn-sm btn-primary mr-2">
                    <span><i class="fa fa-plus-circle"></i> <?php echo app('translator')->get('Add New'); ?></span>
                </a>
            </div>
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><?php echo app('translator')->get('SL No.'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Product'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Category'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Price'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Stock'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('SL No.'); ?>"><?php echo e($loop->index + 1); ?></td>
                                <td data-label="<?php echo app('translator')->get('Product'); ?>">
                                    <a
                                        href="<?php echo e(route('product.details', [slug(optional($item->details)->product_name), $item->id])); ?>">
                                        <div class="d-lg-flex d-block align-items-center">
                                            <div class="mr-3"><img
                                                    src="<?php echo e(getFile(config('location.product.path_thumbnail') . $item->thumbnail_image)); ?>"
                                                    alt="user" class="rounded-circle" width="45" height="45">
                                            </div>
                                            <div class="">
                                                <p class="text-secondary mb-0"><?php echo app('translator')->get(optional($item->details)->product_name); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Category'); ?>">
                                    <?php echo app('translator')->get(optional(optional($item->category)->details)->name); ?>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Price'); ?>">
                                    <?php echo app('translator')->get(config('basic.currency_symbol')); ?>
                                    <?php echo app('translator')->get($item->price); ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Stock'); ?>">
                                    <?php echo e($item->stock_total ?? 'N/A'); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <a href="<?php echo e(route('admin.product.edit', $item->id)); ?>"
                                        class="btn btn-sm btn-primary edit-button text-white">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-route="<?php echo e(route('admin.product.delete', $item->id)); ?>"
                                        data-toggle="modal" data-target="#delete-modal"
                                        class="btn btn-danger btn-sm notiflix-confirm"><i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="100%"><?php echo app('translator')->get('No Data Found'); ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel"><?php echo app('translator')->get('Delete Confirmation'); ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo app('translator')->get('Are you sure to delete this?'); ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    <form action="" method="post" class="deleteRoute">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Yes'); ?></button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
    <?php if($errors->any()): ?>
        <?php
            $collection = collect($errors->all());
            $errors = $collection->unique();
        ?>
        <script>
            "use strict";
            <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                Notiflix.Notify.Failure("<?php echo e(trans($error)); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php endif; ?>

    <script>
        'use strict'
        $(document).ready(function() {
            $('.notiflix-confirm').on('click', function() {
                var route = $(this).data('route');
                $('.deleteRoute').attr('action', route)
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/admin/products/list.blade.php ENDPATH**/ ?>