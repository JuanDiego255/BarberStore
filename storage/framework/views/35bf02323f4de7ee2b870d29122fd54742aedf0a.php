<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Book Appointment List'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-2 pt-4 pl-4 shadow">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="<?php echo e(route('admin.search.appointment')); ?>" method="get">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="service_id">
                                    <option value=""><?php echo app('translator')->get('All Service'); ?></option>
                                    <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($data->id); ?>"
                                            <?php echo e(@request()->service_id == $data->id ? 'selected' : ''); ?>><?php echo app('translator')->get(optional($data->serviceDetails)->service_name); ?>
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="plan_id">
                                    <option value=""><?php echo app('translator')->get('All plans'); ?></option>
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
                                <input type="text" name="full_name" value="<?php echo e(@request()->full_name); ?>"
                                       class="form-control" placeholder="<?php echo app('translator')->get('Full Name'); ?>">
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
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow p-3">
        <ul class="nav">
            <?php
                $segment = collect(request()->segments())->last();
            ?>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.appointment.list', 'all_list')); ?>"
                   class="nav-link theme-a <?php echo e($segment == 'all_list' ? 'activeList' : ''); ?>"><?php echo app('translator')->get('All List'); ?>
                    (<?php echo e($countAllAppointment); ?>)</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.appointment.list', 'pending')); ?>"
                   class="nav-link theme-a <?php echo e($segment == 'pending' ? 'activeList' : ''); ?>"><?php echo app('translator')->get('Pending'); ?>
                    (<?php echo e($countPendingAppointment); ?>)</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.appointment.list', 'confirm')); ?>"
                   class="nav-link theme-a <?php echo e($segment == 'confirm' ? 'activeList' : ''); ?>"><?php echo app('translator')->get('Confirm'); ?>
                    (<?php echo e($countConfirmAppointment); ?>)</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.appointment.list', 'cancel')); ?>"
                   class="nav-link theme-a <?php echo e($segment == 'cancel' ? 'activeList' : ''); ?>"><?php echo app('translator')->get('Cancel'); ?>
                    (<?php echo e($countCancelAppointment); ?>)</a>
            </li>
        </ul>
    </div>



    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="dropdown mb-2 text-right">
                <button class="btn btn-sm  btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><i class="fas fa-bars pr-2"></i> <?php echo app('translator')->get('Action'); ?></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item confirm" type="button" data-toggle="modal"
                            data-target="#all_inactive"><?php echo app('translator')->get('Confirm'); ?>
                    </button>
                    <button class="dropdown-item cancel" type="button" data-toggle="modal"
                            data-target="#all_inactive"><?php echo app('translator')->get('Cancel'); ?>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">
                            <input type="checkbox" class="form-check-input check-all tic-check" name="check-all"
                                   id="check-all">
                            <label for="check-all"></label>
                        </th>
                        <th scope="col"><?php echo app('translator')->get('Service Name'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Username'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Date Of Appointment'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $book_appointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="">
                            <td class="text-center">
                                <input type="checkbox" id="chk-<?php echo e($item->id); ?>"
                                       class="form-check-input row-tic tic-check" name="check"
                                       value="<?php echo e($item->id); ?>" data-id="<?php echo e($item->id); ?>">
                                <label for="chk-<?php echo e($item->id); ?>"></label>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Service Name'); ?>">
                                <?php if(!$item->plan): ?>
                                    <?php echo app('translator')->get(optional(optional($item->service)->serviceDetails)->service_name); ?>
                                <?php else: ?>
                                    <p class="text-dark font-weight-normal"><?php echo app('translator')->get(optional($item->plan)->name . ' ' . 'Plan Services'); ?></p>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="d-lg-flex d-block align-items-center ">
                                    <div class="mr-3"><img
                                            src="<?php echo e(getFile(config('location.user.path') . optional($item->user)->image)); ?>"
                                            alt="user" class="rounded-circle" width="45" height="45"></div>
                                    <div class="">
                                        <h6 class="text-dark mb-0 font-16 font-weight-medium"><?php echo app('translator')->get(optional($item->user)->username); ?></h6>
                                        <span class="text-muted font-14"><?php echo app('translator')->get(optional($item->user)->email); ?></span>
                                    </div>
                                </div>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Date Of Appointment'); ?>">
                                <?php if($item->date_of_appointment == null): ?>
                                    <span>N/A</span>
                                <?php else: ?>
                                    <?php echo app('translator')->get(dateTime($item->date_of_appointment, 'd M Y')); ?>
                                <?php endif; ?>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                <?php if($item->status == 0): ?>
                                    <span class="badge bg-warning text-white"><?php echo app('translator')->get('Pending'); ?></span>
                                <?php elseif($item->status == 1): ?>
                                    <span class="badge bg-success text-white"><?php echo app('translator')->get('Confirm'); ?></span>
                                <?php elseif($item->status == 2): ?>
                                    <span class="badge bg-danger text-white"><?php echo app('translator')->get('Cancel'); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="book-appointment-action" data-label="<?php echo app('translator')->get('Action'); ?>">
                                <a class="btn btn-sm btn-primary mr-1"
                                   href="<?php echo e(route('admin.edit.appointment', $item->id)); ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger notiflix-confirm"
                                   data-route="<?php echo e(route('admin.delete.appointment', $item->id)); ?>"
                                   data-toggle="modal" data-target="#delete-modal" href="javascript:void(0)">
                                    <i class="fa fa-trash-alt"></i>
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
            <?php echo e($book_appointment->links('partials.pagination')); ?>

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

    <script>
        "use strict";

        $(document).on('click', '#check-all', function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $('.notiflix-confirm').on('click', function () {
            var route = $(this).data('route');
            $('.deleteRoute').attr('action', route)
        })

        $(document).on('change', ".row-tic", function () {
            let length = $(".row-tic").length;
            let checkedLength = $(".row-tic:checked").length;
            if (length == checkedLength) {
                $('#check-all').prop('checked', true);
            } else {
                $('#check-all').prop('checked', false);
            }
        });

        //dropdown menu is not working
        $(document).on('click', '.dropdown-menu', function (e) {
            e.stopPropagation();
        });

        //multiple processing
        $(document).on('click', '.confirm', function (e) {

            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function () {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "<?php echo e(route('admin.confirm.appointment')); ?>",
                data: {
                    strIds: strIds
                },
                datatType: 'json',
                type: "post",
                success: function (data) {
                    location.reload();

                },
            });
        });

        $(document).on('click', '.cancel', function (e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function () {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "<?php echo e(route('admin.cancel.appointment')); ?>",
                data: {
                    strIds: strIds
                },
                datatType: 'json',
                type: "post",
                success: function (data) {
                    location.reload();

                },
            });
        });
    </script>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/admin/book_appointment/appointment_list.blade.php ENDPATH**/ ?>