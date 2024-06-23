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
                                        <form action="{{route('admin.user_groups.store')}}" method="post" enctype="multipart/form-data" id="form"
                                            data-parsley-validate>
                                            @csrf

                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mandatory mb-10">
                                                        <label class="form-label" data-parsley-column="Name">Name</label>
                                                        <input type="text" name="name" class="form-control" placeholder="Name" autocomplete="off" id="inputName"
                                                            data-parsley-required="true" data-parsley-name-registered/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group mandatory mb-10">
                                                        <label class="form-label">Permission</label>
                                                        <table id="table-permissions" class="table table-hover table-rounded table-row-bordered border gy-7 gs-7"
                                                            width="100%">
                                                            <thead>
                                                                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                                    <th style="width:50px">No</th>
                                                                    <th>Module</th>
                                                                    <th>
                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                            <input type="checkbox" class="form-check-input" id="checkbox-all-item">
                                                                            <label for="checkbox-all-item" class="form-check-label">All</label>
                                                                        </div>
                                                                    </th>
                                                                    <th>Access</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($modules as $index => $module)
                                                                    <tr class="permission-list">
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td>
                                                                            {{ $module->name }}
                                                                            <input type="hidden"
                                                                                name="access[{{ $index }}][modul_id]"
                                                                                value="{{ $module->id }}">
                                                                        </td>
                                                                        <td>
                                                                            <span class="akses">
                                                                                <label>
                                                                                    <div class="form-check form-check-custom form-check-solid">
                                                                                        <input type="checkbox" name="access[{{ $index }}][check_all]" class="form-check-input check_all check_all_{{ $index }}" data-key_all="{{ $index }}" value="{{ $index }}">
                                                                                    </div>
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            @foreach ($module->access as $row)
                                                                                @php
                                                                                    $kode_akses = explode(
                                                                                        '_',
                                                                                        $row->identifiers,
                                                                                    );
                                                                                    $checked = '';
                                                                                @endphp
                                                                                <span class="akses mx-1">
                                                                                    <label>
                                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                                            <input type="checkbox" name="access[{{ $index }}][module_access][{{ $row->id }}]" class="form-check-input access_{{$index}}" id="access_{{$index}}_module_access_{{ $row->id }}" value="1" {{ $checked }}><label for="access_{{$index}}_module_access_{{ $row->id }}" class="form-check-label">{{ $row->name }}</label>
                                                                                        </div>
                                                                                    </label>
                                                                                </span>
                                                                            @endforeach
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <div id="accessError" style="color: #dc3545"></div>
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
                                                <a href="{{route('admin.user_groups')}}" class="btn btn-light-danger btn-sm mx-1">Cancel</a>
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

            window.Parsley.addValidator('nameRegistered', {
            validateString: function(value) {
                return $.ajax({
                url: '{{route('admin.user_groups.checkName')}}',
                method: 'POST',
                data: { 
                    _token : "{{csrf_token()}}",
                    name: value,
                },
                dataType: 'json'
                }).then(function(response) {
                    if (response.registered) {
                        return $.Deferred().reject();
                    } else {
                        return true;
                    }
                });
            },
            messages: {
                en: 'This name is already registered.'
            }
            });

            const form = $("#form");
            const validator = $(form).parsley();
            var submitButton = $("#btn_form_submit");

            submitButton.on("click", async function(e) {
                e.preventDefault();
                submitButton.attr("data-kt-indicator", "on");

                if ($('input[name^="access["]:checked').length === 0) {
                    $("#table-permissions").parent().addClass('is-invalid'); // Add this line
                    $("#accessError").text("Pilih setidaknya salah satu modul akses")
                    setTimeout(function() {
                        submitButton.removeAttr("data-kt-indicator");
                    }, 200);
                    return;
                } else {
                    $("#table-permissions").parent().removeClass('is-invalid'); // Add this line
                    $("#accessError").text('');
                }

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
            
            $("#checkbox-all-item").on("click", function() {
                var isChecked = $(this).is(':checked');
                $(".check_all").prop('checked', isChecked);

                var key_all;

                if (isChecked) {
                    $(".permission-list").each(function() {
                        key_all = $(this).find(".check_all").data('key_all');
                        $(this).find('.access_' + key_all).prop('checked', true);
                    });
                } else {
                    $(".permission-list").each(function() {
                        key_all = $(this).find(".check_all").data('key_all');
                        $(this).find('.access_' + key_all).prop('checked', false);
                    });
                }
                checkAllItemLength()
            });


            $('.permission-list').each(function() {
                var that = this;
                var key_all = $(this).find(".check_all").data('key_all');

                $(this).find(".check_all").on("click", function() {
                    if ($(this).is(':checked') == false) {
                        $(that).find('.access_' + $(this).val()).prop('checked', false);
                    } else {
                        $(that).find('.access_' + $(this).val()).prop('checked', true);
                    }
                    checkAllItemLength()
                });

                $(this).find(".access_" + key_all).on("click", function() {
                    if (!$(this).is(':checked')) {
                        $(that).find('.check_all').prop('checked', false);
                    }

                    total_access = $(that).find(".access_" + key_all).length;
                    total_given_access = $(that).find(".access_" + key_all + ":checked").length;

                    if (total_access != 0 && total_access == total_given_access) {
                        $(that).find('.check_all').prop('checked', true);
                    }
                    checkAllItemLength()
                });

                total_access = $(that).find(".access_" + key_all).length;
                total_given_access = $(that).find(".access_" + key_all + ":checked").length;

                if (total_access != 0 && total_access == total_given_access) {
                    $(that).find('.check_all').prop('checked', true);
                }
            });
            checkAllItemLength()

            function checkAllItemLength() {
                total_access = $('.permission-list').find(".check_all").length;
                total_given_access = $('.permission-list').find(".check_all:checked").length;


                if (total_access != 0 && total_access == total_given_access) {
                    $('#checkbox-all-item').prop('checked', true);
                } else {
                    $('#checkbox-all-item').prop('checked', false);
                }
            }

        })
    </script>
@endpush
