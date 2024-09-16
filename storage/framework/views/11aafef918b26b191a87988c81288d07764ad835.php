<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Book Appointment List'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-2 pt-4 pl-4 shadow">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="<?php echo e(route('admin.search.plan.sold')); ?>" method="get">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="plan_id">
                                    <option value=""><?php echo app('translator')->get('All Plans'); ?></option>
                                    <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($plan->id); ?>"
                                            <?php echo e(@request()->plan_id == $plan->id ? 'selected' : ''); ?>><?php echo app('translator')->get($plan->name); ?>
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="user_name" value="<?php echo e(@request()->user_name); ?>"
                                       class="form-control" placeholder="<?php echo app('translator')->get('User Name'); ?>">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="email" value="<?php echo e(@request()->email); ?>" class="form-control"
                                       placeholder="<?php echo app('translator')->get('Email'); ?>">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date" value="<?php echo e(@request()->date); ?>"
                                       id="datepicker"/>
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
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><?php echo app('translator')->get('Plan Name'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('User Name'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Purchase Date'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Date Of Appointment'); ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $plan_sold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="">
                            <td data-label="<?php echo app('translator')->get('Plan Name'); ?>">
                                <?php echo app('translator')->get(optional($item->plans)->name); ?>
                            </td>
                            <td>
                                <div class="d-lg-flex d-block align-items-center ">
                                    <div class="mr-3"><img
                                            src="<?php echo e(getFile(config('location.user.path') . optional($item->users)->image)); ?>"
                                            alt="user" class="rounded-circle" width="45" height="45"></div>
                                    <div class="">
                                        <h6 class="text-dark mb-0 font-16 font-weight-medium"><?php echo app('translator')->get(optional($item->users)->username); ?></h6>
                                        <span class="text-muted font-14"><?php echo app('translator')->get(optional($item->users)->email); ?></span>
                                    </div>
                                </div>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Purchase Date'); ?>">
                                <?php echo app('translator')->get(dateTime($item->purchase_date, 'd M Y')); ?>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Date Of Appointment'); ?>">
                                <?php if(optional($item->bookAppointment)->date_of_appointment): ?>
                                    <span class="badge badge-success">Given</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">Not yet</span>
                                <?php endif; ?>
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
            <?php echo e($plan_sold->links('partials.pagination')); ?>

        </div>
    </div>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/admin/plan_sold/plan_list.blade.php ENDPATH**/ ?>