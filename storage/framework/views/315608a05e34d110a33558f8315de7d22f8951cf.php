<!-- sidebar -->
<div id="sidebar" class="">
    <div class="sidebar-top">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>"> <img
                src="<?php echo e(getFile(config('location.logoIcon.path') . 'logo.png')); ?>" alt=""/></a>
        <button class="sidebar-toggler d-md-none" onclick="toggleSideMenu()">
            <i class="fal fa-times"></i>
        </button>
    </div>
    <ul class="main">
        <li>
            <a class="<?php echo e(menuActive(['user.home'], 3)); ?>" href="<?php echo e(route('user.home')); ?>"><i
                    class="fal fa-th-large"></i><?php echo app('translator')->get('Dashboard'); ?></a>
        </li>
        <?php if (\Illuminate\Support\Facades\Blade::check('bookAppointment')): ?>
        <li>
            <a class="<?php echo e(menuActive(['user.my.appointment', 'user.search.appointment'], 3)); ?>"
               href="<?php echo e(route('user.my.appointment')); ?>"><i
                    class="fa-thin fa-calendar-check"></i><?php echo app('translator')->get('My Appointment'); ?></a>
        </li>
        <?php endif; ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('plan')): ?>
        <li>
            <a class="<?php echo e(menuActive(['user.my.plan', 'user.search.plan'], 3)); ?>" href="<?php echo e(route('user.my.plan')); ?>"><i
                    class="fal fa-tags"></i><?php echo app('translator')->get('my plan'); ?></a>
        </li>
        <?php endif; ?>

        <li>
            <a class="<?php echo e(menuActive(['user.my.order', 'user.order.search', 'user.my.order.details'], 3)); ?>"
               href="<?php echo e(route('user.my.order')); ?>"><i class="fas fa-cart-arrow-down"></i><?php echo app('translator')->get('my order'); ?></a>
        </li>

        <li>
            <a class="<?php echo e(menuActive(['user.my.wishlist', 'user.search.wishlist'], 3)); ?>"
               href="<?php echo e(route('user.my.wishlist')); ?>"><i
                    class="fa-sharp fa-regular fa-heart"></i><?php echo app('translator')->get('my wish list'); ?></a>
        </li>
        <?php if (\Illuminate\Support\Facades\Blade::check('shop')): ?>

        <li>
            <a class="<?php echo e(menuActive(['user.my.transaction', 'user.transaction.search'], 3)); ?>"
               href="<?php echo e(route('user.my.transaction')); ?>"><i class="fal fa-sliders-h"></i><?php echo app('translator')->get('my transaction'); ?></a>
        </li>
          <li>
            <a class="<?php echo e(menuActive(['user.ticket.list', 'user.ticket.view', 'user.ticket.create'], 3)); ?>"
               href="<?php echo e(route('user.ticket.list')); ?>"><i class="fal fa-user-headset" aria-hidden="true"></i><?php echo app('translator')->get('Support Ticket'); ?></a>
        </li>

        <li>
            <a class="<?php echo e(menuActive(['user.twostep.security'], 3)); ?>"
               href="<?php echo e(route('user.twostep.security')); ?>"><i class="fas fa-user-shield"></i><?php echo app('translator')->get('2FA Security'); ?></a>
        </li>
        <?php endif; ?>
        <li>
            <a class="<?php echo e(menuActive(['user.profile'], 3)); ?>" href="<?php echo e(route('user.profile')); ?>"><i
                    class="fal fa-user-edit"></i><?php echo app('translator')->get('Edit Profile'); ?></a>
        </li>
        <li>
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fal fa-sign-out-alt"></i><?php echo app('translator')->get('Sign Out'); ?></a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            <?php endif; ?>
        </li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/partials/sidebar.blade.php ENDPATH**/ ?>