<section class="about1_area">
    <div class="container">
        <div class="row g-4">
            <?php if(isset($templates['open-shop'][0]) && $openShop = $templates['open-shop'][0]): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 card1 h-100" data-aos="fade-right">
                        <div class="section_header">
                            <div class="header_text">
                                <p>
                                    <i class="fa-thin fa-location-dot"></i> <?php echo app('translator')->get(optional($openShop->description)->address); ?>
                                </p>
                            </div>
                        </div>
                        <div class="section_body section_body_bg">
                            <div class="sub_title_area d-flex">
                                <div class="section_img">
                                    <img
                                        src="<?php echo e(getFile(config('location.content.path').optional($openShop->templateMedia())->image)); ?>"
                                        alt="">
                                </div>
                                <div class="section_sub_title">
                                    <div class="sub_title">
                                        <h4><?php echo app('translator')->get(optional($openShop->description)->title); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <?php if(isset($contentDetails['open-shop-schedule'])): ?>
                                <?php $__currentLoopData = $contentDetails['open-shop-schedule']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="section_time_area">
                                        <div class="time1">
                                            <p><?php echo app('translator')->get(optional($item->description)->day); ?></p>
                                            <h6><?php echo app('translator')->get(optional($item->description)->time); ?></h6>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($templates['about-area'][0]) && $aboutUs = $templates['about-area'][0]): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 bg-transparent card2 px-2 h-100" data-aos="fade-down">
                        <div class="">
                            <div class="header_text">
                                <h5><?php echo app('translator')->get(optional($aboutUs->description)->short_title); ?></h5>
                            </div>
                        </div>

                        <?php if(optional($aboutUs->description)->details): ?>
                            <div class="section_body">
                                <div class="list_item_area pt-4">
                                    <ul class="list_item">
                                        <?php echo app('translator')->get(optional($aboutUs->description)->details); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="section_bottom_area d-flex justify-content-between mt-auto">
                            <div class="hair_styling_btn">

                                <a class="hair_btn d-flex align-items-center justify-content-center"
                                   href="<?php echo e(optional($aboutUs->templateMedia())->button_link_one); ?>">
                                    <span class="scissors"><i class="far fa-cut"></i></span>
                                    <?php echo app('translator')->get(optional($aboutUs->description)->button_name_one); ?>
                                </a>
                            </div>
                            <div class="hair_coloring_btn">
                                <a class="hair_btn d-flex align-items-center justify-content-center"
                                   href="<?php echo e(optional($aboutUs->templateMedia())->button_link_two); ?>">
                                    <span class="hair_color_font"><i class="far fa-mortar-pestle"></i></span>
                                    <?php echo app('translator')->get(optional($aboutUs->description)->button_name_two); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 bg-transparent card3 h-100 d-flex" data-aos="fade-left">
                        <div class="">
                            <div class="header_text">
                                <h2><?php echo app('translator')->get(optional($aboutUs->description)->title); ?></h2>
                            </div>
                        </div>
                        <div class="section_body mt-auto">
                            <img class="w-100"
                                 src="<?php echo e(getFile(config('location.content.path').optional($aboutUs->templateMedia())->image)); ?>"
                                 alt="">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/sections/about-area.blade.php ENDPATH**/ ?>