<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.dashboard')); ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon text-indigo"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Dashboard'); ?></span>
                    </a>
                </li>

                <?php if (\Illuminate\Support\Facades\Blade::check('shop')): ?>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Manage Product '); ?></span></li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.product.category.list', 'admin.product.category.create', 'admin.product.category.edit*',
                                                         'admin.product.attribute.list', 'admin.product.attribute.create', 'admin.product.attribute.edit*',
                                                         'admin.product.list','admin.product.create', 'admin.product.edit*',
                                                         'admin.product.stock.list', 'admin.product.stock.create', 'admin.product.stock.edit*', 'admin.product.search', 'admin.product.stock.search'],3)); ?>">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fab fa-product-hunt text-indigo"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Manage Product'); ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line <?php echo e(menuActive(['admin.product.category.list', 'admin.product.category.create', 'admin.product.category.edit*',
                                                         'admin.product.attribute.list', 'admin.product.attribute.create', 'admin.product.attribute.edit*',
                                                         'admin.product.list','admin.product.create', 'admin.product.edit*',
                                                         'admin.product.stock.list', 'admin.product.stock.create', 'admin.product.stock.edit*', 'admin.product.search', 'admin.product.stock.search'],1)); ?>">
                        <li class="sidebar-item <?php echo e(menuActive(['admin.product.category.list','admin.product.category.create','admin.product.category.edit*'])); ?>">
                            <a href="<?php echo e(route('admin.product.category.list')); ?>"
                               class="sidebar-link <?php echo e(menuActive(['admin.product.category.list','admin.product.category.create','admin.product.category.edit*'])); ?>">
                                <span class="hide-menu"><?php echo app('translator')->get('Category'); ?></span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo e(menuActive(['admin.product.attribute.list','admin.product.attribute.create','admin.product.attribute.edit*'])); ?>">
                            <a href="<?php echo e(route('admin.product.attribute.list')); ?>"
                               class="sidebar-link <?php echo e(menuActive(['admin.product.attribute.list','admin.product.attribute.create','admin.product.attribute.edit*'])); ?>">
                                <span class="hide-menu"><?php echo app('translator')->get('Attribute'); ?></span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo e(menuActive(['admin.product.list','admin.product.create','admin.product.list.edit*', 'admin.product.search'])); ?>">
                            <a href="<?php echo e(route('admin.product.list')); ?>"
                               class="sidebar-link <?php echo e(menuActive(['admin.product.list','admin.product.create','admin.product.list.edit*', 'admin.product.search'])); ?>">
                                <span class="hide-menu"><?php echo app('translator')->get('Products'); ?></span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo e(menuActive(['admin.product.stock.list','admin.product.stock.create','admin.product.stock.edit*', 'admin.product.stock.search'])); ?>">
                            <a href="<?php echo e(route('admin.product.stock.list')); ?>"
                               class="sidebar-link <?php echo e(menuActive(['admin.product.stock.list','admin.product.stock.create','admin.product.stock.edit*', 'admin.product.stock.search'])); ?>">
                                <span class="hide-menu"><?php echo app('translator')->get('Stock'); ?></span>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php endif; ?>


                <?php if (\Illuminate\Support\Facades\Blade::check('bookAppointment')): ?>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Book Appointment '); ?></span></li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.appointment.list', 'admin.edit.appointment', 'admin.search.appointment'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.appointment.list', 'all_list')); ?>"
                       aria-expanded="false">
                        <i class="fa fa-calendar-check text-orange"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Appointment List'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (\Illuminate\Support\Facades\Blade::check('plan')): ?>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Manage Plan'); ?></span></li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.plan.list', 'admin.plan.create', 'admin.plan.edit'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.plan.list')); ?>" aria-expanded="false">
                        <i class="fas fa-outdent text-purple"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Manage Plan'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.plan.sold.list', 'admin.search.plan.sold'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.plan.sold.list')); ?>" aria-expanded="false">
                        <i class="fas fa-shopping-basket text-indigo"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Plan Sold List'); ?></span>
                    </a>
                </li>
                <?php endif; ?>


                <?php if (\Illuminate\Support\Facades\Blade::check('shop')): ?>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Manage Product Order'); ?></span></li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.order.list', 'admin.order.product.info', 'admin.product.order.search'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.order.list')); ?>" aria-expanded="false">
                        <i class="fa fa-cart-arrow-down text-orange"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Order List'); ?></span>
                    </a>
                </li>
                <?php endif; ?>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('All Transaction '); ?></span></li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.transaction*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.transaction')); ?>" aria-expanded="false">
                        <i class="fas fa-exchange-alt text-purple"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Transaction'); ?></span>
                    </a>
                </li>


                
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Manage User'); ?></span></li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.users','admin.users.search','admin.user-edit*','admin.send-email*','admin.user*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.users')); ?>" aria-expanded="false">
                        <i class="fas fa-users text-dark"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('All User'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.email-send')); ?>"
                       aria-expanded="false">
                        <i class="fas fa-envelope-open text-purple"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Send Email'); ?></span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Payment Settings'); ?></span></li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.payment.methods','admin.edit.payment.methods'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.payment.methods')); ?>"
                       aria-expanded="false">
                        <i class="fas fa-credit-card text-red"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Payment Methods'); ?></span>
                    </a>
                </li>



                <li class="sidebar-item <?php echo e(menuActive(['admin.payment.log','admin.payment.search'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.payment.log')); ?>" aria-expanded="false">
                        <i class="fas fa-history text-indigo"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Payment Log'); ?></span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Support Tickets'); ?></span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.ticket')); ?>" aria-expanded="false">
                        <i class="fas fa-ticket-alt text-info"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('All Tickets'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.ticket',['open'])); ?>"
                       aria-expanded="false">
                        <i class="fas fa-spinner text-teal"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Open Ticket'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.ticket',['closed'])); ?>"
                       aria-expanded="false">
                        <i class="fas fa-times-circle text-danger"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Closed Ticket'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.ticket',['answered'])); ?>"
                       aria-expanded="false">
                        <i class="fas fa-reply text-green"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Answered Ticket'); ?></span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Subscriber'); ?></span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.subscriber.index')); ?>" aria-expanded="false">
                        <i class="fas fa-envelope-open text-teal"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Subscriber List'); ?></span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Controls'); ?></span></li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.basic-controls')); ?>" aria-expanded="false">
                        <i class="fas fa-cogs text-primary"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Basic Controls'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-envelope text-success"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Email Settings'); ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.email-controls')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('Email Controls'); ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.email-template.show')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('Email Template'); ?> </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-mobile-alt text-danger"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('SMS Settings'); ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.sms.config')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('SMS Controls'); ?></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.sms-template')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('SMS Template'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-bell text-purple"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('In-app Notification'); ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.notify-config')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('Configuration'); ?></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.notify-template.show')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('Template'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item <?php echo e(menuActive(['admin.language.create','admin.language.edit*','admin.language.keywordEdit*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.language.index')); ?>"
                       aria-expanded="false">
                        <i class="fas fa-language text-teal"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Manage Language'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.plugin.config','admin.tawk.control','admin.fb.messenger.control','admin.google.recaptcha.control','admin.google.analytics.control'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.plugin.config')); ?>" aria-expanded="false">
                        <i class="fas fa-toolbox text-indigo"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Plugin Configuration'); ?></span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Theme Settings'); ?></span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.logo-seo')); ?>" aria-expanded="false">
                        <i class="fas fa-image text-purple text-orange"></i><span
                            class="hide-menu"><?php echo app('translator')->get('Manage Logo & SEO'); ?></span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.breadcrumb')); ?>" aria-expanded="false">
                        <i class="fas fa-file-image text-indigo"></i><span
                            class="hide-menu"><?php echo app('translator')->get('Manage Breadcrumb'); ?></span>
                    </a>
                </li>



                <?php if (\Illuminate\Support\Facades\Blade::check('blog')): ?>
                <li class="sidebar-item <?php echo e(menuActive(['admin.blog.category.list', 'admin.blog.category.create', 'admin.blog.category.edit*','admin.blog.list', 'admin.blog.create', 'admin.blog.edit*'],3)); ?>">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-book-reader text-dark"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Manage Blog'); ?></span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line <?php echo e(menuActive(['admin.blog.category.list', 'admin.blog.category.create', 'admin.blog.category.edit*','admin.blog.list', 'admin.blog.create', 'admin.blog.edit*'],1)); ?>">
                        <li class="sidebar-item <?php echo e(menuActive(['admin.blog.category.list','admin.blog.category.create','admin.blog.category.edit*'])); ?>">
                            <a href="<?php echo e(route('admin.blog.category.list')); ?>"
                               class="sidebar-link  <?php echo e(menuActive(['admin.blog.category.list','admin.blog.category.create','admin.blog.category.edit*'])); ?>">
                                <span class="hide-menu"><?php echo app('translator')->get('Category'); ?></span>
                            </a>
                        </li>


                        <li class="sidebar-item <?php echo e(menuActive(['admin.blog.list','admin.blog.create','admin.blog.edit*'])); ?>">
                            <a href="<?php echo e(route('admin.blog.list')); ?>"
                               class="sidebar-link <?php echo e(menuActive(['admin.blog.list','admin.blog.create','admin.blog.edit*'])); ?>">
                                <span class="hide-menu"><?php echo app('translator')->get('Blogs'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (\Illuminate\Support\Facades\Blade::check('service')): ?>
                <li class="sidebar-item <?php echo e(menuActive(['admin.service.list','admin.service.create','admin.service.edit*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.service.list')); ?>" aria-expanded="false">
                        <i class="fas fa-wrench text-red"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Manage Service'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (\Illuminate\Support\Facades\Blade::check('team')): ?>
                <li class="sidebar-item <?php echo e(menuActive(['admin.team.list','admin.team.create','admin.team.edit*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.team.list')); ?>" aria-expanded="false">
                        <i class="fas fa-user-plus text-teal"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Manage Team'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (\Illuminate\Support\Facades\Blade::check('gallery')): ?>
                <li class="sidebar-item <?php echo e(menuActive(['admin.gallery.tag.list', 'admin.gallery.items.list', 'admin.gallery.items.create', 'admin.gallery.items.edit*'],3)); ?>">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-images text-success"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Manage Gallery'); ?></span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line <?php echo e(menuActive(['admin.gallery.tag.list',  'admin.gallery.items.list', 'admin.gallery.items.create', 'admin.gallery.items.edit*'],1)); ?>">
                        <li class="sidebar-item <?php echo e(menuActive(['admin.gallery.tag.list','admin.gallery.tag.create','admin.gallery.tag.edit*'])); ?>">
                            <a href="<?php echo e(route('admin.gallery.tag.list')); ?>"
                               class="sidebar-link <?php echo e(menuActive(['admin.gallery.tag.list','admin.gallery.tag.create','admin.gallery.tag.edit*'])); ?>">
                                <span class="hide-menu"><?php echo app('translator')->get('Gallery Tags'); ?></span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo e(menuActive(['admin.gallery.items.list', 'admin.gallery.items.create', 'admin.gallery.items.edit*'])); ?>">
                            <a href="<?php echo e(route('admin.gallery.items.list')); ?>"
                               class="sidebar-link <?php echo e(menuActive(['admin.gallery.items.list', 'admin.gallery.items.create', 'admin.gallery.items.edit*'])); ?>">
                                <span class="hide-menu"><?php echo app('translator')->get('Gallery Items'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>


                <li class="sidebar-item <?php echo e(menuActive(['admin.template.show*'],3)); ?>">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-clipboard-list text-indigo"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Section Heading'); ?></span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line <?php echo e(menuActive(['admin.template.show*'],1)); ?>">

                        <?php $__currentLoopData = array_diff(array_keys(config('templates')),['message','template_media']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="sidebar-item <?php echo e(menuActive(['admin.template.show'.$name])); ?>">
                                <a class="sidebar-link <?php echo e(menuActive(['admin.template.show'.$name])); ?>"
                                   href="<?php echo e(route('admin.template.show',$name)); ?>">
                                    <span class="hide-menu"><?php echo app('translator')->get(ucfirst(kebab2Title($name))); ?></span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </li>


                <?php
                    $segments = request()->segments();
                    $last  = end($segments);
                ?>
                <li class="sidebar-item <?php echo e(menuActive(['admin.content.create','admin.content.show*'],3)); ?>">
                    <a class="sidebar-link has-arrow <?php echo e(Request::routeIs('admin.content.show',$last) ? 'active' : ''); ?>"
                       href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-clipboard-list text-teal"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Content Settings'); ?></span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line <?php echo e(menuActive(['admin.content.create','admin.content.show*'],1)); ?>">
                        <?php $__currentLoopData = array_diff(array_keys(config('contents')),['message','content_media']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="sidebar-item <?php echo e(($last == $name) ? 'active' : ''); ?> ">
                                <a class="sidebar-link <?php echo e(($last == $name) ? 'active' : ''); ?>"
                                   href="<?php echo e(route('admin.content.index',$name)); ?>">
                                    <span class="hide-menu"><?php echo app('translator')->get(ucfirst(kebab2Title($name))); ?></span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <li class="list-divider"></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>