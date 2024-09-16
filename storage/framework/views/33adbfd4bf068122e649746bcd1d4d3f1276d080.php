<div class="header_top_area">
    <div class="container">
        <div class="row align-items-center g-3">

            <div class="col-md-6 text-center text-md-start d-none d-sm-block">
                <?php if(isset($topbarSection['topbar'][0]) && $topbarSection = $topbarSection['topbar'][0]): ?>
                    <div class="header_left">
                        <p class="para_text">
                            <?php echo app('translator')->get(optional($topbarSection->description)->title); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 ">
                <div class="header_right d-flex justify-content-md-end justify-content-center align-items-center">
                    <div class="language_select_area">
                        <select class="form-select language">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->short_name); ?>"
                                        <?php if(session()->get('trans') == $data->short_name): ?> selected <?php endif; ?>><?php echo app('translator')->get($data->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="login_area">
                        <?php if(Auth::check()): ?>
                            <a class="login_btn" href="<?php echo e(route('user.home')); ?>"><?php echo app('translator')->get('My Account'); ?></a>
                        <?php else: ?>
                            <a class="login_btn" href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('log in'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->startPush('script'); ?>
    <script>
        $(document).on('change', '.language', function () {
            window.location.href = "<?php echo e(route('language')); ?>/" + $(this).val()
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/partials/topbar.blade.php ENDPATH**/ ?>