<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Basic Controls'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="bd-callout bd-callout-warning m-0 m-md-4 my-4 m-md-0 ">
        <i class="fas fa-info-circle mr-2"></i> <?php echo app('translator')->get("If you get 500(server error) for some reason, please turn on <b>Debug Mode</b> and try again. Then you can see what was missing in your system."); ?>
    </div>
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <form method="post" action="" class="needs-validation base-form">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="text-dark"><?php echo app('translator')->get('Site Title'); ?></label>
                        <input type="text" name="site_title"
                               value="<?php echo e(old('site_title') ?? $control->site_title ?? 'Site Title'); ?>"
                               class="form-control ">

                        <?php $__errorArgs = ['site_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>
                    <div class="form-group col-md-3">
                        <label class="text-dark"><?php echo app('translator')->get('Base Color'); ?></label>
                        <input type="color" name="base_color"
                               value="<?php echo e(old('base_color') ?? $control->base_color ?? '#6777ef'); ?>"
                               required="required" class="form-control ">
                        <?php $__errorArgs = ['base_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    <div class="form-group col-md-3">
                        <label class="text-dark"><?php echo app('translator')->get('Time Zone'); ?></label>
                        <select class="form-control" id="exampleFormControlSelect1" name="time_zone">
                            <option hidden><?php echo e(old('time_zone', $control->time_zone)?? 'Select Time Zone'); ?></option>
                            <?php $__currentLoopData = $control->time_zone_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time_zone_local): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($time_zone_local); ?>"><?php echo app('translator')->get($time_zone_local); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php $__errorArgs = ['time_zone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    <div class="form-group col-sm-3 col-12">
                        <label class="text-dark"><?php echo app('translator')->get('Base Currency'); ?></label>
                        <input type="text" name="currency" value="<?php echo e(old('currency') ?? $control->currency ?? 'USD'); ?>"
                               required="required" class="form-control ">

                        <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group col-sm-3 col-12">
                        <label class="text-dark"><?php echo app('translator')->get('Currency Symbol'); ?></label>
                        <input type="text" name="currency_symbol"
                               value="<?php echo e(old('currency_symbol') ?? $control->currency_symbol ?? '$'); ?>"
                               required="required" class="form-control ">

                        <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group col-sm-3 col-12">
                        <label class="text-dark"><?php echo app('translator')->get('Fraction number'); ?></label>
                        <input type="text" name="fraction_number"
                               value="<?php echo e(old('fraction_number') ?? $control->fraction_number ?? '2'); ?>"
                               required="required" class="form-control ">
                        <?php $__errorArgs = ['fraction_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-sm-3 col-12">
                        <label class="text-dark"><?php echo app('translator')->get('Paginate Per Page'); ?></label>
                        <input type="text" name="paginate" value="<?php echo e(old('paginate') ?? $control->paginate ?? '2'); ?>"
                               required="required" class="form-control ">
                        <?php $__errorArgs = ['paginate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>





                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Strong Password'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='strong_password'>
                            <input type="checkbox" name="strong_password" class="custom-switch-checkbox"
                                   id="strong_password"
                                   value="0" <?php echo e(($control->strong_password == 0) ? 'checked' : ''); ?> >
                            <label class="custom-switch-checkbox-label" for="strong_password">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Registration'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='registration'>
                            <input type="checkbox" name="registration" class="custom-switch-checkbox"
                                   id="registration"
                                   value="0" <?php echo e(($control->registration == 0) ? 'checked' : ''); ?> >
                            <label class="custom-switch-checkbox-label" for="registration">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>



                    <div class="form-group col-lg-3 col-md-6">
                        <label class="text-dark"><?php echo app('translator')->get('Cron Set Up Pop Up'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='cron_set_up_pop_up'>
                            <input type="checkbox" name="cron_set_up_pop_up" class="custom-switch-checkbox"
                                   id="cron_set_up_pop_up"
                                   value="0" <?php if ($control->is_active_cron_notification == 0):echo 'checked'; endif ?> >
                            <label class="custom-switch-checkbox-label" for="cron_set_up_pop_up">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Debug Mode'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='error_log'>
                            <input type="checkbox" name="error_log" class="custom-switch-checkbox"
                                   id="error_log"
                                   value="0" <?php if ($control->error_log == 0):echo 'checked'; endif ?> >
                            <label class="custom-switch-checkbox-label" for="error_log">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 ">
                        <h4 class="font-weight-bold text-dark"><?php echo app('translator')->get('Section Active'); ?></h4>
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Shop'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='shop'>
                            <input type="checkbox" name="shop" class="custom-switch-checkbox"
                                   id="shop"
                                   value="0" <?php echo e(($control->shop == 0) ? 'checked' : ''); ?> >
                            <label class="custom-switch-checkbox-label" for="shop">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Faq'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='faq'>
                            <input type="checkbox" name="faq" class="custom-switch-checkbox"
                                   id="faq"
                                   value="0" <?php echo e(($control->faq == 0) ? 'checked' : ''); ?> >
                            <label class="custom-switch-checkbox-label" for="faq">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Book Appointment'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='book_appointment'>
                            <input type="checkbox" name="book_appointment" class="custom-switch-checkbox"
                                   id="book_appointment"
                                   value="0" <?php echo e(($control->book_appointment == 0) ? 'checked' : ''); ?> >
                            <label class="custom-switch-checkbox-label" for="book_appointment">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Gallery'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='gallery'>
                            <input type="checkbox" name="gallery" class="custom-switch-checkbox"
                                   id="gallery"
                                   value="0" <?php echo e(($control->gallery == 0) ? 'checked' : ''); ?> >
                            <label class="custom-switch-checkbox-label" for="gallery">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Team'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='team'>
                            <input type="checkbox" name="team" class="custom-switch-checkbox"
                                   id="team"
                                   value="0" <?php echo e(($control->team == 0) ? 'checked' : ''); ?> >
                            <label class="custom-switch-checkbox-label" for="team">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>


                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Service'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='service'>
                            <input type="checkbox" name="service" class="custom-switch-checkbox"
                                   id="service"
                                   value="0" <?php echo e(($control->service == 0) ? 'checked' : ''); ?> >
                            <label class="custom-switch-checkbox-label" for="service">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Blog'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='blog'>
                            <input type="checkbox" name="blog" class="custom-switch-checkbox"
                                   id="blog"
                                   value="0" <?php echo e(($control->blog == 0) ? 'checked' : ''); ?> >
                            <label class="custom-switch-checkbox-label" for="blog">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label class="text-dark"><?php echo app('translator')->get('Plan'); ?></label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='plan'>
                            <input type="checkbox" name="plan" class="custom-switch-checkbox"
                                   id="plan"
                                   value="0" <?php echo e(($control->plan == 0) ? 'checked' : ''); ?> >
                            <label class="custom-switch-checkbox-label" for="plan">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                </div>


                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3"><span><i
                            class="fas fa-save pr-2"></i> <?php echo app('translator')->get('Save Changes'); ?></span></button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        "use strict";
        $(document).ready(function () {
            $('select').select2({
                selectOnClose: true
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/admin/basic-controls.blade.php ENDPATH**/ ?>