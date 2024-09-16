<?php if(isset($contactUs['contact-us'][0]) && ($contact = $contactUs['contact-us'][0])): ?>

    <section class="footer_area">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="widget_logo_side">
                        <div class="logo_area">
                            <a href="<?php echo e(route('home')); ?>"><img
                                    src="<?php echo e(getFile(config('location.logoIcon.path') . 'admin-logo.png')); ?>"
                                    alt="<?php echo e(config('basic.site_title')); ?>">
                            </a>
                        </div>
                    </div>
                    <div class="text_area">
                        <p class="pt-40 pb-45"><?php echo app('translator')->get(strip_tags(optional($contact->description)->short_details)); ?></p>
                    </div>
                    <div class="submit_area">
                        <form action="<?php echo e(route('subscribe')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3 d-flex align-items-center justify-content-center">
                                <input type="email" name="email" class="form-control"
                                       placeholder="<?php echo app('translator')->get('Email Address'); ?>" autocomplete="off">
                                <button type="submit" class="common_btn"><i class="fa-solid fa-arrow-right-long"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="quick_link_area">
                        <div class="section_header pb-40">
                            <h5><?php echo app('translator')->get('QUICK LINKS'); ?></h5>
                        </div>
                        <div class="section_list">
                            <ul>
                                <li><a href="<?php echo e(route('about')); ?>"><?php echo app('translator')->get('About Us'); ?></a></li>

                                <?php if (\Illuminate\Support\Facades\Blade::check('blog')): ?>
                                <li><a href="<?php echo e(route('blog')); ?>"><?php echo app('translator')->get('Blog'); ?></a></li>
                                <?php endif; ?>

                                <?php if (\Illuminate\Support\Facades\Blade::check('faq')): ?>
                                <li class="nav-item"><a class="nav-link"
                                                        href="<?php echo e(route('faq')); ?>"><?php echo app('translator')->get('FAQ'); ?></a></li>
                                <?php endif; ?>

                                <?php if(isset($contentDetails['pages'])): ?>
                                    <?php $__currentLoopData = $contentDetails['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(route('getLink', [slug($data->description->title), $data->content_id])); ?>"><?php echo app('translator')->get($data->description->title); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="quick_link_area me-5">
                        <div class="section_header pb-40">
                            <h5><?php echo app('translator')->get('CONTACT'); ?></h5>
                        </div>
                        <div class="section_list">
                            <ul>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <span><?php echo app('translator')->get(optional($contact->description)->phone_one); ?></span>
                                </li>
                                <li>
                                    <i class="far fa-envelope"></i>
                                    <span><?php echo app('translator')->get(optional($contact->description)->email_one); ?></span>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo app('translator')->get(optional($contact->description)->address); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="gallery_area">
                        <div class="section_header pb-40">
                            <h5><?php echo app('translator')->get('GALLERY'); ?></h5>
                        </div>
                        <div id="masonryContainer" class="cols text-center footer_magnific_popup">
                            <?php $__empty_1 = true; $__currentLoopData = $manageGallery->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="img-box">
                                    <a href="<?php echo e(getFile(config('location.gallery.path') . $gallery->image)); ?>"
                                       target="">
                                        <img src="<?php echo e(getFile(config('location.gallery.path') . $gallery->image)); ?>"
                                             alt="" class="img-fluid"/>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="copy_right_area pt-50 pb-50">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-sm-6 text-center text-sm-start">
                    <h6> <?php echo app('translator')->get('© Copyright'); ?> <?php echo e(date('Y')); ?> <?php echo app('translator')->get('by'); ?> <?php echo e($basic->site_title); ?></h6>
                </div>
                <div class="col-sm-6">
                    <ul class="social_area d-flex justify-content-center justify-content-sm-end">
                        <?php $__currentLoopData = $contentDetails['social']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(optional(optional(optional($data->content)->contentMedia)->description)->link); ?>"
                                   target="_blank">
                                    <i class="<?php echo e(optional(optional(optional($data->content)->contentMedia)->description)->icon); ?>">
                                    </i>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/partials/footer.blade.php ENDPATH**/ ?>