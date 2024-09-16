<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('content'); ?>
        <section class="login_area">
            <div class="container">
                <div class="row justify-content-center">

                    <?php if(isset($templates['login'][0]) && $login = $templates['login'][0]): ?>
                    <div class="section_header text-center">
                        <h2><?php echo app('translator')->get(optional($login->description)->title); ?></h2>
                    </div>
                    <div class="col-md-6 login_image_area  d-flex align-items-end justify-content-center pb-30"
                         data-aos="fade-left"
                         style="background: linear-gradient(rgb(223, 142, 106,0.5), rgb(223, 142, 106,0.5)), url(<?php echo e(getFile(config('location.content.path').$login->templateMedia()->image)); ?>); background-repeat: no-repeat; background-size: cover; ">
                        <a href="<?php echo e(route('home')); ?>"><img
                                src="<?php echo e(getFile(config('location.content.path').@$login->templateMedia()->logo_image)); ?>"
                                alt=""></a>
                    </div>

                    <?php endif; ?>
                    <div class="col-md-6 registration_form" data-aos="fade-right">
                        <form action="<?php echo e(route('login')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12">
                                <div class="name_area icon_position mb-30">
                                    <input type="text" name="username" class="form-control"
                                           placeholder="<?php echo app('translator')->get('Username or Email Address'); ?>" autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                            <div class="col-md-12">
                                <div class="name_area icon_position">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="<?php echo app('translator')->get('Password'); ?>" autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-sharp fa-solid fa-unlock"></i>
                                    </div>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger mt-1"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>


                            <?php if(basicControl()->reCaptcha_status_login): ?>
                                <div class="col-md-12 box mt-4 form-group">
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


                            <div class="remember_forgate d-flex justify-content-between align-items-center">
                                <div class="condition_area mt-30 mb-40 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1"><?php echo app('translator')->get('Remember Me?'); ?></label>
                                </div>
                                <a href="<?php echo e(route('password.request')); ?>" class="highlight"><?php echo app('translator')->get('Forgot Password?'); ?></a>
                            </div>
                            <button
                                class="common_btn mb-40 d-flex justify-content-center align-items-center"><?php echo app('translator')->get('Login'); ?></button>
                            <h6 class="highlight text-center mb-40"><?php echo app('translator')->get('Haven’t any account?'); ?> <a
                                    href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('Register'); ?></a></h6>
                        </form>
                    </div>
                </div>
            </div>
        </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/auth/login.blade.php ENDPATH**/ ?>