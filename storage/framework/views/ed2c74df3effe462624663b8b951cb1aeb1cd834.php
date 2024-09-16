<?php $__env->startSection('title','Register'); ?>
<?php $__env->startSection('content'); ?>
    <section class="register_area login_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section_header text-center">
                    <h2><?php echo app('translator')->get('Create an Account'); ?></h2>
                </div>
                <div class="col-lg-10 registration_form" data-aos="fade-right">
                    <form action="<?php echo e(route('register')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <input type="text" name="firstname" class="form-control"
                                           placeholder="<?php echo app('translator')->get('First Name'); ?>" value="<?php echo e(old('firstname')); ?>"
                                           autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                    <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <input type="text" name="lastname" class="form-control"
                                           placeholder="<?php echo app('translator')->get('Last Name'); ?>" value="<?php echo e(old('lastname')); ?>"
                                           autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                    <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <input type="text" name="username" class="form-control"
                                           placeholder="<?php echo app('translator')->get('Username'); ?>" value="<?php echo e(old('username')); ?>"
                                           autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <?php
                                        $country_code = (string) @getIpInfo()['code'] ?: null;
                                        $myCollection = collect(config('country'))->map(function($row) {
                                            return collect($row);
                                        });
                                        $countries = $myCollection->sortBy('code');
                                    ?>
                                    <div class="input-group phone-country-code">
                                        <select name="phone_code"
                                                class="form-select country_code dialCode-change text-secondary">
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value['phone_code']); ?>"
                                                        data-name="<?php echo e($value['name']); ?>"
                                                        data-code="<?php echo e($value['code']); ?>"
                                                    <?php echo e($country_code == $value['code'] ? 'selected' : ''); ?>

                                                > <?php echo e($value['code']); ?> (<?php echo e($value['phone_code']); ?>)

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <input type="text" name="phone" class="form-control dialcode-set"
                                               value="<?php echo e(old('phone')); ?>"
                                               placeholder="<?php echo app('translator')->get('Your Phone Number'); ?>">

                                        <div class="image_area mt-1">
                                            <i class="fa-regular fa-phone"></i>
                                        </div>
                                    </div>

                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger mt-1"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <input type="hidden" name="country_code" value="<?php echo e(old('country_code')); ?>"
                                           class="text-dark">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="name_area icon_position">
                                    <input type="email" name="email" class="form-control"
                                           placeholder="<?php echo app('translator')->get('Email Address'); ?>" value="<?php echo e(old('email')); ?>"
                                           autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="<?php echo app('translator')->get('Password'); ?>" autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-lock"></i>
                                    </div>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="<?php echo app('translator')->get('Confirm Password'); ?>" autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-lock"></i>
                                    </div>
                                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <?php if(basicControl()->reCaptcha_status_registration): ?>
                                <div class="col-md-6 box mt-4 form-group">
                                    <?php echo NoCaptcha::renderJs(session()->get('trans')); ?>

                                    <?php echo NoCaptcha::display(['data-theme' => '']); ?>

                                    <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger mt-1"><?php echo app('translator')->get($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="remember_forgot">
                            <div class="condition_area mt-4 mb-40 form-check  d-flex align-items-center">
                                <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1" value="<?php echo e(old('remember') ? 'checked' : ''); ?>">
                                <label class="form-check-label mt-1" for="exampleCheck1"><?php echo app('translator')->get('I Have Read And Agree To The Website Terms And Conditions'); ?></label>
                            </div>

                        </div>
                        <button type="submit"
                                class="common_btn mb-40 d-flex justify-content-center align-items-center"><?php echo app('translator')->get('Register'); ?></button>
                        <h6 class="highlight text-center mb-40"><?php echo app('translator')->get('Already have account?'); ?> <a
                                href="<?php echo e(route('login')); ?>"> <?php echo app('translator')->get('Sign In'); ?></a>
                        </h6>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        $(document).ready(function () {
            setDialCode();
            $(document).on('change', '.dialCode-change', function () {
                setDialCode();
            });

            function setDialCode() {
                let currency = $('.dialCode-change').val();
                $('.dialcode-set').val(currency);
            }

        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/auth/register.blade.php ENDPATH**/ ?>