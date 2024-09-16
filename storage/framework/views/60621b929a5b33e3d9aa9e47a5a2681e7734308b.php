<?php if (\Illuminate\Support\Facades\Blade::check('plan')): ?>
<section class="plan_area">
    <div class="container">
        <?php if(isset($templates['plan'][0]) && $plan = $templates['plan'][0]): ?>
            <div class="row">
                <div class="section_header text-center pb-5">
                    <h2 class="text-uppercase"><?php echo app('translator')->get(optional($plan->description)->title); ?></h2>
                    <p class="title_details"><?php echo app('translator')->get(optional($plan->description)->sub_title); ?></p>
                </div>
            </div>
        <?php endif; ?>
        <div class="row gy-4 justify-content-center">
            <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="card border-0 rounded-0 text-center box_shadow1"
                         data-aos="<?php echo e(($key % 2 != 0)?'flip-right':'flip-left'); ?>">
                        <div class="card_header">
                            <h4 class="pb-30 text-uppercase"><?php echo app('translator')->get($plan->name); ?></h4>
                            <span><span class="price"><?php echo e(config('basic.currency_symbol') . $plan->price); ?></span></span>
                        </div>
                        <div class="card_image d-flex align-items-center justify-content-center mx-auto mt-30 mb-30">
                            <img src="<?php echo e(getFile(config('location.plan.path').$plan->image)); ?>" alt="">
                        </div>
                        <div class="card_body">
                            <ul class="plan_list mx-auto text-start w-75 mb-30">
                                <?php $__currentLoopData = $plan->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><i class="fa-solid fa-check"></i><?php echo e($data); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <a class="card_btn mx-auto d-flex justify-content-center align-items-center"
                               href="<?php echo e(route('user.plan.purchase', $plan->id)); ?>"><?php echo app('translator')->get('PURCHASE NOW'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/sections/pricing-plan.blade.php ENDPATH**/ ?>