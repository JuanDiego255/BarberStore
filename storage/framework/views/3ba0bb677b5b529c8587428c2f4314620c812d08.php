<?php if (\Illuminate\Support\Facades\Blade::check('service')): ?>
<?php if(isset($templates['services'][0]) && $services = $templates['services'][0]): ?>
    <section class="service_area"
             style="background: linear-gradient(rgb(53, 49, 47, .9), rgb(53, 49, 47, .9)), url(<?php echo e(getFile(config('location.content.path').@$services->templateMedia()->background_image)); ?>); background-size: cover; background-repeat: no-repeat">
        <div class="container pb-5">
            <div class="row">
                <div class="section_header text-center">
                    <div class="header_text">
                        <h2><?php echo app('translator')->get(optional($services->description)->title); ?></h2>
                        <p class="title_details"><?php echo app('translator')->get(optional($services->description)->short_title); ?> </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="owl-carousel owl-theme service_area_carousel">
            <?php $__currentLoopData = $servicesName->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item d-flex align-items-center">
                    <div class="img_area">
                        <img src="<?php echo e(getFile(config('location.service.pathThumbnail').$item->image)); ?>" alt="">
                    </div>
                    <div class="text_area">
                        <h4>0<?php echo e($key + 1); ?></h4>
                        <h3><?php echo app('translator')->get(optional($item->serviceDetails)->service_name); ?></h3>
                        <p><?php echo app('translator')->get(optional($item->serviceDetails)->short_title); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/sections/service.blade.php ENDPATH**/ ?>