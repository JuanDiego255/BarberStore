<?php $__env->startSection('title','404'); ?>

<?php $__env->startSection('content'); ?>
    <div class="error_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="error_area_inner text-center">
                    <div class="image_area">
                        <img src="<?php echo e(asset($themeTrue.'images/404-page/not-found.png')); ?>" alt="">
                    </div>
                    <div class="text_area mb-40">
                        <h1 class="mt-40 mb-40"><?php echo app('translator')->get('ERROR'); ?></h1>
                        <h4><?php echo app('translator')->get('Page Not Found'); ?></h4>
                    </div>
                    <a href="<?php echo e(route('home')); ?>" class="common_btn d-flex justify-content-center align-items-center m-auto"><?php echo app('translator')->get('back To home'); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/errors/404.blade.php ENDPATH**/ ?>