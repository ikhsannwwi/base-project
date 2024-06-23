@extends('administrator.layouts.main')
@push('styles')
    <link href="{{asset_administrator('plugins/fontawesome-picker/css/fontawesome-iconpicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@push('breadcrumb')
    <ul class="breadcrumb fw-bold fs-base my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.users') }}" class="text-muted">Users</a>
        </li>
        <li class="breadcrumb-item text-dark">Edit</li>
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
                                <h1 class="anchor fw-bolder mb-5" id="heading">Users</h1>
                                <!--end::Heading-->
                            </div>
                            <div class="section">
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <form action="{{route('admin.users.update')}}" method="post" enctype="multipart/form-data" id="form"
                                            data-parsley-validate>
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="id" id="inputId" value="{{$data->id}}">

                                            @include('administrator.users.util.modal_usergroup')

                                            <div class="row">
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                                                    <div class="form-group mandatory mb-10">
                                                        <label class="form-label" data-parsley-column="Name">Name</label>
                                                        <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="ex : Qwerty" autocomplete="off"
                                                            data-parsley-required="true"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mandatory mb-10">
                                                        <label class="form-label" data-parsley-column="Email">Email</label>
                                                        <input type="text" name="email" value="{{$data->email}}" class="form-control" placeholder="ex : qwerty@gmail.com" autocomplete="off"
                                                            data-parsley-required="true" data-parsley-type="email" data-parsley-email-registered/>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mandatory mb-10">
                                                        <label class="form-label" data-parsley-column="No Telephone">No Telephone</label>
                                                        <input type="text" name="telephone" value="{{$data->telephone}}" class="form-control" placeholder="ex : 08xxxxxxxxxx" autocomplete="off"
                                                            data-parsley-required="true" data-parsley-type="digits" data-parsley-telephone-registered data-parsley-length="[11, 13]"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mb-10">
                                                        <label class="form-label" data-parsley-column="Password">Password</label>
                                                        <input type="text" name="password" class="form-control" placeholder="ex : qwerty123" autocomplete="off" id="passwordField"
                                                            data-parsley-minlength="8"/>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mb-10">
                                                        <label class="form-label" data-parsley-column="Password Confirmation">Password Confirmation</label>
                                                        <input type="text" name="password_confirmation" class="form-control" placeholder="ex : qwerty123" autocomplete="off" id="passwordConfirmationField"
                                                            data-parsley-minlength="8" data-parsley-equalto="#passwordField"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mb-10">
                                                        <label for="status" class="form-label">Status</label>
                                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                                            <input type="checkbox" class="form-check-input" name="status" value="1" id="status" checked>
                                                            <label for="status" class="form-check-label status_label">Active</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-end">
                                                <a href="{{route('admin.users')}}" class="btn btn-light-danger btn-sm mx-1">Cancel</a>
                                                <button type="reset" class="btn btn-light btn-sm mx-1">Reset</button>
                                                <button type="button" class="btn btn-light-primary btn-sm mx-1 me-10"
                                                    id="btn_form_submit">
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

            var passwordField = $('#passwordField');
            var passwordConfirmationField = $('#passwordConfirmationField');

            function toggleRequired() {
                var passwordFilled = passwordField.val().length > 0;
                var confirmationFilled = passwordConfirmationField.val().length > 0;

                if (passwordFilled || confirmationFilled) {
                    passwordField.attr('data-parsley-required', 'true');
                    passwordConfirmationField.attr('data-parsley-required', 'true');
                } else {
                    passwordField.removeAttr('data-parsley-required');
                    passwordConfirmationField.removeAttr('data-parsley-required');
                }

                // Re-validate the fields
                passwordField.parsley().reset();
                passwordConfirmationField.parsley().reset();
                passwordField.parsley().validate();
                passwordConfirmationField.parsley().validate();
            }

            passwordField.on('input', toggleRequired);
            passwordConfirmationField.on('input', toggleRequired);

            $('#passwordField').attr('data-parsley-password-required', '');
            $('#passwordConfirmationField').attr('data-parsley-password-required', '');
            
            window.Parsley.addValidator('emailRegistered', {
                validateString: function(value) {
                    var deferred = $.Deferred();

                    $.ajax({
                        url: '{{route('admin.users.checkEmail')}}',
                        method: 'POST',
                        data: { 
                            _token: "{{csrf_token()}}",
                            email: value,
                            id: $('#inputId').val()
                        },
                        dataType: 'json'
                    }).done(function(response) {
                        if (response.registered) {
                            deferred.reject();
                        } else {
                            deferred.resolve(true);
                        }
                    }).fail(function() {
                        deferred.reject();
                    });

                    return deferred.promise();
                },
                messages: {
                    en: 'This email is already registered.'
                }
            });

            window.Parsley.addValidator('telephoneRegistered', {
                validateString: function(value) {
                    var deferred = $.Deferred();

                    $.ajax({
                        url: '{{route('admin.users.checkTelephone')}}',
                        method: 'POST',
                        data: { 
                            _token: "{{csrf_token()}}",
                            telephone: value,
                            id: $('#inputId').val()
                        },
                        dataType: 'json'
                    }).done(function(response) {
                        if (response.registered) {
                            deferred.reject();
                        } else {
                            deferred.resolve(true);
                        }
                    }).fail(function() {
                        deferred.reject();
                    });

                    return deferred.promise();
                },
                messages: {
                    en: 'This telephone is already registered.'
                }
            });


            const form = $("#form");
            const validator = $(form).parsley();
            var submitButton = $("#btn_form_submit");

            submitButton.on("click", async function(e) {
                e.preventDefault();
                submitButton.attr("data-kt-indicator", "on");

                

                validator.whenValidate().done(function() {
                    setTimeout(function() {
                        submitButton.removeAttr("data-kt-indicator");
                        form.submit();
                    }, 3000);
                }).fail(function() {
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
                });
            });

            $('#status').on('click', function(){
                if ($(this).is(':checked')) {
                    $('.status_label').text('Active')
                } else {
                    $('.status_label').text('Inactive')
                }
            })
        })
    </script>
@endpush
