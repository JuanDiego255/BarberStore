<?php if(isset($templates['testimonial'][0]) && $testimonial = $templates['testimonial'][0]): ?>
    <section class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="section_header text-center">
                    <h2><?php echo app('translator')->get(optional($testimonial->description)->title); ?></h2>
                    <p class="title_details pb-45"><?php echo app('translator')->get(optional($testimonial->description)->short_title); ?></p>
                </div>
            </div>
            <div class="row g-5 g-md-4">
                <div class="col-md-6 col-12">
                    <div class="row align-items-center">
                        <div class="col-4 ">
                            <div class="testimonial_thamnail" data-aos="fade-left">
                                <?php if(isset($contentDetails['testimonial'])): ?>
                                    <?php $__currentLoopData = $contentDetails['testimonial']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="image_area">
                                            <img
                                                src="<?php echo e(getFile(config('location.content.path').'thumb_'.optional(optional(optional($data->content)->contentMedia)->description)->image)); ?>"
                                                alt="...">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="image_area testimonial_slider">
                                <?php if(isset($contentDetails['testimonial'])): ?>
                                    <?php $__currentLoopData = $contentDetails['testimonial']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="image_area">
                                            <img
                                                src="<?php echo e(getFile(config('location.content.path').optional(optional(optional($data->content)->contentMedia)->description)->image)); ?>"
                                                alt="">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-auto" data-aos="fade-right">
                    <div class="content_area testimonial_slider">
                        <?php if(isset($contentDetails['testimonial'])): ?>
                            <?php $__currentLoopData = $contentDetails['testimonial']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="text_area d-flex align-items-center">
                                    <div class="text_area_inner">
                                        <div class="section_header d-flex pb-40">
                                            <img
                                                src="<?php echo e(asset($themeTrue. 'images/quotes.png')); ?>"
                                                alt="">
                                            <div class="text">
                                                <h5 class="heading"><?php echo app('translator')->get(optional($data->description)->name); ?></h5>
                                                <p><?php echo app('translator')->get(optional($data->description)->designation); ?></p>
                                            </div>
                                        </div>
                                        <p class="description">
                                            <?php echo app('translator')->get(optional($data->description)->description); ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/sections/testimonial.blade.php ENDPATH**/ ?>