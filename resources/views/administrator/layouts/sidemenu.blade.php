<div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
    <!--begin::Logo-->
    <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto pt-10" id="kt_aside_logo">
        <a href="index.html">
            <img alt="Logo" src="{{ template_administrator('assets/media/logos/logo-compact.svg') }}" class="h-55px" />
        </a>
    </div>
    <!--end::Logo-->
    <!--begin::Nav-->
    <div class="aside-nav d-flex flex-column flex-lg-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
        <!--begin::Primary menu-->
        <div id="kt_aside_menu"
            class="menu menu-column menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5"
            data-kt-menu="true">
            @foreach ($module as $row)
                @if ($row->menu_id == 0)
                    @if (showModule($row->identifier, $permissions))
                    <div class="menu-item py-2">
                        <a class="menu-link {{ Str::startsWith(url()->current(), url('/admin' . $row->url)) ? 'active' : '' }} menu-center"
                            href="/admin{{ $row->url }}" title="{{ $row->name }}" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon me-0">
                                <i class="{{ $row->icon }}"></i>
                            </span>
                        </a>
                    </div>
                    @endif
                @endif
            @endforeach
            @foreach ($menu as $row)
                @php
                    $isActive = false;
                    foreach ($row->module as $module) {
                        if (Str::startsWith(url()->current(), url('/admin' . $module->url))) {
                            $isActive = true;
                            break;
                        }
                    }
                @endphp
                @php
                $showModule = false;
                    foreach ($row->module as $module) {
                        if (showModule($module->identifier, $permissions)) {
                            $showModule = true;
                            break;
                        }
                    }
                @endphp
                @if ($showModule)
                <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" data-kt-menu-flip="bottom"
                    class="menu-item py-2">
                    <span class="menu-link {{ $isActive ? 'active' : '' }} menu-center" title="{{ $row->name }}"
                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                        data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="{{ $row->icon }}"></i>
                        </span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">{{ $row->name }}</span>
                            </div>
                        </div>

                        <div class="menu-item">
                            @foreach ($row->module as $item)
                                @if (showModule($item->identifier, $permissions))
                                <a class="menu-link" href="/admin{{ $item->url }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ $item->name }}</span>
                                </a>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <!--end::Primary menu-->
    </div>
    <!--end::Nav-->
    <!--begin::Footer-->
    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
        <!--begin::Menu-->
        <div class="mb-7">
            <button type="button"
                class="btn btm-sm btn-icon btn-color-gray-400 btn-active-color-primary btn-active-light"
                data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start"
                data-kt-menu-flip="top-end" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click"
                title="Quick actions">
                <!--begin::Svg Icon | path: icons/duotone/Communication/Dial-numbers.svg-->
                <span class="svg-icon svg-icon-2 svg-icon-lg-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                        version="1.1">
                        <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="2" />
                        <rect fill="#000000" x="4" y="10" width="4" height="4" rx="2" />
                        <rect fill="#000000" x="10" y="4" width="4" height="4" rx="2" />
                        <rect fill="#000000" x="10" y="10" width="4" height="4" rx="2" />
                        <rect fill="#000000" x="16" y="4" width="4" height="4" rx="2" />
                        <rect fill="#000000" x="16" y="10" width="4" height="4" rx="2" />
                        <rect fill="#000000" x="4" y="16" width="4" height="4" rx="2" />
                        <rect fill="#000000" x="10" y="16" width="4" height="4" rx="2" />
                        <rect fill="#000000" x="16" y="16" width="4" height="4" rx="2" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </button>
            <!--begin::Menu 2-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-200px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator mb-3 opacity-75"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">New Ticket</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">New Customer</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start"
                    data-kt-menu-flip="left-start, top">
                    <!--begin::Menu item-->
                    <a href="#" class="menu-link px-3">
                        <span class="menu-title">New Group</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu item-->
                    <!--begin::Menu sub-->
                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Admin Group</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Staff Group</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Member Group</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu sub-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">New Contact</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator mt-3 opacity-75"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content px-3 py-3">
                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                    </div>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu 2-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Footer-->
</div>
