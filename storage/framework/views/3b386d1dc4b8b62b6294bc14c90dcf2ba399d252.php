<?php $__env->startSection('title', trans('Dashboard')); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div class="dashboard-heading mt-2">
                    <h2 class="mb-0"><?php echo app('translator')->get('Dashboard'); ?></h2>
                </div>
                <?php if($planOfServices > 0): ?>
                <div class="bd-callout bd-callout-warning m-0 my-4 m-md-0 ">
                    <i class="fas fa-info-circle mr-2"></i>
                    <?php echo app('translator')->get("You have purchased $planOfServices plans"); ?>. <?php echo app('translator')->get('To get all the facilities of your plans.'); ?>
                    <span class="text-dark">
                        <a class="text-dark" href="<?php echo e(route('user.my.appointment')); ?>"><?php echo app('translator')->get('Make Appointment'); ?></a>
                    </span>
                </div>
                <?php endif; ?>
                <div class="dashboard-box-wrapper mt-3">
                    <div class="row g-4 mb-4">
                        <?php if (\Illuminate\Support\Facades\Blade::check('plan')): ?>
                        <div class="col-xl-3 col-md-6 box">
                            <div class="dashboard-box">
                                <h4><?php echo app('translator')->get('Purchase Plan'); ?></h4>
                                <h3><?php echo e($planCount); ?></h3>
                                <i class="fa-thin fa-list"></i>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-xl-3 col-md-6 box">
                            <div class="dashboard-box">
                                <h4><?php echo app('translator')->get('Total Wishlist'); ?></h4>
                                <h3><?php echo e($wishlistCount); ?></h3>
                                <i class="fa-sharp fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <?php if (\Illuminate\Support\Facades\Blade::check('shop')): ?>
                        <div class="col-xl-3 col-md-6 box">
                            <div class="dashboard-box">
                                <h4><?php echo app('translator')->get('Total Order'); ?></h4>
                                <h3><?php echo e($orderCount); ?></h3>
                                <i class="fa-thin fa-cart-plus"></i>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (\Illuminate\Support\Facades\Blade::check('bookAppointment')): ?>
                        <div class="col-xl-3 col-md-6 box">
                            <div class="dashboard-box">
                                <h4><?php echo app('translator')->get('Total Appointment'); ?></h4>
                                <h3><?php echo e($appointmentCount); ?></h3>
                                <i class="fa-thin fa-calendar-check"></i>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="calender">
        <div class="container-fluid">
            <div class="main row gy-5">
                <?php if (\Illuminate\Support\Facades\Blade::check('bookAppointment')): ?>
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo app('translator')->get('Upcoming Appointment'); ?></h4>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if (\Illuminate\Support\Facades\Blade::check('shop')): ?>
                <div class="col-lg-6">
                    <!-- table -->
                    <div class="table-parent table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('#Order Number'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Payment Type'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Order Date'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $myOrderData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-label="Order Number">
                                        #<?php echo e(optional($data->getOrder)->order_number); ?>

                                    </td>
                                    <td data-label="Payment Type">
                                        <?php echo app('translator')->get(optional(optional($data->getOrder)->gateway)->name ?? optional($data->getOrder)->payment_type); ?>
                                    </td>
                                    <td data-label="Price">
                                        <?php echo app('translator')->get(config('basic.currency_symbol')); ?>
                                        <?php echo e($data->totalAmount); ?>

                                    </td>
                                    <td data-label="Order Date">
                                        <?php echo e(dateTime($data->created_at, 'd M Y')); ?>

                                    </td>
                                    <td data-label="Status">
                                        <?php if(optional($data->getOrder)->status == 0): ?>
                                            <span class="badge bg-warning"><?php echo app('translator')->get('Pending'); ?></span>
                                        <?php elseif(optional($data->getOrder)->status == 1): ?>
                                            <span class="badge bg-primary"><?php echo app('translator')->get('Processing'); ?></span>
                                        <?php elseif(optional($data->getOrder)->status == 2): ?>
                                            <span class="badge bg-secondary"><?php echo app('translator')->get('On Shipping'); ?></span>
                                        <?php elseif(optional($data->getOrder)->status == 3): ?>
                                            <span class="badge bg-info"><?php echo app('translator')->get('Ship'); ?></span>
                                        <?php elseif(optional($data->getOrder)->status == 4): ?>
                                            <span class="badge bg-success"><?php echo app('translator')->get('Completed'); ?></span>
                                        <?php elseif(optional($data->getOrder)->status == 5): ?>
                                            <span class="badge bg-danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td data-label="Action">
                                        <a href="<?php echo e(route('user.my.order.details', $data->order_id)); ?>" class="">
                                            <i class="fa-sharp fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <td class="text-center text-danger" colspan="100%"><?php echo app('translator')->get('No User Data'); ?></td>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php echo e($myOrderData->links('partials.pagination')); ?>

                        </ul>
                    </nav>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script defer>
        "use strict";
        $('#calendar').fullCalendar({
            themeSystem: 'bootstrap4',
            header: {
                left: 'today',
                center: 'prev title next',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: "<?php echo e($appointment); ?>",
            editable: false,
            eventLimit: true,
            events: "<?php echo e(route('user.my.book.appointment')); ?>",
            eventColor: "#1c2d41",
            height: 500,
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme . 'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/user/dashboard.blade.php ENDPATH**/ ?>