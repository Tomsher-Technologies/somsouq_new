<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block text-left">
                <img class="mw-100" height="100" src="{{ asset('assets/img/logo.png') }}"
                     alt="{{ env('APP_NAME') }}">
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text"
                       name="" placeholder="{{ translate('Search in menu') }}" id="menu-search"
                       onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Dashboard') }}</span>
                    </a>
                </li>

                @can('category')
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('categories.index') }}" class="aiz-side-nav-link">
                            <i class="las la-project-diagram aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Categories') }}</span>
                        </a>
                    </li>
                @endcan


                <!-- Sellers -->

                {{-- <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Sellers') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">

                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('Payouts') }}</span>
                            </a>
                        </li>

                    </ul>
                </li> --}}


                @can('uploads')
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('uploaded-files.index') }}"
                           class="aiz-side-nav-link {{ areActiveRoutes(['uploaded-files.create']) }}">
                            <i class="las la-upload aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Uploaded Files') }}</span>
                        </a>
                    </li>
                @endcan

                @can('locations')
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-map-marker aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Locations') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('states.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['states.index', 'states.edit', 'states.update']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('States') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('cities.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['cities.index', 'cities.edit', 'cities.update']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Cities') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('ad_post')
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Ad Post') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('post.list') }}" class="aiz-side-nav-link {{ areActiveRoutes(['post.list', 'post.preview']) }}">
                                    <span class="aiz-side-nav-text">Ad Lists</span>
                                </a>
                            </li>

                            @can('brand')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('brand.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['brand.index', 'brand.create', 'brand.edit']) }}">
                                        <span class="aiz-side-nav-text">Brand</span>
                                    </a>
                                </li>
                            @endcan

                            @can('color')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('color.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['color.index', 'color.create', 'color.edit']) }}">
                                        <span class="aiz-side-nav-text">Color</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('vehicle')
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-car-side aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Vehicle</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @can('body_type')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('body.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['body.index', 'body.create', 'body.edit']) }}">
                                        <span class="aiz-side-nav-text">Car Body Type</span>
                                    </a>
                                </li>
                            @endcan
                            @can('parts_type')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('parts.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['parts.index', 'parts.create', 'parts.edit']) }}">
                                        <span class="aiz-side-nav-text">Parts Type</span>
                                    </a>
                                </li>
                            @endcan

                            @can('heavy_equipment')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('equipment.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['equipment.index', 'equipment.create', 'equipment.edit']) }}">
                                        <span class="aiz-side-nav-text">Heavy Equipment Type</span>
                                    </a>
                                </li>
                            @endcan

                            @can('boat_type')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('boat.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['boat.index', 'boat.create', 'boat.edit']) }}">
                                        <span class="aiz-side-nav-text">Boat Type</span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan

                @can('fashion')
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-hat-cowboy aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Fashion</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('fashion-type.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['fashion-type.index', 'fashion-type.create', 'fashion-type.edit']) }}">
                                    <span class="aiz-side-nav-text">Type</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('variant.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['variant.index', 'variant.create', 'variant.edit']) }}">
                                    <span class="aiz-side-nav-text">Size variant</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('material.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['material.index', 'material.create', 'material.edit']) }}">
                                    <span class="aiz-side-nav-text">Material</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('occasion.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['occasion.index', 'occasion.create', 'occasion.edit']) }}">
                                    <span class="aiz-side-nav-text">Occasion</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('stone.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['stone.index', 'stone.create', 'stone.edit']) }}">
                                    <span class="aiz-side-nav-text">Gemstone</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('electronic')
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-plug aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Electronic</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('electronic-type.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['electronic-type.index', 'electronic-type.create', 'electronic-type.edit']) }}">
                                    <span class="aiz-side-nav-text">Type</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('genre.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['genre.index', 'genre.create', 'genre.edit']) }}">
                                    <span class="aiz-side-nav-text">Genre</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('platform.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['platform.index', 'platform.create', 'platform.edit']) }}">
                                    <span class="aiz-side-nav-text">Platform</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('report')
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('report.index') }}" class="aiz-side-nav-link">
                            <i class="las la-file-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Ad reports</span>
                        </a>
                    </li>
                @endcan

                @can('safety_tips')
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('safety_tip.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['safety_tip.index', 'safety_tip.create', 'safety_tip.edit']) }}">
                            <i class="las la-lightbulb aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Safety Tips</span>
                        </a>
                    </li>
                @endcan

                @can('general_settings')
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('general_setting.index') }}" class="aiz-side-nav-link">
                            <i class="las la-wrench aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('General Settings') }}</span>
                        </a>
                    </li>
                @endcan

                @can('user')
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('user.list') }}" class="aiz-side-nav-link {{ areActiveRoutes(['user.list']) }}">
                            <i class="las la-user aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('User') }}</span>
                        </a>
                    </li>
                @endcan

                @can('roles')
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('roles.index') }}" class="aiz-side-nav-link">
                            <i class="las la-lock aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('User Roles') }}</span>
                        </a>
                    </li>
                @endcan

                @can('staffs')
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('staffs.index') }}" class="aiz-side-nav-link">
                            <i class="las la-user aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Staffs') }}</span>
                        </a>
                    </li>
                @endcan

                @can('contact')
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('contact.list') }}" class="aiz-side-nav-link {{ areActiveRoutes(['contact.list']) }}">
                            <i class="las la-address-book aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Contact</span>
                        </a>
                    </li>
                @endcan

                @can('pages')
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-map-marker aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Pages</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @can('tutorial')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('tutorial.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['tutorial.index', 'tutorial.create', 'tutorial.edit']) }}">
                                        <span class="aiz-side-nav-text">Tutorial</span>
                                    </a>
                                </li>
                            @endcan

                            @can('about')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('about.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['contact.index']) }}">
                                        <span class="aiz-side-nav-text">About</span>
                                    </a>
                                </li>
                            @endcan

                            @can('help')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('help.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['help.index', 'help.create']) }}">
                                        <span class="aiz-side-nav-text">Help</span>
                                    </a>
                                </li>
                            @endcan

                            @can('term_condition')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('condition.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['condition.index', 'condition.create', 'condition.edit']) }}">
                                        <span class="aiz-side-nav-text">Term and Condition</span>
                                    </a>
                                </li>
                            @endcan

                            @can('privacy_policy')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('policy.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['policy.index', 'policy.create', 'policy.edit']) }}">
                                        <span class="aiz-side-nav-text">Privacy Policy</span>
                                    </a>
                                </li>
                            @endcan

                            @can('buy_sell')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('buy.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['buy.index', 'buy.create', 'buy.edit']) }}">
                                        <span class="aiz-side-nav-text">Buy sell</span>
                                    </a>
                                </li>
                            @endcan

                            <li class="aiz-side-nav-item">
                                <a href="{{ route('copy-right.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['copy-right.index', 'copy-right.create', 'buy.edit']) }}">
                                    <span class="aiz-side-nav-text">Copyright policy</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcan

            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
