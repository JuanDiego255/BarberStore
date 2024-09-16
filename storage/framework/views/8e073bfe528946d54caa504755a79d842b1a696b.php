<?php $__env->startSection('title',$page_title); ?>

<?php $__env->startSection('content'); ?>
    <section class="login_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 registration_form">
                    <div class="form-block py-5">
                        <form class="login-form" action="<?php echo e(route('user.mailVerify')); ?>"  method="post">
                            <?php echo csrf_field(); ?>
                            <div class="signin">
                                <h3 class="title mb-30"><?php echo app('translator')->get($page_title); ?></h3>
                                <div class="form-group mb-30">
                                    <input class="form-control" type="text" name="code" value="<?php echo e(old('code')); ?>" placeholder="<?php echo app('translator')->get('Code'); ?>" autocomplete="off">

                                    <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="btn-area">
                                    <button class="common_btn" type="submit"><span><?php echo app('translator')->get('Submit'); ?></span></button>
                                </div>

                                <div class="login-query mt-30 text-center">
                                    <p><?php echo app('translator')->get('Didn\'t get Code? Click to'); ?> <a href="<?php echo e(route('user.resendCode')); ?>?type=email"  class="text-info"> <?php echo app('translator')->get('Resend code'); ?></a></p>
                                    <?php $__errorArgs = ['resend'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-danger  mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/auth/verification/email.blade.php ENDPATH**/ ?>