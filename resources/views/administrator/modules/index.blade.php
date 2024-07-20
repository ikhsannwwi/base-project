@extends('administrator.layouts.main')
@push('styles')
@endpush
@push('breadcrumb')
    <ul class="breadcrumb fw-bold fs-base my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-dark">Module Managements</li>
    </ul>
@endpush
@section('content')
    <div class="container" id="kt_content_container">
        <!--begin::Row-->
        <div class="row g-5 gx-xxl-8 mb-xxl-3">
            <!--begin::Col-->
            <div class="col-12">
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
                                <div class="ms-auto d-flex d-none d-sm-block d-md-block d-lg-block d-xl-block d-xxl-block">
                                    <a href="javascript:void(0)" class="btn btn-light-primary mx-1 triggerFilterData">
                                        <i class="fas fa-filter fs-4"></i>
                                    </a>
                                    <a href="{{route('admin.module_managements.add')}}" class="btn btn-primary mx-1">
                                        <i class="fas fa-plus fs-4"></i>Add
                                    </a>
                                </div>
                                <div class="card-toolbar d-block d-sm-none d-md-none d-lg-none d-xl-none d-xxl-none">
                                    <!--begin::Dropdown-->
                                    <button type="button"
                                        class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-flip="top-end">
                                        <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5"
                                                        rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5"
                                                        rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5"
                                                        rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5"
                                                        rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--begin::Menu 2-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-200px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick
                                                Actions</div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="javascript:void(0)" class="menu-link px-3 triggerFilterData"><i class="fas fa-filter mx-1"></i>Filter</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="{{route('admin.module_managements.add')}}" class="menu-link px-3"><i class="fas fa-plus mx-1"></i>Add Data</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                    </div>
                                    <!--end::Menu 2-->
                                    <!--end::Dropdown-->
                                </div>
                            </div>
                            <div id="filter-section" class="filter-section" style="display: none">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <label for="filter-menu" class="form-label">Menu</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="" id="inputMenuName" placeholder="Menu Name" data-parsley-required="true" readonly>
                                            <input type="text" class="d-none" value="" name="menu" id="inputMenuId">
                                            <a href="#" class="btn btn-light-primary btn-sm pt-4" data-bs-toggle="modal"
                                                data-bs-target="#filter-menu">
                                                <i class="fas fa-search mx-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row h-100px h-sm-150px h-md-150px h-lg-150px h-xl-150px h-xxl-150px">
                                    <div class="col-12 d-flex d-flex justify-content-end align-items-end">
                                        <a href="javascript:void(0)" class="btn btn-light-warning mx-1" id="filter-submit">
                                            <i class="fas fa-filter fs-4"></i>Search
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-light-danger mx-1" id="filter-reset">
                                            <i class="fas fa-undo"></i>Reset
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="section">
                                <div class="searchbox-datatable d-flex align-items-center border-bottom col-12 col-sm-3">
                                    <i class="fas fa-search"></i>
                                    <input type="text" class="form-control form-control-flush" id="searchDataTable" value="" placeholder="Search..." data-kt-search-element="input">
                                </div>
                                <table id="DataTable" class="table table-striped table-row-bordered gy-5 gs-7">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800">
                                            <th class="min-w-15px">No</th>
                                            <th class="min-w-200px">Menu</th>
                                            <th class="min-w-200px">Name</th>
                                            <th class="min-w-200px">Identifier</th>
                                            <th class="min-w-200px">Url</th>
                                            <th class="min-w-200px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
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
    @include('administrator.modules.util.detail')
    @include('administrator.modules.util.filter-menu')
@endsection
@push('scripts')
    <script src="{{ asset_administrator('plugins/sweetalert2/page/option.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var data_table = $('#DataTable').DataTable({
                processing: true,
                serverSide: true,
                rowReorder: true,
                columnDefs: [
                    { orderable: true, className: 'reorder', targets: 0 },
                    { orderable: false, targets: '_all' }
                ],
                order: [
                    [0, 'asc']
                ],
                scrollX: true, // Enable horizontal scrolling
                ajax: {
                    url: '{{ route('admin.module_managements.getData') }}',
                    dataType: "JSON",
                    type: "GET",
                    data: function(d) {
                        // d.status = getStatus();
                    }

                },
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'menu.name',
                        name: 'menu.name',
                        render: function(data, type, row) {
                            return data ? data : '';
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'identifier',
                        name: 'identifier'
                    },
                    {
                        data: 'url',
                        name: 'url'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        sortable: false,
                        class: 'text-center'
                    }
                ],
            });

            data_table.on('row-reorder', function(e, diff, edit) {
                diff.forEach(function(diff) {
                    const id = diff.node.lastChild.children[1].attributes[1].value
                    const row_order = diff.newPosition
                    $.ajax({
                        url: '{{route('admin.module_managements.updateRowOrder')}}',
                        method: 'POST',
                        data: { 
                            _token: "{{csrf_token()}}",
                            row_order: row_order,
                            id: id
                        },
                        dataType: 'json'
                    }).done(function(response) {
                        console.log(response)
                    }).fail(function() {
                    });
                });
            });

            $('#searchDataTable').on('keyup', function() {
                data_table.search(this.value).draw();
            });

            $('.triggerFilterData').on('click', function(){
                $('#filter-section').slideToggle();
            })

            function getMenu() {
                return $('#inputMenuId').val();
            }

            $('#filter-submit').on('click', function(event) {
                event.preventDefault();

                var filterMenu = getMenu();
                data_table.ajax.url('{{ route('admin.module_managements.getData') }}?menu=' + filterMenu)
                    .load();
            });

            $('#filter-reset').on('click', function(event) {
                event.preventDefault();

                $('#inputMenuId').val('');
                $('#inputMenuName').val('');

                data_table.ajax.url('{{ route('admin.module_managements.getData') }}').load();
            });

            $(document).on('click', '.delete', function() {
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
                        $.ajax({
                            url: '{{route('admin.module_managements.destroy')}}',
                            data: {
                                id: id,
                            },
                            type: "get",
                            cache: false,
                            async: false,
                            success: function (response) {
                                if (response.status === 'success') {
                                    data_table.ajax.reload(null, false);
                                    var toasty = new Toasty(optionToast);
                                    toasty.configure(optionToast);
                                    toasty.success(response.message);
                                } else {
                                    var toasty = new Toasty(optionToast);
                                    toasty.configure(optionToast);
                                    toasty.error(response.message);
                                }
                            }
                        });
                    }
                });
            })
        })
    </script>
@endpush
