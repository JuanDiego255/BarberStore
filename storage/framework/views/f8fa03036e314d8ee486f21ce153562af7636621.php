<?php if (\Illuminate\Support\Facades\Blade::check('bookAppointment')): ?>
<?php if(isset($templates['book-appointment'][0]) && $bookAppointment = $templates['book-appointment'][0]): ?>
    <section class="appoinment_area"
             style="background: linear-gradient(rgb(53, 49, 47, 0.9),rgb(53, 49, 47, 0.9)), url(<?php echo e(getFile(config('location.content.path').$bookAppointment->templateMedia()->background_image)); ?>); background-repeat: no-repeat; background-size: 100% 50%; background-position: top">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6" data-aos="fade-left">
                    <div class="section_left h-100">
                        <div class="card bg-transparent border-0 rounded-0 h-100">
                            <div class="section_header pb-40">
                                <h2><?php echo app('translator')->get(optional($bookAppointment->description)->title); ?></h2>
                                <p>
                                    <?php echo app('translator')->get(optional($bookAppointment->description)->short_details); ?>
                                </p>
                            </div>
                            <div class="image_area h-100">
                                <iframe class="w-100 h-100"
                                        src="<?php echo e(optional($bookAppointment->templateMedia())->map_link); ?>" width="600"
                                        height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-right">
                    <div class="section_right">
                        <form action="<?php echo e(route('user.book.appointment')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="mt-3">
                                <input type="text" name="full_name" class="form-control"
                                       placeholder="<?php echo app('translator')->get('Full Name'); ?>" value="<?php echo e(old('full_name')); ?>"
                                       autocomplete="off">
                                <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mt-4">
                                <input type="email" name="email" class="form-control"
                                       placeholder="<?php echo app('translator')->get('Correo electrónico Address'); ?>" value="<?php echo e(old('email')); ?>"
                                       autocomplete="off">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mt-4">
                                <input type="number" name="phone" class="form-control"
                                       placeholder="<?php echo app('translator')->get('Phone Number'); ?>" value="<?php echo e(old('phone')); ?>"
                                       autocomplete="off">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mt-4">
                                <select class="form-select form-control" name="service_name"
                                        aria-label="Default select example">
                                    <option selected disabled><?php echo app('translator')->get('Choose service'); ?></option>
                                    <?php $__currentLoopData = $servicesName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($data->id); ?>"><?php echo app('translator')->get(optional($data->serviceDetails)->service_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['service_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="mt-4 date">
                                <input type="date" name="date_of_appointment" class="form-control"
                                       value="<?php echo e(old('date_of_appointment')); ?>" autocomplete="off">
                                <?php $__errorArgs = ['date_of_appointment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mt-4">
                                <textarea class="form-control" name="message" placeholder="<?php echo app('translator')->get('Type Your Massage'); ?>"
                                          rows="5"><?php echo e(old('message')); ?></textarea>
                                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <button type="submit" class="common_btn mt-4"><?php echo app('translator')->get('BOOK APPOINTMENT'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/sections/book-appointment.blade.php ENDPATH**/ ?>