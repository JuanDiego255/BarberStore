<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon text-indigo"></i>
                        <span class="hide-menu">@lang('Tablero')</span>
                    </a>
                </li>

                @shop
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Gestionar Product ')</span></li>
                <li class="sidebar-item {{menuActive(['admin.product.category.list', 'admin.product.category.create', 'admin.product.category.edit*',
                                                         'admin.product.attribute.list', 'admin.product.attribute.create', 'admin.product.attribute.edit*',
                                                         'admin.product.list','admin.product.create', 'admin.product.edit*',
                                                         'admin.product.stock.list', 'admin.product.stock.create', 'admin.product.stock.edit*', 'admin.product.search', 'admin.product.stock.search'],3)}}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fab fa-product-hunt text-indigo"></i>
                        <span class="hide-menu">@lang('Gestionar Product')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line {{menuActive(['admin.product.category.list', 'admin.product.category.create', 'admin.product.category.edit*',
                                                         'admin.product.attribute.list', 'admin.product.attribute.create', 'admin.product.attribute.edit*',
                                                         'admin.product.list','admin.product.create', 'admin.product.edit*',
                                                         'admin.product.stock.list', 'admin.product.stock.create', 'admin.product.stock.edit*', 'admin.product.search', 'admin.product.stock.search'],1)}}">
                        <li class="sidebar-item {{menuActive(['admin.product.category.list','admin.product.category.create','admin.product.category.edit*'])}}">
                            <a href="{{ route('admin.product.category.list') }}"
                               class="sidebar-link {{menuActive(['admin.product.category.list','admin.product.category.create','admin.product.category.edit*'])}}">
                                <span class="hide-menu">@lang('Categoría')</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{menuActive(['admin.product.attribute.list','admin.product.attribute.create','admin.product.attribute.edit*'])}}">
                            <a href="{{ route('admin.product.attribute.list') }}"
                               class="sidebar-link {{menuActive(['admin.product.attribute.list','admin.product.attribute.create','admin.product.attribute.edit*'])}}">
                                <span class="hide-menu">@lang('Attribute')</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{menuActive(['admin.product.list','admin.product.create','admin.product.list.edit*', 'admin.product.search'])}}">
                            <a href="{{ route('admin.product.list') }}"
                               class="sidebar-link {{menuActive(['admin.product.list','admin.product.create','admin.product.list.edit*', 'admin.product.search'])}}">
                                <span class="hide-menu">@lang('Products')</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{menuActive(['admin.product.stock.list','admin.product.stock.create','admin.product.stock.edit*', 'admin.product.stock.search'])}}">
                            <a href="{{ route('admin.product.stock.list') }}"
                               class="sidebar-link {{menuActive(['admin.product.stock.list','admin.product.stock.create','admin.product.stock.edit*', 'admin.product.stock.search'])}}">
                                <span class="hide-menu">@lang('Stock')</span>
                            </a>
                        </li>

                    </ul>
                </li>
                @endshop


                @bookAppointment
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Book Cita ')</span></li>

                <li class="sidebar-item {{menuActive(['admin.appointment.list', 'admin.edit.appointment', 'admin.search.appointment'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.appointment.list', 'all_list') }}"
                       aria-expanded="false">
                        <i class="fa fa-calendar-check text-orange"></i>
                        <span class="hide-menu">@lang('Cita Lista')</span>
                    </a>
                </li>
                @endbookAppointment

                @plan
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Gestionar Plan')</span></li>

                <li class="sidebar-item {{menuActive(['admin.plan.list', 'admin.plan.create', 'admin.plan.edit'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.plan.list') }}" aria-expanded="false">
                        <i class="fas fa-outdent text-purple"></i>
                        <span class="hide-menu">@lang('Gestionar Plan')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.plan.sold.list', 'admin.search.plan.sold'],3)}}">
                    <a class="sidebar-link" href="{{  route('admin.plan.sold.list') }}" aria-expanded="false">
                        <i class="fas fa-shopping-basket text-indigo"></i>
                        <span class="hide-menu">@lang('Plan Sold Lista')</span>
                    </a>
                </li>
                @endplan


                @shop
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Gestionar Product Order')</span></li>

                <li class="sidebar-item {{menuActive(['admin.order.list', 'admin.order.product.info', 'admin.product.order.search'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.order.list') }}" aria-expanded="false">
                        <i class="fa fa-cart-arrow-down text-orange"></i>
                        <span class="hide-menu">@lang('Order Lista')</span>
                    </a>
                </li>
                @endshop


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('All Transacción ')</span></li>

                <li class="sidebar-item {{menuActive(['admin.transaction*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.transaction') }}" aria-expanded="false">
                        <i class="fas fa-exchange-alt text-purple"></i>
                        <span class="hide-menu">@lang('Transacción')</span>
                    </a>
                </li>


                {{--Gestionar User--}}
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Gestionar User')</span></li>

                <li class="sidebar-item {{menuActive(['admin.users','admin.users.search','admin.user-edit*','admin.send-email*','admin.user*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.users') }}" aria-expanded="false">
                        <i class="fas fa-users text-dark"></i>
                        <span class="hide-menu">@lang('All User')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.email-send') }}"
                       aria-expanded="false">
                        <i class="fas fa-envelope-open text-purple"></i>
                        <span class="hide-menu">@lang('Enviar Correo electrónico')</span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Pago Configuración')</span></li>
                <li class="sidebar-item {{menuActive(['admin.payment.methods','admin.edit.payment.methods'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payment.methods')}}"
                       aria-expanded="false">
                        <i class="fas fa-credit-card text-red"></i>
                        <span class="hide-menu">@lang('Pago Methods')</span>
                    </a>
                </li>



                <li class="sidebar-item {{menuActive(['admin.payment.log','admin.payment.search'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payment.log')}}" aria-expanded="false">
                        <i class="fas fa-history text-indigo"></i>
                        <span class="hide-menu">@lang('Pago Log')</span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Soporte Tickets')</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.ticket')}}" aria-expanded="false">
                        <i class="fas fa-ticket-alt text-info"></i>
                        <span class="hide-menu">@lang('All Tickets')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.ticket',['open']) }}"
                       aria-expanded="false">
                        <i class="fas fa-spinner text-teal"></i>
                        <span class="hide-menu">@lang('Open Ticket')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.ticket',['closed']) }}"
                       aria-expanded="false">
                        <i class="fas fa-times-circle text-danger"></i>
                        <span class="hide-menu">@lang('Closed Ticket')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.ticket',['answered']) }}"
                       aria-expanded="false">
                        <i class="fas fa-reply text-green"></i>
                        <span class="hide-menu">@lang('Answered Ticket')</span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Subscriber')</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.subscriber.index')}}" aria-expanded="false">
                        <i class="fas fa-envelope-open text-teal"></i>
                        <span class="hide-menu">@lang('Subscriber Lista')</span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Controls')</span></li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.basic-controls')}}" aria-expanded="false">
                        <i class="fas fa-cogs text-primary"></i>
                        <span class="hide-menu">@lang('Basic Controls')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-envelope text-success"></i>
                        <span class="hide-menu">@lang('Correo electrónico Configuración')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('admin.email-controls')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Correo electrónico Controls')</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.email-template.show')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Correo electrónico Template') </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-mobile-alt text-danger"></i>
                        <span class="hide-menu">@lang('SMS Configuración')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.sms.config') }}" class="sidebar-link">
                                <span class="hide-menu">@lang('SMS Controls')</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.sms-template') }}" class="sidebar-link">
                                <span class="hide-menu">@lang('SMS Template')</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-bell text-purple"></i>
                        <span class="hide-menu">@lang('In-app Notification')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('admin.notify-config')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Configuration')</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.notify-template.show') }}" class="sidebar-link">
                                <span class="hide-menu">@lang('Template')</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item {{menuActive(['admin.language.create','admin.language.edit*','admin.language.keywordEdit*'],3)}}">
                    <a class="sidebar-link" href="{{  route('admin.language.index') }}"
                       aria-expanded="false">
                        <i class="fas fa-language text-teal"></i>
                        <span class="hide-menu">@lang('Gestionar Idioma')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.plugin.config','admin.tawk.control','admin.fb.messenger.control','admin.google.recaptcha.control','admin.google.analytics.control'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.plugin.config')}}" aria-expanded="false">
                        <i class="fas fa-toolbox text-indigo"></i>
                        <span class="hide-menu">@lang('Plugin Configuration')</span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Tema Configuración')</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.logo-seo')}}" aria-expanded="false">
                        <i class="fas fa-image text-purple text-orange"></i><span
                            class="hide-menu">@lang('Gestionar Logo & SEO')</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.breadcrumb')}}" aria-expanded="false">
                        <i class="fas fa-file-image text-indigo"></i><span
                            class="hide-menu">@lang('Gestionar Breadcrumb')</span>
                    </a>
                </li>



                @blog
                <li class="sidebar-item {{menuActive(['admin.blog.category.list', 'admin.blog.category.create', 'admin.blog.category.edit*','admin.blog.list', 'admin.blog.create', 'admin.blog.edit*'],3)}}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-book-reader text-dark"></i>
                        <span class="hide-menu">@lang('Gestionar Blog')</span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line {{menuActive(['admin.blog.category.list', 'admin.blog.category.create', 'admin.blog.category.edit*','admin.blog.list', 'admin.blog.create', 'admin.blog.edit*'],1)}}">
                        <li class="sidebar-item {{menuActive(['admin.blog.category.list','admin.blog.category.create','admin.blog.category.edit*'])}}">
                            <a href="{{ route('admin.blog.category.list') }}"
                               class="sidebar-link  {{menuActive(['admin.blog.category.list','admin.blog.category.create','admin.blog.category.edit*'])}}">
                                <span class="hide-menu">@lang('Categoría')</span>
                            </a>
                        </li>


                        <li class="sidebar-item {{menuActive(['admin.blog.list','admin.blog.create','admin.blog.edit*'])}}">
                            <a href="{{ route('admin.blog.list') }}"
                               class="sidebar-link {{menuActive(['admin.blog.list','admin.blog.create','admin.blog.edit*'])}}">
                                <span class="hide-menu">@lang('Blogs')</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endblog

                @service
                <li class="sidebar-item {{menuActive(['admin.service.list','admin.service.create','admin.service.edit*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.service.list') }}" aria-expanded="false">
                        <i class="fas fa-wrench text-red"></i>
                        <span class="hide-menu">@lang('Gestionar Service')</span>
                    </a>
                </li>
                @endservice

                @team
                <li class="sidebar-item {{menuActive(['admin.team.list','admin.team.create','admin.team.edit*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.team.list') }}" aria-expanded="false">
                        <i class="fas fa-user-plus text-teal"></i>
                        <span class="hide-menu">@lang('Gestionar Team')</span>
                    </a>
                </li>
                @endteam

                @gallery
                <li class="sidebar-item {{menuActive(['admin.gallery.tag.list', 'admin.gallery.items.list', 'admin.gallery.items.create', 'admin.gallery.items.edit*'],3)}}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-images text-success"></i>
                        <span class="hide-menu">@lang('Gestionar Gallery')</span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line {{menuActive(['admin.gallery.tag.list',  'admin.gallery.items.list', 'admin.gallery.items.create', 'admin.gallery.items.edit*'],1)}}">
                        <li class="sidebar-item {{menuActive(['admin.gallery.tag.list','admin.gallery.tag.create','admin.gallery.tag.edit*'])}}">
                            <a href="{{ route('admin.gallery.tag.list') }}"
                               class="sidebar-link {{menuActive(['admin.gallery.tag.list','admin.gallery.tag.create','admin.gallery.tag.edit*'])}}">
                                <span class="hide-menu">@lang('Gallery Tags')</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ menuActive(['admin.gallery.items.list', 'admin.gallery.items.create', 'admin.gallery.items.edit*']) }}">
                            <a href="{{ route('admin.gallery.items.list') }}"
                               class="sidebar-link {{ menuActive(['admin.gallery.items.list', 'admin.gallery.items.create', 'admin.gallery.items.edit*']) }}">
                                <span class="hide-menu">@lang('Gallery Items')</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endgallery


                <li class="sidebar-item {{menuActive(['admin.template.show*'],3)}}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-clipboard-list text-indigo"></i>
                        <span class="hide-menu">@lang('Section Heading')</span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line {{menuActive(['admin.template.show*'],1)}}">

                        @foreach(array_diff(array_keys(config('templates')),['message','template_media']) as $name)
                            <li class="sidebar-item {{ menuActive(['admin.template.show'.$name]) }}">
                                <a class="sidebar-link {{ menuActive(['admin.template.show'.$name]) }}"
                                   href="{{ route('admin.template.show',$name) }}">
                                    <span class="hide-menu">@lang(ucfirst(kebab2Title($name)))</span>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </li>


                @php
                    $segments = request()->segments();
                    $last  = end($segments);
                @endphp
                <li class="sidebar-item {{menuActive(['admin.content.create','admin.content.show*'],3)}}">
                    <a class="sidebar-link has-arrow {{Request::routeIs('admin.content.show',$last) ? 'active' : '' }}"
                       href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-clipboard-list text-teal"></i>
                        <span class="hide-menu">@lang('Content Configuración')</span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line {{menuActive(['admin.content.create','admin.content.show*'],1)}}">
                        @foreach(array_diff(array_keys(config('contents')),['message','content_media']) as $name)
                            <li class="sidebar-item {{($last == $name) ? 'active' : '' }} ">
                                <a class="sidebar-link {{($last == $name) ? 'active' : '' }}"
                                   href="{{ route('admin.content.index',$name) }}">
                                    <span class="hide-menu">@lang(ucfirst(kebab2Title($name)))</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="list-divider"></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
