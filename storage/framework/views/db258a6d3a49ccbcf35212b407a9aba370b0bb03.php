<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Stock List'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="row d-flex justify-content-between">
                <div class="col-md-10">
                    <form action="<?php echo e(route('admin.product.stock.search')); ?>" method="get">
                        <div class="row">
                            <div class="col-md-3 ">
                                <div class="form-group">
                                    <input type="text" name="product_name" value="<?php echo e(@request()->product_name); ?>"
                                        class="form-control get-trx-id" placeholder="<?php echo app('translator')->get('Search Product'); ?>">
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

                <div class="col-md-2">
                    <div class="media mb-4 float-right">
                        <a href="<?php echo e(route('admin.product.stock.create')); ?>" class="btn btn-sm btn-primary mr-2">
                            <span><i class="fa fa-plus-circle"></i> <?php echo app('translator')->get('Add New'); ?></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><?php echo app('translator')->get('Product Name'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Quantity'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $productStock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Product'); ?>">
                                    <div class="d-lg-flex d-block align-items-center">
                                        <div class="mr-3"><img
                                                src="<?php echo e(getFile(config('location.product.path_thumbnail') . optional($stock->getProduct)->thumbnail_image)); ?>"
                                                alt="user" class="rounded-circle" width="45" height="45"></div>
                                        <div class="">
                                            <p class="text-secondary mb-0"><?php echo app('translator')->get(optional(optional($stock->getProduct)->details)->product_name); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Quantity'); ?>"> <?php echo e($stock->qty); ?></td>

                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <a href="<?php echo e(route('admin.product.stock.edit', $stock->product_id)); ?>"
                                        class="btn btn-sm btn-primary edit-button text-white">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
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
            <?php echo e($productStock->links('partials.pagination')); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/admin/product_stock/list.blade.php ENDPATH**/ ?>