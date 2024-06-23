<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Jet Theme | Keenthemes</title>
    <meta name="description"
        content="Jet admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="keywords"
        content="Jet theme, bootstrap, bootstrap 5, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
    <link rel="canonical" href="Https://preview.keenthemes.com/jet-free" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{template_administrator('assets/media/logos/favicon.ico')}}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{template_administrator('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{template_administrator('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{template_administrator('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset_administrator('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    @stack('styles')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
    <div id="audioContainer" class="audioContainer">
        <!-- Other content in the container -->
     </div>
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside aside-extended bg-white" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                <!--begin::Primary-->
                @include('administrator.layouts.sidemenu')
                <!--end::Primary-->
                <!--begin::Action-->
                <!--end::Action-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                @include('administrator.layouts.headbar')
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    @yield('content')
                    <!--end::Container-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                @include('administrator.layouts.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->
    @include('administrator.layouts.activities')
    <!--end::Activities drawer-->
    <!--begin::Scrolltop-->
    @include('administrator.layouts.scrolltop')
    <!--end::Scrolltop-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{template_administrator('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{template_administrator('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{template_administrator('assets/js/custom/widgets.js')}}"></script>
    <script src="{{template_administrator('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    <!--end::Page Custom Javascript-->
    <script src="{{ asset_administrator('plugins/sweetalert2/toast.js') }}"></script>
    <script src="{{ asset_administrator('plugins/sweetalert2/page/toast.js') }}"></script>
    <script>
        var toastMessages = {
            path: "{{ asset_administrator('plugins/toasty/') }}",
            errors: [],
            error: @json(session('error')),
            success: @json(session('success')),
            warning: @json(session('warning')),
            info: @json(session('info'))
        };
    </script>
    <!--end::Javascript-->
    @stack('scripts')
</body>
<!--end::Body-->

</html>
