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
            <a href="{{ route('admin.module_managements') }}" class="text-muted">Module Managements</a>
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
                                <h1 class="anchor fw-bolder mb-5" id="heading">Module Managements</h1>
                                <!--end::Heading-->
                            </div>
                            <div class="section">
                                <div class="py-5">
                                    <div class="rounded border p-10">
                                        <form action="{{route('admin.module_managements.update')}}" method="post" enctype="multipart/form-data" id="form"
                                            data-parsley-validate>
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="id" id="inputId" value="{{$data->id}}">

                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mb-10">
                                                        <label class="form-label">Menu</label>
                                                        <select class="form-select form-select-solid" id="menu-select" name="menu_id" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" data-hide-search="false">
                                                            <option value=""></option>
                                                            @foreach ($menus as $row)
                                                                <option value="{{$row->id}}" {{$row->id === $data->menu_id ? 'selected' : ''}}>{{$row->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($data->menu_id === 0)
                                            <div class="row" id="icon-section">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mandatory mb-10">
                                                        <label class="form-label" data-parsley-column="Icon">Icon</label>
                                                        <div class="input-group">
                                                            <input data-placement="bottomRight" id="input_icon" class="form-control icp-auto" name="icon" value="{{$data->icon}}" type="text" autocomplete="off" data-parsley-required="{{$data->menu_id === 0 ? 'true' : 'false'}}"/>
                                                            <span class="input-group-text input-group-addon"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mandatory mb-10">
                                                        <label class="form-label" data-parsley-column="Identifier">Identifier</label>
                                                        <input type="text" name="identifier" class="form-control" value="{{$data->identifier}}" placeholder="identifier" autocomplete="off"
                                                            data-parsley-required="true"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mandatory mb-10">
                                                        <label class="form-label" data-parsley-column="Name">Name</label>
                                                        <input type="text" name="name" class="form-control" value="{{$data->name}}" placeholder="Name" autocomplete="off"
                                                            data-parsley-required="true"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="form-group mandatory mb-10">
                                                        <label class="form-label" data-parsley-column="Url">Url</label>
                                                        <input type="text" name="url" class="form-control" value="{{$data->url}}" placeholder="Url" autocomplete="off"
                                                            data-parsley-required="true"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-10">
                                                <div class="col-12">
                                                    <label class="form-label">Access</label>
                                                    <div id="module_access">
                                                        @foreach ($data->access as $index => $row)
                                                            <div class="row list-access" childidx="{{ $index }}">
                                                                <input type="hidden" name="module_access[{{ $index }}][id]" value="{{ $row->id }}">
                                                                
                                                                <div class="col-4 col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                                                                    <div class="form-group mandatory mb-10">
                                                                        <label class="form-label">Type</label>
                                                                        <select class="form-select form-select-solid type-item" data-control="select2" name="module_access[{{ $index }}][type]" data-placeholder="Select an option" data-allow-clear="true" data-hide-search="true" data-parsley-required="true">
                                                                            <option value=""></option>
                                                                            <option value="standar_elements" {{ in_array($row['identifier'], ['view', 'add', 'edit', 'delete', 'detail']) ? 'selected' : '' }}>
                                                                                Standar Elements 
                                                                            </option>
                                                                            <option value="other_elements" {{ !in_array($row['identifier'], ['view', 'add', 'edit', 'delete', 'detail']) ? 'selected' : '' }}>
                                                                                Other Elements
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-7 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                    <div class="form-group mandatory access-code-select mb-10" style="{{ !in_array($row['identifier'], ['view', 'add', 'edit', 'delete', 'detail']) ? 'display: none;' : '' }}">
                                                                        <label class="form-label">Access Code</label>
                                                                        <select class="form-select form-select-solid module_access-code-select" data-control="select2" name="module_access[{{ $index }}][code_select]" data-placeholder="Select an option" data-allow-clear="true" data-hide-search="true" data-parsley-required="{{ in_array($row['identifier'], ['view', 'add', 'edit', 'delete', 'detail']) ? 'true' : 'false' }}">
                                                                            <option value=""></option>
                                                                            <option value="view" {{ $row['identifier'] == 'view' ? 'selected' : '' }}>View</option>
                                                                            <option value="add" {{ $row['identifier'] == 'add' ? 'selected' : '' }}>Add</option>
                                                                            <option value="edit" {{ $row['identifier'] == 'edit' ? 'selected' : '' }}>Edit</option>
                                                                            <option value="delete" {{ $row['identifier'] == 'delete' ? 'selected' : '' }}>Delete</option>
                                                                            <option value="detail" {{ $row['identifier'] == 'detail' ? 'selected' : '' }}>Detail</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    <div class="form-group mandatory access-code-input mb-10" style="{{ in_array($row['identifier'], ['view', 'add', 'edit', 'delete', 'detail']) ? 'display: none;' : '' }}">
                                                                        <label class="form-label">Access Code</label>
                                                                        <input type="text" name="module_access[{{ $index }}][code_input]" value="{{ !in_array($row['identifier'], ['view', 'add', 'edit', 'delete', 'detail']) ? $row['identifier'] : '' }}" class="form-control module_access-code-input" placeholder="Other Access Code" autocomplete="off" data-parsley-required="{{ !in_array($row['identifier'], ['view', 'add', 'edit', 'delete', 'detail']) ? 'true' : 'false' }}"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-1 p-0">
                                                                    <div class="form-group mb-10 pt-9">
                                                                        <a href="javascript:void(0)" class="btn btn-light-danger btn-sm removeData" data-id="{{$row['id']}}">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="button-access-section my-5">
                                                        <a href="javascript:void(0)" class="btn btn-light-primary btn-sm" id="button-more-access">
                                                            <i class="fas fa-plus-circle"></i> Add More Access
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="text-end">
                                                <a href="{{route('admin.module_managements')}}" class="btn btn-light-danger btn-sm mx-1">Cancel</a>
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

    <div class="d-none">
        <div class="row access-list" childidx="0">
            <input type="hidden" name="module_access[0][id]" value="">
            <div class="col-4 col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                <div class="form-group mandatory mb-10">
                    <label class="form-label">Type</label>
                    <select class="form-select form-select-solid type-item" name="module_access[0][type]" data-placeholder="Select an option" data-allow-clear="true" data-hide-search="true" data-parsley-required="true">
                        <option value=""></option>
                        <option value="standar_elements">Standar Elements</option>
                        <option value="other_elements">Other Elements</option>
                    </select>
                </div>
            </div>

            <div class="col-7 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <div class="form-group mandatory access-code-select mb-10">
                    <label class="form-label">Access Code</label>
                    <select class="form-select form-select-solid module_access-code-select" name="module_access[0][code_select]" data-placeholder="Select an option" data-allow-clear="true" data-hide-search="true">
                        <option value=""></option>
                        <option value="view">View</option>
                        <option value="add">Add</option>
                        <option value="edit">edit</option>
                        <option value="delete">delete</option>
                        <option value="detail">detail</option>
                    </select>
                </div>
                <div class="form-group mandatory access-code-input mb-10">
                    <label class="form-label">Access Code</label>
                    <input type="text" name="module_access[0][code_input]" class="form-control module_access-code-input" placeholder="Other Access Code" autocomplete="off"
                        data-parsley-required="true"/>
                </div>
            </div>

            <div class="col-1 p-0">
                <div class="form-group mb-10 pt-9">
                    <a href="javascript:void(0)" class="btn btn-light-danger btn-sm removeData" data-id=""><i class="fas fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset_administrator('plugins/fontawesome-picker/js/fontawesome-iconpicker.min.js') }}"></script>
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

            $('.icp-auto').iconpicker({
                animation: false // Disable animation
            });

            $('#menu-select').on('change', function(){
                let menu = $(this).val()

                if (menu === '') {
                    $('#icon-section').show()
                    $('#input_icon').val("").attr(
                        "data-parsley-required", "true")
                } else {
                    $('#input_icon').val("").attr(
                        "data-parsley-required", "false")
                    $('#icon-section').hide()
                }
            })

            $("#module_access").on("click", ".removeData", function() {
                var rowToDelete = $(this).closest(".list-access");
                
                var another = this
                var id = $(this).data('id');
                Swal.fire({
                    html: 'Are you sure delete this data?',
                    icon: "info",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Ok, got it!",
                    cancelButtonText: 'Nope, cancel it',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (id != '') {
                            $.ajax({
                                url: '/admin/module-managements/destroyAccess',
                                data: {
                                    id: id,
                                },
                                type: "get",
                                cache: false,
                                async: false,
                                success: function (response) {
                                    if (response.status === 'success') {
                                        deleteRow(rowToDelete);
                                        Swal.fire({
                                            title: 'Berhasil!',
                                            text: 'Baris telah dihapus.',
                                            icon: 'success',
                                            timer: 1500,
                                            showConfirmButton: false
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: response.message + '.',
                                            icon: 'error',
                                            timer: 1500,
                                            showConfirmButton: false
                                        });
                                    }
                                }
                            });
                        }else{
                            deleteRow(rowToDelete);
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Baris telah dihapus.',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            })

            function deleteRow(element) {
                $(element).remove();
                resetData();
            }

            $('#button-more-access').off().on('click', function () {
                addAccess();
            })
            
            function addAccess() {
                var tr_clone = $(".access-list").clone();
                tr_clone.removeClass('access-list');
                tr_clone.addClass('list-access');
                tr_clone.find('.form-select').select2({
                    minimumResultsForSearch: Infinity
                })
                tr_clone.find('.access-code-select').hide()
                tr_clone.find('.access-code-input').hide()
                $("#module_access").append(tr_clone);
                resetData();
            }

            function resetData (){
                var index = 0;
                $(".list-access").each(function () {
                    var another = this;
                    search_index = $(this).attr("childidx");

                    $(this).find('input,select').each(function () {
                        this.name = this.name.replace('[' + search_index + ']', '[' + index + ']');
                        $(another).attr("childidx", index);
                    });

                    $(this).find('.type-item').on('change', function(){
                        var tipe = $(this).val();
                        console.log(tipe)
                    if (tipe == 'other_elements') {
                        $(another).find(".access-code-input").show();
                        $(another).find(".module_access-code-input").prop("disabled", false);

                        $(another).find(".access-code-select").hide();
                        $(another).find(".module_access-code-select").prop("disabled", true);
                        $(another).find(".module_access-code-select").val("").attr(
                            "data-parsley-required", "false");

                        $(another).find(".module_access-code-input").attr("data-parsley-required",
                            "true");
                    } else if (tipe == 'standar_elements') {
                        $(another).find(".access-code-select").show();
                        $(another).find(".module_access-code-select").prop("disabled", false);

                        $(another).find(".access-code-input").hide();
                        $(another).find(".module_access-code-input").prop("disabled", true);
                        $(another).find(".module_access-code-input").val("").attr(
                            "data-parsley-required", "false");

                        $(another).find(".module_access-code-select").attr("data-parsley-required",
                            "true");
                    } else if (tipe == '') {
                        $(another).find(".access-code-select").hide();
                        $(another).find(".module_access-code-select").prop("disabled", false);
                        $(another).find(".module_access-code-select").val("").attr(
                            "data-parsley-required", "false");

                        $(another).find(".access-code-input").hide();
                        $(another).find(".module_access-code-input").prop("disabled", false);

                        $(another).find(".module_access-code-input").attr("data-parsley-required",
                            "false");
                    }
                    })

                    index++;
                });
            }
            resetData()
        })
    </script>
@endpush
