<style>
    .banner_area {
        background-image: linear-gradient(90deg, rgba(7, 11, 40, 0.65) 0%, rgba(7, 11, 40, 0.65) 100%), url(<?php echo e(getFile(config('location.logo.path') . 'banner.jpg')); ?>);
    }
</style>
<?php if(!request()->routeIs('home')): ?>
    <!-- PAGE-BANNER -->
    <div class="banner_area">
        <div class="container">
            <div class="row">
                <div class="secion_header">
                    <h1 class="banner_title"><?php echo $__env->yieldContent('title'); ?></h1>
                </div>
                <div class="breadcrumb d-flex justify-content-center">
                    <div class="text_area">
                        <h6><a href="<?php echo e(route('home')); ?>"><span><?php echo app('translator')->get('Home'); ?></span></a> |
                            <span><?php echo $__env->yieldContent('title'); ?></span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE-BANNER -->
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/partials/banner.blade.php ENDPATH**/ ?>