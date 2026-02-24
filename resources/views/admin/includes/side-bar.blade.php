<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>

<div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark">
    <div id='m_ver_menu'
         class='m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark'
         m-menu-vertical='1' m-menu-scrollable='0' m-menu-dropdown-timeout='500'>
        <ul class='m-menu__nav  m-menu__nav--dropdown-submenu-arrow'>

            <li class="m-menu__item " aria-haspopup="true" title="Website">
                <a  href="{{ url('/') }}" target="_blank" class="m-menu__link">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">Website</span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item" aria-haspopup="true" title="Website">
                <a  href="{{ route('admin.dashboard') }}" class="m-menu__link" title="Admin Dashboard">
                    <i class="m-menu__link-icon flaticon-dashboard {{ request()->is('admin/dashboard') ? 'text-secondary' : '' }}"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text {{ request()->is('admin/dashboard') ? 'text-secondary' : '' }}">Dashboard</span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__section">
                <h4 class="m-menu__section-text">Component</h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>

            <li class="m-menu__item  m-menu__item--submenu
                {{ request()->is(array_map(fn($route) => "*{$route}*", array_column(config('masala.side-bar'), 'route'))) ? 'm-menu__item--open' : '' }}"
                aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-imac"></i>
                    <span class="m-menu__link-text">Manage Website</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        @foreach(config('masala.side-bar') ?? [] as $page)
                            @if(Route::has(sprintf('admin.%s.index', data_get($page, 'route'))))
                                <li class="m-menu__item m-menu__item"
                                    aria-haspopup="true">
                                    <a href="{{ route(sprintf('admin.%s.index', data_get($page, 'route'))) }}" class="m-menu__link">
                                        <i class="m-menu__link-icon flaticon-browser {{ request()->is(sprintf('admin/%s*', data_get($page, 'route'))) ? 'text-secondary' : '' }}"></i>
                                        <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text {{ request()->is(sprintf('admin/%s*', data_get($page, 'route'))) ? 'text-secondary' : '' }}">
                                                {{ data_get($page, 'name') }}
                                            </span>
                                        </span>
                                    </span>
                                    </a>
                                </li>
                            @endif
                        @endforeach

                        {{--@if(Route::has('admin.advertises.index'))
                            <li class="m-menu__item m-menu__item"
                                aria-haspopup="true">
                                <a href="{{ route('admin.advertises.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/advertises*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text {{ request()->is('admin/advertises*') ? 'text-secondary' : '' }}">Advertises</span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('admin.banners.index'))
                            <li class="m-menu__item m-menu__item"
                                aria-haspopup="true">
                                <a href="{{ route('admin.banners.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/banners*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text {{ request()->is('admin/banners*') ? 'text-secondary' : '' }}">Banners</span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('admin.blogs.index'))
                            <li class="m-menu__item m-menu__item"
                                aria-haspopup="true">
                                <a href="{{ route('admin.blogs.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/blogs*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text {{ request()->is('admin/blogs*') ? 'text-secondary' : '' }}">Blogs</span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('admin.brands.index'))
                            <li class="m-menu__item m-menu__item"
                                aria-haspopup="true">
                                <a href="{{ route('admin.brands.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/brands*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text {{ request()->is('admin/brands*') ? 'text-secondary' : '' }}">Brands</span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('admin.categories.index'))
                            <li class="m-menu__item m-menu__item" aria-haspopup="true">
                                <a href="{{ route('admin.categories.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/categories*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                    <span class="m-menu__link-wrap">
                                        <span class="m-menu__link-text {{ request()->is('admin/categories*') ? 'text-secondary' : '' }}">Categories</span>
                                    </span>
                                </span>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('admin.faqs.index'))
                            <li class="m-menu__item m-menu__item" aria-haspopup="true">
                                <a href="{{ route('admin.faqs.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/faqs*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                    <span class="m-menu__link-wrap">
                                        <span class="m-menu__link-text {{ request()->is('admin/faqs*') ? 'text-secondary' : '' }}">FAQs</span>
                                    </span>
                                </span>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('admin.facilities.index'))
                            <li class="m-menu__item m-menu__item" aria-haspopup="true">
                                <a href="{{ route('admin.facilities.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/facilities*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                    <span class="m-menu__link-wrap">
                                        <span class="m-menu__link-text {{ request()->is('admin/facilities*') ? 'text-secondary' : '' }}">Facilities</span>
                                    </span>
                                </span>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('admin.galleries.index'))
                            <li class="m-menu__item m-menu__item" aria-haspopup="true">
                                <a href="{{ route('admin.galleries.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/galleries*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                    <span class="m-menu__link-wrap">
                                        <span class="m-menu__link-text {{ request()->is('admin/galleries*') ? 'text-secondary' : '' }}">Gallery</span>
                                    </span>
                                </span>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('admin.menus.index'))
                            <li class="m-menu__item m-menu__item" aria-haspopup="true">
                                <a href="{{ route('admin.menus.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/menus*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text {{ request()->is('admin/menus*') ? 'text-secondary' : '' }}">Menus</span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('admin.pages.index'))
                            <li class="m-menu__item m-menu__item" aria-haspopup="true">
                                <a href="{{ route('admin.pages.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/pages*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text {{ request()->is('admin/pages*') ? 'text-secondary' : '' }}">Pages</span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('admin.testimonials.index'))
                            <li class="m-menu__item m-menu__item" aria-haspopup="true">
                                <a href="{{ route('admin.testimonials.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-browser {{ request()->is('admin/testimonials*') ? 'text-secondary' : '' }}"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text {{ request()->is('admin/testimonials*') ? 'text-secondary' : '' }}">Testimonial</span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        @endif--}}
                    </ul>
                </div>
            </li>

            <li class="m-menu__item m-menu__item--submenu {{ request()->is('admin/admins*') ? 'm-menu__item--open' : '' }}"
                aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-user"></i>
                    <span class="m-menu__link-text">Manage User</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item  m-menu__item--submenu"
                            aria-haspopup="true" m-menu-submenu-toggle="hover">
                            <a href="{{ route('admin.admins.index') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot {{ request()->is('admin/admins*') ? 'text-secondary' : '' }}">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text {{ request()->is('admin/admins*') ? 'text-secondary' : '' }}">Admins</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="m-menu__item " aria-haspopup="true" title="Website">
                <a  href="{{ route('admin.contacts') }}" class="m-menu__link" title="Admin Dashboard">
                    <i class="m-menu__link-icon flaticon-email {{ request()->is('admin/contact*') ? 'text-secondary' : '' }}"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text {{ request()->is('admin/contact*') ? 'text-secondary' : '' }}">Contact</span>
                        </span>
                    </span>
                </a>
            </li>

        </ul>
    </div>
</div>
