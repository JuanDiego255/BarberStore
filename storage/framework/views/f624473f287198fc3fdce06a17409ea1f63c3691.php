<?php $__env->startSection('title',trans('My Profile')); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div class="search-bar">
                    <form action="<?php echo e(route('user.transaction.search')); ?>" method="get">
                        <div class="row g-3 align-items-end">
                            <div class="input-box col-lg-2">
                                <label for=""><?php echo app('translator')->get('Transaction Id'); ?></label>
                                <input type="text" class="form-control" name="transaction_id"
                                       placeholder="<?php echo app('translator')->get('Transaction Id'); ?>" value="<?php echo e(@request()->transaction_id); ?>"
                                       autocomplete="off">
                            </div>
                            <div class="input-box col-lg-2">
                                <label for=""><?php echo app('translator')->get('Remarks'); ?></label>
                                <input type="text" class="form-control" name="remarks" placeholder="<?php echo app('translator')->get('Remarks'); ?>"
                                       value="<?php echo e(@request()->remarks); ?>" autocomplete="off">
                            </div>
                            <div class="input-box col-lg-2">
                                <label for=""><?php echo app('translator')->get('Date'); ?></label>
                                <input type="text" class="form-select flatpickr" name="datetrx"
                                       placeholder="<?php echo app('translator')->get('Date'); ?>" value="<?php echo e(@request()->datetrx); ?>" autocomplete="off">
                            </div>
                            <div class="input-box col-lg-2">
                                <button class="btn-custom w-100"><i class="fal fa-search"></i> <?php echo app('translator')->get('Search'); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="table-parent table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo app('translator')->get('SL No.'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Transaction ID'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Remark'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Date'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="SL No."><?php echo e($loop->index + 1); ?></td>
                                <td data-label="TRX">
                                    <?php echo e($data->trx_id); ?>

                                </td>
                                <td data-label="Amount">
                                    <?php echo app('translator')->get(config('basic.currency_symbol')); ?>
                                    <?php echo e($data->amount); ?>

                                </td>
                                <td data-label="Remarks">
                                    <?php echo app('translator')->get($data->remarks); ?>
                                </td>
                                <td data-label="Status">
                                    <?php echo e(dateTime($data->created_at, 'd M Y')); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td class="text-center text-danger" colspan="100%"><?php echo app('translator')->get('No Found Data'); ?></td>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php echo e($transactions->links('partials.pagination')); ?>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        $(".flatpickr").flatpickr();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/user/my_transaction.blade.php ENDPATH**/ ?>