<?php if(isset($contentDetails['hero'])): ?>
    <div class="hero_area">
        <div class="hero_slider">
            <?php $__currentLoopData = $contentDetails['hero']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="slide slide1"
                     style="background: linear-gradient(rgb(53, 49, 47, 0.5),rgb(53, 49, 47, 0.5)), url(<?php echo e(getFile(config('location.content.path') . @$item->content->contentMedia->description->image)); ?>); background-repeat: no-repeat; background-position: center; background-size: cover">
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 ">
                                <div class="section_hedding mb-50">
                                    <div class="section_title">
                                        <h1><?php echo app('translator')->get(optional($item->description)->title); ?></h1>
                                    </div>
                                    <div class="section_btn_area">
                                        <a class="common_btn" href="<?php echo e(route('appointment')); ?>">
                                            <?php echo app('translator')->get(optional($item->description)->button_name); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="hero_section_bottom">
            <div class="container">
                <div class="row">
                    <div class="col col-md-4">
                        <div class="section_counter">
                            <div class="slide-count-wrap">
                                <span class="current"></span> /
                                <span class="total"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4 d-none d-sm-block">
                        <div class="section_nav">

                        </div>
                    </div>
                    <?php if(isset($contentDetails['social'])): ?>
                        <div class="col col-md-4">
                            <div class="social_area d-flex justify-content-end">
                                <ul class="d-flex ">
                                    <?php $__currentLoopData = $contentDetails['social']->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(@$data->content->contentMedia->description->link); ?>"
                                               target="_blank"><i
                                                    class="<?php echo e(@$data->content->contentMedia->description->icon); ?>"></i>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/partials/heroBanner.blade.php ENDPATH**/ ?>