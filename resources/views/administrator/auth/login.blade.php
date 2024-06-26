@extends('administrator.auth.main')
@section('content')
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
        <!--begin::Form-->
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-500px p-10">

                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="form" action="{{route('admin.auth.login.process')}}" method="post" data-parsley-validate>
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-gray-900 fw-bolder mb-3">
                            Sign In
                        </h1>
                        <!--end::Title-->

                        <!--begin::Subtitle-->
                        <div class="text-gray-500 fw-semibold fs-6">
                            Your Social Campaigns
                        </div>
                        <!--end::Subtitle--->
                    </div>
                    <!--begin::Heading-->

                    <!--begin::Input group--->
                    <div class="form-group mb-8">
                        <!--begin::Email-->
                        <label class="form-label" data-parsley-column="Email"></label>
                        <input type="text" placeholder="Email" name="email" autocomplete="off"
                            class="form-control bg-transparent" data-parsley-required="true"/>
                        <!--end::Email-->
                    </div>

                    <!--end::Input group--->
                    <div class="form-group mb-3">
                        <!--begin::Password-->
                        <label class="form-label" data-parsley-column="Password"></label>
                        <input type="password" placeholder="Password" name="password" autocomplete="off"
                            class="form-control bg-transparent" data-parsley-required="true"/>
                        <!--end::Password-->
                    </div>
                    <!--end::Input group--->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>

                        <!--begin::Link-->
                        <a href="javascript:void(0)"
                            class="link-primary">
                            Forgot Password ?
                        </a>
                        <!--end::Link-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" id="btn_form_submit" class="btn btn-primary">

                            <!--begin::Indicator label-->
                            <span class="indicator-label">
                                Sign In</span>
                            <!--end::Indicator label-->

                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">
                                Please wait... <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            <!--end::Indicator progress--> 
                        </button>
                    </div>
                    <!--end::Submit button-->

                    <!--begin::Sign up-->
                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        Not a Member yet?

                        <a href="javascript:void(0)"
                            class="link-primary">
                            Sign up
                        </a>
                    </div>
                    <!--end::Sign up-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Form-->

        <!--begin::Footer-->
        <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
            <!--begin::Links-->
            <div class="d-flex fw-semibold text-primary fs-base gap-5">
                <a href="/metronic8/demo1/pages/team.html" target="_blank">Terms</a>

                <a href="/metronic8/demo1/pages/pricing/column.html" target="_blank">Plans</a>

                <a href="/metronic8/demo1/pages/contact.html" target="_blank">Contact Us</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Body-->

    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
        style="background-image: url(/metronic8/demo1/assets/media/misc/auth-bg.png)">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
            <!--begin::Logo-->
            <a href="/metronic8/demo1/index.html" class="mb-0 mb-lg-12">
                <img alt="Logo" src="/metronic8/demo1/assets/media/logos/custom-1.png"
                    class="h-60px h-lg-75px" />
            </a>
            <!--end::Logo-->

            <!--begin::Image-->
            <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                src="/metronic8/demo1/assets/media/misc/auth-screens.png" alt="" />
            <!--end::Image-->

            <!--begin::Title-->
            <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">
                Fast, Efficient and Productive
            </h1>
            <!--end::Title-->

            <!--begin::Text-->
            <div class="d-none d-lg-block text-white fs-base text-center">
                In this kind of post, <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the
                    blogger</a>

                introduces a person they’ve interviewed <br /> and provides some background information about

                <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>
                and their <br /> work following this is a transcript of the interview.
            </div>
            <!--end::Text-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Aside-->
</div>
@endsection
@push('scripts')
    <script src="{{ asset_administrator('plugins/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset_administrator('plugins/parsleyjs/page/parsley.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            const form = $("#form");
            const validator = $(form).parsley();
            var submitButton = $("#btn_form_submit");

            submitButton.on("click", async function(e) {
                e.preventDefault();
                submitButton.attr("data-kt-indicator", "on");

                

                if ($(form).parsley().validate()) {

                    setTimeout(function() {
                        submitButton.removeAttr("data-kt-indicator");
                        form.submit();
                    }, 3000);
                } else {
                    const validationErrors = [];
                    $(form).find(':input').each(function() {
                        const field = $(this);
                        if (!field.parsley().isValid()) {
                            const fieldName = field.attr('name');
                            const errorMessage = field.parsley().getErrorsMessages().join(', ');
                            validationErrors.push(fieldName + ': ' + errorMessage);
                        }
                    });
                    setTimeout(function() {
                        submitButton.removeAttr("data-kt-indicator");
                    }, 200);
                    console.log("Validation errors:\n", validationErrors.join('\n'));
                }
            });
        })
    </script>
@endpush