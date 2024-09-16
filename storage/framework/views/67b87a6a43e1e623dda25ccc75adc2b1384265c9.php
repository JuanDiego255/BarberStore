<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en" <?php if(session()->get('rtl') == 1): ?> dir="rtl" <?php endif; ?>>

<head <?php if(session()->get('rtl') == 1): ?> dir="rtl" <?php endif; ?> >
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

<?php echo $__env->make('partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!----  How to load Css Library, Here is an example ----->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset($themeTrue . 'css/bootstrap.min.css')); ?>"/>

    <?php echo $__env->yieldPushContent('css-lib'); ?>

    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/jquery.fancybox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/jquery.rprogessbar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/ion.rangeSlider.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/fontawesome.min.css')); ?>">
    <!----  Push your custom css  ----->
    <?php echo $__env->yieldPushContent('style'); ?>

</head>
<body onload="preloder_function()" class="<?php if(session()->get('rtl') == 1): ?> rtl <?php endif; ?>">
<div id="preloader"></div>

<?php echo $__env->make($theme . 'partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="nav_area">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <img class="logo" src="<?php echo e(getFile(config('location.logoIcon.path') . 'logo.png')); ?>"
                     alt="<?php echo e(config('basic.site_title')); ?>">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(menuActive(['home'], 3)); ?>" aria-current="page"
                           href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('Home'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(menuActive(['about'], 3)); ?>"
                           href="<?php echo e(route('about')); ?>"><?php echo app('translator')->get('About'); ?></a>
                    </li>

                    <?php if (\Illuminate\Support\Facades\Blade::check('service')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(menuActive(['service'], 3)); ?>"
                           href="<?php echo e(route('service')); ?>"><?php echo app('translator')->get('Services'); ?></a>
                    </li>
                    <?php endif; ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('bookAppointment')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(menuActive(['appointment'], 3)); ?>"
                           href="<?php echo e(route('appointment')); ?>"><?php echo app('translator')->get('Appointment'); ?></a></li>
                    <?php endif; ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('shop')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(menuActive(['products'], 3)); ?>"
                           href="<?php echo e(route('products')); ?>"><?php echo app('translator')->get('Shop'); ?></a>
                    </li>
                    <?php endif; ?>


                    <li class="nav-item dropdown_list">
                        <a class="nav-link <?php echo e(menuActive(['plan.pricing', 'team', 'gallery'], 3)); ?>"
                           href="javascript:void(0)"><?php echo app('translator')->get('Pages'); ?> <i
                                class="fa-solid fa-angle-down"></i></a>
                        <ul class="sub_menu">


                            <?php if (\Illuminate\Support\Facades\Blade::check('plan')): ?>
                            <li class="nav-item"><a class="nav-link"
                                                    href="<?php echo e(route('plan.pricing')); ?>"><?php echo app('translator')->get('Pricing plan'); ?></a></li>
                            <?php endif; ?>

                            <?php if (\Illuminate\Support\Facades\Blade::check('team')): ?>
                            <li class="nav-item"><a class="nav-link"
                                                    href="<?php echo e(route('team')); ?>"><?php echo app('translator')->get('team'); ?></a></li>
                            <?php endif; ?>

                            <?php if (\Illuminate\Support\Facades\Blade::check('gallery')): ?>
                            <li class="nav-item"><a class="nav-link"
                                                    href="<?php echo e(route('gallery')); ?>"><?php echo app('translator')->get('Gallery'); ?></a>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link <?php echo e(menuActive(['contact'], 3)); ?>"
                           href="<?php echo e(route('contact')); ?>"><?php echo app('translator')->get('Contact'); ?></a>
                    </li>
                </ul>
                <?php echo $__env->make($theme . 'partials.shopping_cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </nav>
</div>


<?php echo $__env->make($theme . 'partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make($theme . 'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldPushContent('extra-content'); ?>

<!----  How to load JS Library, Here is an example ----->
<script src="<?php echo e(asset('assets/global/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/jquery.waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/mixitup.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/aos.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/jQuery.rProgressbar.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/ion.rangeSlider.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/jquery.fancybox.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/main.js')); ?>"></script>


<?php echo $__env->yieldPushContent('extra-js'); ?>

<script src="<?php echo e(asset('assets/global/js/notiflix-aio-2.7.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/js/pusher.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/js/vue.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/js/axios.min.js')); ?>"></script>

<?php echo $__env->yieldPushContent('script'); ?>

<?php if(auth()->guard()->check()): ?>
    <?php if(config('basic.push_notification') == 1): ?>
        <script>
            'use strict';
            let pushNotificationArea = new Vue({
                el: "#pushNotificationArea",
                data: {
                    items: [],
                },
                mounted() {
                    this.getNotifications();
                    this.pushNewItem();
                },
                methods: {
                    getNotifications() {
                        let app = this;
                        axios.get("<?php echo e(route('user.push.notification.show')); ?>")
                            .then(function (res) {
                                app.items = res.data;
                            })
                    },
                    readAt(id, link) {
                        let app = this;
                        let url = "<?php echo e(route('user.push.notification.readAt', 0)); ?>";
                        url = url.replace(/.$/, id);
                        axios.get(url)
                            .then(function (res) {
                                if (res.status) {
                                    app.getNotifications();
                                    if (link != '#') {
                                        window.location.href = link
                                    }
                                }
                            })
                    },
                    readAll() {
                        let app = this;
                        let url = "<?php echo e(route('user.push.notification.readAll')); ?>";
                        axios.get(url)
                            .then(function (res) {
                                if (res.status) {
                                    app.items = [];
                                }
                            })
                    },
                    pushNewItem() {
                        let app = this;
                        // Pusher.logToConsole = true;
                        let pusher = new Pusher("<?php echo e(env('PUSHER_APP_KEY')); ?>", {
                            encrypted: true,
                            cluster: "<?php echo e(env('PUSHER_APP_CLUSTER')); ?>"
                        });
                        let channel = pusher.subscribe('user-notification.' + "<?php echo e(Auth::id()); ?>");
                        channel.bind('App\\Events\\UserNotification', function (data) {
                            app.items.unshift(data.message);
                        });
                        channel.bind('App\\Events\\UpdateUserNotification', function (data) {
                            app.getNotifications();
                        });
                    }
                }
            });
        </script>
    <?php endif; ?>
<?php endif; ?>

<?php echo $__env->make($theme . 'partials.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/layouts/app.blade.php ENDPATH**/ ?>