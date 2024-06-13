@extends('administrator.layouts.main')
@push('styles')
<style>
    .dropdown-toggle::after {
        display: none;
    }
</style>
@endpush
@push('breadcrumb')
    <ul class="breadcrumb fw-bold fs-base my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-dark">test</li>
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
                                <div class="ms-auto d-flex d-none d-sm-block d-md-block d-lg-block d-xl-block d-xxl-block">
                                    <a href="javascript:void(0)" class="btn btn-light-primary mx-1 triggerFilterData">
                                        <i class="fas fa-search fs-4"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-light-success mx-1">
                                        <i class="fas fa-file-excel fs-4"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-light-danger mx-1">
                                        <i class="fas fa-file-pdf fs-4"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-primary mx-1">
                                        <i class="fas fa-plus fs-4"></i>Add
                                    </a>
                                </div>
                                <div class="dropdown d-block d-sm-none d-md-none d-lg-none d-xl-none d-xxl-none">
                                    <a class="text-dark dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 12H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3 6H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3 18H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item fs-6 fw-bold triggerFilterData" href="javascript:void(0)">Filter</a>
                                        <a class="dropdown-item fs-6 fw-bold" href="javascript:void(0)">Excel</a>
                                        <a class="dropdown-item fs-6 fw-bold" href="javascript:void(0)">Pdf</a>
                                        <a class="dropdown-item fs-6 fw-bold" href="javascript:void(0)">Add</a>
                                    </div>
                                </div>
                            </div>
                            <div id="filter-section" class="filter-section h-125px h-sm-200px h-md-200px h-lg-200px h-xl-200px h-xxl-200px" style="display: none">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="Select an option">
                                            <option></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="Select an option">
                                            <option></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row h-100px h-sm-150px h-md-150px h-lg-150px h-xl-150px h-xxl-150px">
                                    <div class="col-12 d-flex d-flex justify-content-end align-items-end">
                                        <a href="javascript:void(0)" class="btn btn-light-warning mx-1">
                                            <i class="fas fa-search fs-4"></i>Search
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-light-danger mx-1">
                                            <i class="fas fa-undo"></i>Reset
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="section">
                                <table id="DataTable" class="table table-striped table-row-bordered gy-5 gs-7">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800">
                                            <th class="min-w-200px">First name</th>
                                            <th class="min-w-150px">Last name</th>
                                            <th class="min-w-300px">Position</th>
                                            <th class="min-w-200px">Office</th>
                                            <th class="min-w-100px">Age</th>
                                            <th class="min-w-150px">Start date</th>
                                            <th class="min-w-150px">Salary</th>
                                            <th class="min-w-150px">Extn.</th>
                                            <th class="min-w-150px">E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett</td>
                                            <td>Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                            <td>8422</td>
                                            <td>g.winters@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett</td>
                                            <td>Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                            <td>8422</td>
                                            <td>g.winters@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett</td>
                                            <td>Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                            <td>8422</td>
                                            <td>g.winters@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett</td>
                                            <td>Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                            <td>8422</td>
                                            <td>g.winters@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett</td>
                                            <td>Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                            <td>8422</td>
                                            <td>g.winters@datatables.net</td>
                                        </tr>
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
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.triggerFilterData').on('click', function(){
                $('#filter-section').slideToggle();
            })

            $("#DataTable").DataTable({
                "scrollX": true
            });
        })
    </script>
@endpush
