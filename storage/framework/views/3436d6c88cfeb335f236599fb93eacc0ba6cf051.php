<?php $__env->startSection('title', trans('My Profile')); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div class="dashboard-heading">
                    <h2 class="mb-0"><?php echo app('translator')->get('Edit profile'); ?></h2>
                    <a href="<?php echo e(route('user.home')); ?>" class="btn-custom"><?php echo app('translator')->get('Back'); ?></a>
                </div>
                <section class="profile-setting">
                    <div class="row g-4 g-lg-5">
                        <div class="col-lg-4">
                            <div class="sidebar-wrapper">
                                <form method="post" action="<?php echo e(route('user.updateProfile')); ?>"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="profile">
                                        <div class="img">
                                            <img id="profile"
                                                 src="<?php echo e(getFile(config('location.user.path') . $user->image)); ?>"
                                                 alt="<?php echo app('translator')->get('preview image'); ?>" class="img-fluid"/>
                                            <button class="upload-img">
                                                <i class="fal fa-camera"></i>
                                                <input class="form-control" accept="image/*" type="file" name="image"
                                                       onchange="previewImage('profile')"/>
                                            </button>
                                        </div>
                                        <div class="text">
                                            <h5 class="name"><?php echo app('translator')->get(ucfirst($user->firstname . ' ' . $user->lastname)); ?></h5>
                                            <span><?php echo app('translator')->get('@' . $user->username); ?></span>
                                        </div>
                                    </div>
                                    <div class="image_update_area mt-2">
                                        <button type="submit" class="btn-custom"><?php echo app('translator')->get('Update Image'); ?></button>
                                    </div>
                                </form>

                                <div class="profile-navigator">
                                    <button tab-id="tab1"
                                            class="tab <?php echo e($errors->has('profile') ? 'active' : ($errors->has('password') || $errors->has('identity') || $errors->has('addressVerification') ? '' : ' active')); ?>">
                                        <i class="fal fa-user"></i> <?php echo app('translator')->get('Profile information'); ?>
                                    </button>
                                    <button tab-id="tab2" class="tab <?php echo e($errors->has('password') ? 'active' : ''); ?>">
                                        <i class="fal fa-key"></i> <?php echo app('translator')->get('Password setting'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div id="tab1"
                                 class="content <?php echo e($errors->has('profile') ? ' active' : ($errors->has('password') || $errors->has('identity') || $errors->has('addressVerification') ? '' : ' active')); ?>">
                                <form action="<?php echo e(route('user.updateInformation')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('put'); ?>
                                    <div class="row g-4">
                                        <div class="input-box col-md-6">
                                            <label for=""><?php echo app('translator')->get('First name'); ?></label>
                                            <input type="text" class="form-control" name="first_name"
                                                   value="<?php echo e(old('first_name', $user->firstname)); ?>"
                                                   placeholder="<?php echo app('translator')->get('Mr. John'); ?>"/>
                                            <?php if($errors->has('first_name')): ?>
                                                <div
                                                    class="error text-danger"><?php echo app('translator')->get($errors->first('first_name')); ?> </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-box col-md-6">
                                            <label for=""><?php echo app('translator')->get('last name'); ?></label>
                                            <input type="text" class="form-control" name="last_name"
                                                   value="<?php echo e(old('last_name', $user->lastname)); ?>" placeholder="Doe"/>
                                            <?php if($errors->has('last_name')): ?>
                                                <div class="error text-danger"><?php echo app('translator')->get($errors->first('last_name')); ?> </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-box col-md-6">
                                            <label for=""><?php echo app('translator')->get('username'); ?></label>
                                            <input type="text" class="form-control" name="username"
                                                   value="<?php echo e(old('username', $user->username)); ?>"
                                                   placeholder="johndoe"/>
                                            <?php if($errors->has('username')): ?>
                                                <div class="error text-danger"><?php echo app('translator')->get($errors->first('username')); ?> </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-box col-md-6">
                                            <label for=""><?php echo app('translator')->get('email address'); ?></label>
                                            <input type="email" class="form-control" name="email"
                                                   value="<?php echo e(old('email', $user->email)); ?>"
                                                   placeholder="<?php echo app('translator')->get('example@gmail.com'); ?>"/>
                                            <?php if($errors->has('email')): ?>
                                                <div class="error text-danger"><?php echo app('translator')->get($errors->first('email')); ?> </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-box col-md-6">
                                            <label for=""><?php echo app('translator')->get('phone number'); ?></label>
                                            <input type="text" class="form-control" name="phone"
                                                   value="<?php echo e(old('phone', $user->phone)); ?>"
                                                   placeholder="<?php echo app('translator')->get('01234567891'); ?>"/>
                                            <?php if($errors->has('phone')): ?>
                                                <div class="error text-danger"><?php echo app('translator')->get($errors->first('phone')); ?> </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-box col-md-6">
                                            <label for=""><?php echo app('translator')->get('preferred language'); ?></label>
                                            <select name="language_id" id="language_id" class="form-select">
                                                <option value="" disabled><?php echo app('translator')->get('Select Language'); ?></option>
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $la): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($la->id); ?>"
                                                        <?php echo e(old('language_id', $user->language_id) == $la->id ? 'selected' : ''); ?>>
                                                        <?php echo app('translator')->get($la->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('language_id')): ?>
                                                <div
                                                    class="error text-danger"><?php echo app('translator')->get($errors->first('language_id')); ?> </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-box col-12">
                                            <label for=""><?php echo app('translator')->get('address'); ?></label>
                                            <textarea name="address" class="form-control" cols="30" rows="3"
                                                      placeholder="<?php echo app('translator')->get('457 MORNINGVIEW, NEW YORK USA'); ?>"><?php echo e($user->address); ?></textarea>
                                            <?php if($errors->has('address')): ?>
                                                <div class="error text-danger"><?php echo app('translator')->get($errors->first('address')); ?> </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-box col-12">
                                            <button type="submit" class="btn-custom"><?php echo app('translator')->get('submit'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="tab2" class="content <?php echo e($errors->has('password') ? 'active' : ''); ?>">
                                <form action="<?php echo e(route('user.updatePassword')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="row g-4">
                                        <div class="input-box col-md-6">
                                            <label for=""><?php echo app('translator')->get('Current Password'); ?></label>
                                            <input type="password" name="current_password" class="form-control"/>
                                            <?php if($errors->has('current_password')): ?>
                                                <div
                                                    class="error text-danger"><?php echo app('translator')->get($errors->first('current_password')); ?> </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-box col-md-6">
                                            <label for=""><?php echo app('translator')->get('New Password'); ?></label>
                                            <input type="password" name="password" class="form-control"/>
                                            <?php if($errors->has('password')): ?>
                                                <div class="error text-danger"><?php echo app('translator')->get($errors->first('password')); ?> </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-box col-md-6">
                                            <label for=""><?php echo app('translator')->get('Confirm Password'); ?></label>
                                            <input type="password" name="password_confirmation" class="form-control"/>
                                            <?php if($errors->has('password_confirmation')): ?>
                                                <div
                                                    class="error text-danger"><?php echo app('translator')->get($errors->first('password_confirmation')); ?> </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-box col-12">
                                            <button type="submit" class="btn-custom"><?php echo app('translator')->get('change password'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme . 'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/user/edit_profile.blade.php ENDPATH**/ ?>