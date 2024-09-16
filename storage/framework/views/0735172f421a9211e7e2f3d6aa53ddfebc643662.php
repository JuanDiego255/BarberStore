<?php $__env->startSection('title',trans('My Profile')); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div class="search-bar">
                    <form action="<?php echo e(route('user.search.plan')); ?>" method="get">
                        <div class="row g-3 align-items-end">
                            <div class="input-box col-lg-2">
                                <label for=""><?php echo app('translator')->get('Plan Name'); ?></label>
                                <select class="form-select" name="plan_id" aria-label="Default select example">
                                    <option value=""><?php echo app('translator')->get('All Plans'); ?></option>
                                    <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option
                                            value="<?php echo e($plan->id); ?>" <?php echo e(@request()->plan_id == $plan->id ? 'selected' : ''); ?>><?php echo app('translator')->get($plan->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="input-box col-lg-2">
                                <label for=""><?php echo app('translator')->get('Purchase Date'); ?></label>
                                <input type="text" class="form-select flatpickr" name="purchase_date"
                                       value="<?php echo e(@request()->purchase_date); ?>" autocomplete="off">
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
                            <th scope="col"><?php echo app('translator')->get('Plan Name'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Price'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Purchase Date'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $myPlanPurchase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="SL No."><?php echo e($loop->index + 1); ?></td>
                                <td data-label="Plan Name">
                                    <?php echo app('translator')->get(optional($data->plans)->name); ?>
                                </td>
                                <td data-label="Price">
                                    <?php echo app('translator')->get(config('basic.currency_symbol')); ?>
                                    <?php echo e(optional($data->plans)->price); ?>

                                </td>
                                <td data-label="Purchase Date"><?php echo e(dateTime($data->purchase_date, 'd M Y')); ?></td>
                                <td data-label="Date Of Appointment">
                                    <?php if(optional($data->bookAppointment)->date_of_appointment): ?>
                                        <span class="badge bg-danger"><?php echo app('translator')->get('Given'); ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-warning"><?php echo app('translator')->get('Not yet'); ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td class="text-center text-danger" colspan="100%"><?php echo app('translator')->get('No Found Data'); ?></td>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
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

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/user/my_plan.blade.php ENDPATH**/ ?>