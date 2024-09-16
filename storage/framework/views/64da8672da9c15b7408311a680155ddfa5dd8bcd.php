<?php if(isset($templates['experience'][0]) && $experience = $templates['experience'][0]): ?>
    <section class="about2_area">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 ">
                    <div class="about2_left" data-aos="flip-left">
                        <div class="feature1">
                            <img src="<?php echo e(getFile(config('location.content.path').optional($experience->templateMedia())->image)); ?>"
                                 alt="">
                        </div>
                    </div>
                </div>
                <?php if(isset($contentDetails['experience'])): ?>
                    <div class="col-md-6">
                        <div class="about2_right" data-aos="flip-right">
                            <div class="section_header">
                                <h2><?php echo app('translator')->get(optional($experience->description)->title); ?></h2>
                                <p><?php echo app('translator')->get(optional($experience->description)->sub_title); ?></p>
                            </div>
                            <?php $__currentLoopData = $contentDetails['experience']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card border-0 rounded-0 box_shadow2">
                                    <div class="card_inner d-flex">
                                        <div class="img_area">
                                            <img
                                                src="<?php echo e(getFile(config('location.content.path').optional(optional(optional($item->content)->contentMedia)->description)->image)); ?>"
                                                alt="">
                                        </div>
                                        <div class="text_area"><?php echo app('translator')->get(optional($item->description)->title); ?></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/sections/experience.blade.php ENDPATH**/ ?>