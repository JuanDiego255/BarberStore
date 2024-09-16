<?php if (\Illuminate\Support\Facades\Blade::check('gallery')): ?>
<section class="gallery_area">
    <div class="container" data-aos="zoom-in-up">
        <?php if(isset($templates['gallery'][0]) && $gallery = $templates['gallery'][0]): ?>
            <div class="row">
                <div class="section_header text-center">
                    <h2><?php echo app('translator')->get(optional($gallery->description)->title); ?></h2>
                    <p class="title_details"><?php echo app('translator')->get(optional($gallery->description)->sub_title); ?></p>
                </div>
            </div>
        <?php endif; ?>
        <div class="section_btn_area">
            <div class="row g-4 justify-content-center mt-30 mb-30 mx-auto">
                <div class="col-lg-2 col-sm-4 col-6 d-flex justify-content-center">
                    <button type="button" data-filter="all"><?php echo app('translator')->get('All'); ?></button>
                </div>
                <?php $__currentLoopData = $galleryTag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-2 col-sm-4 col-6 d-flex justify-content-center">
                        <button type="button"
                                data-filter=".<?php echo e(removeSpaceTagName($item->name)); ?>"><?php echo app('translator')->get($item->name); ?></button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div id="masonryContainer" class="cols mx-auto text-center gallery_magnific_popup">
                <?php $__currentLoopData = $manageGallery->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="img-box mix <?php echo e(removeSpaceTagName(optional($item->tag)->name)); ?>">
                        <a href="<?php echo e(getFile(config('location.gallery.path').$item->image)); ?>" target="_blank"><img
                                src="<?php echo e(getFile(config('location.gallery.path').$item->image)); ?>" alt=""
                                class="img-fluid"/></a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/sections/gallery.blade.php ENDPATH**/ ?>