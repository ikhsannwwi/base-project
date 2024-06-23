@extends('administrator.layouts.main')
@push('styles')
@endpush
@push('breadcrumb')
    <ul class="breadcrumb fw-bold fs-base my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.user_groups') }}" class="text-muted">User Groups</a>
        </li>
        <li class="breadcrumb-item text-dark">Add</li>
    </ul>
@endpush
@section('content')
    <div class="container" id="kt_content_container">
        <!--begin::Row-->
        <div class="row g-5 gx-xxl-8 mb-xxl-3">
            <!--begin::Col-->
            <div class="col-xxl-4">
                <!--begin::Engage Widget 1-->
                <div class="card card-xxl-stretch">
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <!--begin::Section-->
                        <div class="pt-12">
                            <div class="pb-10 d-flex justify-content-between">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="heading">User Groups</h1>
                                <!--end::Heading-->
                            </div>
                            <div class="section">
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <form action="#" method="post" enctype="multipart/form-data" id="form" data-parsley-validate>
                                            @csrf

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mb-10">
                                                        <label class="form-label" data-parsley-column="Name">Name</label>
                                                        <input type="text" class="form-control" placeholder="Name" data-parsley-required="true"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mb-10">
                                                        <label class="form-label" data-parsley-column="Name">Name</label>
                                                        <input type="text" class="form-control" placeholder="Name" data-parsley-required="true"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="text-end">
                                                <a href="#" class="btn btn-light-danger btn-sm mx-1">Cancel</a>
                                                <button type="reset" class="btn btn-light btn-sm mx-1">Reset</button>
                                                <button type="button" class="btn btn-light-primary btn-sm mx-1 me-10" id="btn_form_submit">
                                                    <span class="indicator-label">
                                                        Submit
                                                    </span>
                                                    <span class="indicator-progress">
                                                        Please wait... <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </button>
                                            </div>
                                            <!--begin::Code-->
                                        </form>
                                        <!--end::Code-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Engage Widget 1-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
@endsection
@push('scripts')
<script src="{{ asset_administrator('plugins/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset_administrator('plugins/parsleyjs/page/parsley.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
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
