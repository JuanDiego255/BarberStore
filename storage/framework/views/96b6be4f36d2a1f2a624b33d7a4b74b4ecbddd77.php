<?php if (\Illuminate\Support\Facades\Blade::check('team')): ?>
<?php if(isset($templates['team'][0]) && $team = $templates['team'][0]): ?>
    <section class="ourteam_area">
        <div class="container">
            <div class="row">
                <div class="section_header text-center  mb-45">
                    <h2><?php echo app('translator')->get(optional($team->description)->title); ?></h2>
                    <p class="title_details"><?php echo app('translator')->get(optional($team->description)->short_details); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel owl-theme ourteam_area_carousel">
                    <?php $__empty_1 = true; $__currentLoopData = $team_member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="item" data-aos="<?php echo e(($key % 2 != 0) ? 'fade-up':'fade-down'); ?>">
                            <div class="card card1 border-0 box_shadow2">
                                <a href="<?php echo e(route('team.details', [@slug(optional($data->teamDetails)->name), $data->id])); ?>">
                                    <div class="card_header">
                                        <div class="image_area">
                                            <img src="<?php echo e(getFile(config('location.team.path').$data->image)); ?>" alt="">
                                        </div>
                                        <div class="share_icon">
                                            <a href=""><i class="fa-solid fa-share-nodes"></i></a>
                                        </div>
                                        <div class="social_icon">
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="<?php echo e($data->facebook_link); ?>" target="_blank"><i
                                                            class="fa-brands fa-facebook-f"></i></a></li>
                                                <li><a href="<?php echo e($data->twitter_link); ?>"><i
                                                            class="fa-brands fa-twitter"></i></a></li>
                                                <li><a href="<?php echo e($data->linkedin_link); ?>"><i
                                                            class="fa-brands fa-linkedin"></i></a></li>
                                                <li><a href="<?php echo e($data->skype_link); ?>"><i class="fa-brands fa-skype"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                                <div class="card_body text-center">
                                    <a href="<?php echo e(route('team.details', [@slug(optional($data->teamDetails)->name), $data->id])); ?>">
                                        <h5 class="mt-40 mb-20"><?php echo app('translator')->get(optional($data->teamDetails)->name); ?></h5>
                                    </a>
                                    <p class="mb-20"><?php echo app('translator')->get(optional($data->teamDetails)->position); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/sections/team.blade.php ENDPATH**/ ?>