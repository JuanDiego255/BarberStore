<?php if(isset($templates['speciality'][0]) && $speciality = $templates['speciality'][0]): ?>
    <section class="speciality_area">
        <div class="container">
            <div class="row">
                <div class="section_header text-center">
                    <div class="header_text">
                        <h2><?php echo app('translator')->get(optional($speciality->description)->title); ?></h2>
                        <p class="title_details"><?php echo app('translator')->get(optional($speciality->description)->sub_title); ?></p>
                    </div>
                </div>
                <?php if(isset($contentDetails['speciality'])): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 order-1 order-sm-2">
                        <div class="section_left ">
                            <?php $__empty_1 = true; $__currentLoopData = $contentDetails['speciality']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($key%2==0): ?>
                                    <div class="box box1 d-flex justify-content-md-end justify-content-center mb-3">
                                        <div class="text_area">
                                            <h5><?php echo app('translator')->get(optional($item->description)->title); ?></h5>
                                            <p><?php echo app('translator')->get(optional($item->description)->short_details); ?></p>
                                        </div>
                                        <div class="img_area d-flex justify-content-center align-items-center">
                                            <img
                                                src="<?php echo e(getFile(config('location.content.path').optional(optional(optional($item->content)->contentMedia)->description)->image)); ?>"
                                                alt="">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 order-2 order-sm-1 order-md-2">
                        <div class="section_middle" data-aos="zoom-in">
                            <img src="<?php echo e(getFile(config('location.content.path').optional($speciality->templateMedia())->image)); ?>"
                                 alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 order-1 order-sm-2">
                        <div class="section_left ">
                            <?php $__empty_1 = true; $__currentLoopData = $contentDetails['speciality']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($key%2 != 0): ?>
                                    <div class="box box1 d-flex justify-content-md-end justify-content-center mb-3">
                                        <div class="text_area">
                                            <h5><?php echo app('translator')->get(optional($item->description)->title); ?></h5>
                                            <p><?php echo app('translator')->get(optional($item->description)->short_details); ?></p>
                                        </div>
                                        <div class="img_area d-flex justify-content-center align-items-center">
                                            <img
                                                src="<?php echo e(getFile(config('location.content.path').optional(optional(optional($item->content)->contentMedia)->description)->image)); ?>"
                                                alt="">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/sections/speciality.blade.php ENDPATH**/ ?>