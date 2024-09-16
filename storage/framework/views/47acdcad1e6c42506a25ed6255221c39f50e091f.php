<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en" <?php if(session()->get('rtl') == 1): ?> dir="rtl" <?php endif; ?>>

<head  <?php if(session()->get('rtl') == 1): ?> dir="rtl" <?php endif; ?>>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

<?php echo $__env->make('partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldPushContent('css-lib'); ?>
<!---- Here is your Css Library----->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset($themeTrue . 'css/bootstrap.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/user-panel-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/flatpickr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue . 'css/fullcalendar.min.css')); ?>">

    <!----  Push your custom css  ----->
    <?php echo $__env->yieldPushContent('style'); ?>

</head>

<body class="<?php if(session()->get('rtl') == 1): ?> rtl <?php endif; ?>">

<div class="dashboard-wrapper">
    <?php echo $__env->make($theme . 'partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<!-- content -->
<div id="content">
    <div class="overlay">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="sidebar-toggler" onclick="toggleSideMenu()">
                    <i class="far fa-bars"></i>
                </button>
                <span class="navbar-text">

                    <?php if(Auth::check()): ?>
                        <?php echo $__env->make($theme . 'partials.pushNotify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                        <div class="user-panel">
                            <span class="profile">
                                <img src="<?php echo e(getFile(config('location.user.path') . optional(Auth::user())->image)); ?>"
                                     class="img-fluid" alt=""/>
                            </span>
                            <ul class="user-dropdown">
                                <li>
                                    <a href="<?php echo e(route('user.profile')); ?>"> <i class="fal fa-user"></i> <?php echo app('translator')->get('Profile'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('user.profile')); ?>"> <i class="fal fa-key"></i> <?php echo app('translator')->get('Change Password'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fal fa-sign-out-alt"></i> <?php echo app('translator')->get('Sign Out'); ?> </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                          class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </span>
            </div>
        </nav>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>


<?php echo $__env->yieldPushContent('loadModal'); ?>
<?php echo $__env->yieldPushContent('extra-content'); ?>



<!----  How to load JS Library, Here is an example ----->
<script src="<?php echo e(asset('assets/global/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/user-script.js')); ?>"></script>

<script src="<?php echo e(asset($themeTrue . 'js/flatpickr.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/Chart.min.js')); ?>"></script>
<script src="<?php echo e(asset($themeTrue . 'js/fullcalendar.min.js')); ?>"></script>

<?php echo $__env->yieldPushContent('extra-js'); ?>

<script src="<?php echo e(asset('assets/global/js/notiflix-aio-2.7.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/js/pusher.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/js/vue.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/js/axios.min.js')); ?>"></script>


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
<?php echo $__env->yieldPushContent('script'); ?>


<?php echo $__env->make($theme . 'partials.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $(document).ready(function () {
        $(".language").find("select").change(function () {
            window.location.href = "<?php echo e(route('language')); ?>/" + $(this).val()
        })
    })
</script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/layouts/user.blade.php ENDPATH**/ ?>