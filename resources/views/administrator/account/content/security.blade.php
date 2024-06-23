@extends('administrator.account.index')
@section('content_account')
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Heading-->
        <div class="card-title">
            <h3>Login Sessions</h3>
        </div>
        <!--end::Heading-->

        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <div class="my-1 me-4">
                <!--begin::Select-->
                <select class="form-select form-select-sm form-select-solid w-125px select2-hidden-accessible" data-control="select2" data-placeholder="Select Hours" data-hide-search="true" data-select2-id="select2-data-9-d4wv" tabindex="-1" aria-hidden="true" data-kt-initialized="1">                    
                    <option value="1" selected="" data-select2-id="select2-data-11-wq6v">1 Hours</option>
                    <option value="2">6 Hours</option>
                    <option value="3">12 Hours</option>
                    <option value="4">24 Hours</option>
                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-10-f64l" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm form-select-solid w-125px" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-yi4b-container" aria-controls="select2-yi4b-container"><span class="select2-selection__rendered" id="select2-yi4b-container" role="textbox" aria-readonly="true" title="1 Hours">1 Hours</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>      
                <!--end::Select-->
            </div> 

            <a href="#" class="btn btn-sm btn-primary my-1">
                View All
            </a>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body p-0">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                <!--begin::Thead-->
                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                    <tr>
                        <th class="min-w-250px">Location</th>
                        <th class="min-w-100px">Status</th>
                        <th class="min-w-150px">Device</th>
                        <th class="min-w-150px">IP Address</th>
                        <th class="min-w-150px">Time</th>
                    </tr>
                </thead>
                <!--end::Thead-->

                <!--begin::Tbody-->
                <tbody class="fw-6 fw-semibold text-gray-600">
                                            <tr>
                            <td>
                                <a href="#" class="text-hover-primary text-gray-600">USA(5)</a>
                            </td>
                            
                            <td>
                                <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                            </td>

                            <td>Chrome - Windows</td>

                            <td>236.125.56.78</td>
                            
                            <td>2 mins ago</td>
                        </tr>
                                            <tr>
                            <td>
                                <a href="#" class="text-hover-primary text-gray-600">United Kingdom(10)</a>
                            </td>
                            
                            <td>
                                <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                            </td>

                            <td>Safari - Mac OS</td>

                            <td>236.125.56.78</td>
                            
                            <td>10 mins ago</td>
                        </tr>
                                            <tr>
                            <td>
                                <a href="#" class="text-hover-primary text-gray-600">Norway(-)</a>
                            </td>
                            
                            <td>
                                <span class="badge badge-light-danger fs-7 fw-bold">ERR</span>
                            </td>

                            <td>Firefox - Windows</td>

                            <td>236.125.56.10</td>
                            
                            <td>20 mins ago</td>
                        </tr>
                                            <tr>
                            <td>
                                <a href="#" class="text-hover-primary text-gray-600">Japan(112)</a>
                            </td>
                            
                            <td>
                                <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                            </td>

                            <td>iOS - iPhone Pro</td>

                            <td>236.125.56.54</td>
                            
                            <td>30 mins ago</td>
                        </tr>
                                            <tr>
                            <td>
                                <a href="#" class="text-hover-primary text-gray-600">Italy(5)</a>
                            </td>
                            
                            <td>
                                <span class="badge badge-light-warning fs-7 fw-bold">WRN</span>
                            </td>

                            <td>Samsung Noted 5- Android</td>

                            <td>236.100.56.50</td>
                            
                            <td>40 mins ago</td>
                        </tr>
                     	                  
                </tbody>
                <!--end::Tbody-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
</div>
<div class="card ">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Heading-->
        <div class="card-title">
            <h3>License Usage</h3>
        </div>
        <!--end::Heading-->

        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <div class="my-1 me-4">
                <!--begin::Select-->
                <select class="form-select form-select-sm form-select-solid w-125px select2-hidden-accessible" data-control="select2" data-placeholder="Select Hours" data-hide-search="true" data-select2-id="select2-data-12-cxds" tabindex="-1" aria-hidden="true" data-kt-initialized="1">                    
                    <option value="1">1 Hours</option>
                    <option value="2">6 Hours</option>
                    <option value="3" selected="" data-select2-id="select2-data-14-u0qh">12 Hours</option>
                    <option value="4">24 Hours</option>
                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-13-q2we" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm form-select-solid w-125px" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-sikm-container" aria-controls="select2-sikm-container"><span class="select2-selection__rendered" id="select2-sikm-container" role="textbox" aria-readonly="true" title="12 Hours">12 Hours</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>      
                <!--end::Select-->
            </div> 

            <a href="#" class="btn btn-sm btn-primary my-1">
                Download Report
            </a>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body p-0">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-bordered table-row-solid gy-4" id="kt_security_license_usage_table">
                <!--begin::Thead-->
                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                    <tr>
                        <th class="w-150px ps-9">Status</th>
                        <th class="px-0 min-w-250px">Operator</th>
                        <th class="min-w-150px">IP Address</th>
                        <th class="min-w-150px">Created</th>
                        <th class="pe-0 min-w-150px">API Keys</th>
                        <th class="min-w-50px"></th>
                    </tr>
                </thead>
                <!--end::Thead-->

                <!--begin::Tbody-->
                <tbody class="fw-6 fw-semibold text-gray-600">
                                            <tr>
                            <td class="ps-9">
                                <span class="badge badge-light-success fs-7 fw-bold">License</span>
                            </td>
                            
                            <td class="ps-0">
                                <a href="" class="text-hover-primary text-gray-600">DSI: Workstation 2</a>
                            </td>
                            
                            <td>236.125.56.78</td>
                            
                            <td>2 mins ago</td>
                            
                            <td data-bs-target="license">fftt456765gjkkjhi8306767</td>

                            <td class="ps-5">
                                                                <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-500 btn-sm btn-outline-light d-" fdprocessedid="o1wmjr">
                                    <i class="ki-duotone ki-copy fs-2"></i>                                     
                                </button>
                                                            </td>
                        </tr>
                                            <tr>
                            <td class="ps-9">
                                <span class="badge badge-light-danger fs-7 fw-bold">Unknown</span>
                            </td>
                            
                            <td class="ps-0">
                                <a href="" class="text-hover-primary text-gray-600">ReXe: Workstation 29</a>
                            </td>
                            
                            <td>236.125.56.78</td>
                            
                            <td>3 mins ago</td>
                            
                            <td data-bs-target="license">none</td>

                            <td class="ps-5">
                                                            </td>
                        </tr>
                                            <tr>
                            <td class="ps-9">
                                <span class="badge badge-light-success fs-7 fw-bold">License</span>
                            </td>
                            
                            <td class="ps-0">
                                <a href="" class="text-hover-primary text-gray-600">RamenLC: Workstation 2</a>
                            </td>
                            
                            <td>654.125.56.34</td>
                            
                            <td>5 mins ago</td>
                            
                            <td data-bs-target="license">ertt456765gjkkjhi83034344</td>

                            <td class="ps-5">
                                                                <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-500 btn-sm btn-outline-light d-" fdprocessedid="0froqh">
                                    <i class="ki-duotone ki-copy fs-2"></i>                                     
                                </button>
                                                            </td>
                        </tr>
                                            <tr>
                            <td class="ps-9">
                                <span class="badge badge-light-success fs-7 fw-bold">License</span>
                            </td>
                            
                            <td class="ps-0">
                                <a href="" class="text-hover-primary text-gray-600">Nest Five: Workstation 86</a>
                            </td>
                            
                            <td>423.125.56.54</td>
                            
                            <td>1 mins ago</td>
                            
                            <td data-bs-target="license">dctt456765gjkkjhi83093985</td>

                            <td class="ps-5">
                                                                <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-500 btn-sm btn-outline-light d-" fdprocessedid="5azct">
                                    <i class="ki-duotone ki-copy fs-2"></i>                                     
                                </button>
                                                            </td>
                        </tr>
                                            <tr>
                            <td class="ps-9">
                                <span class="badge badge-light-danger fs-7 fw-bold">Unknown</span>
                            </td>
                            
                            <td class="ps-0">
                                <a href="" class="text-hover-primary text-gray-600">DSI: Workstation 2</a>
                            </td>
                            
                            <td>236.125.56.78</td>
                            
                            <td>7 mins ago</td>
                            
                            <td data-bs-target="license">none</td>

                            <td class="ps-5">
                                                            </td>
                        </tr>
                                            <tr>
                            <td class="ps-9">
                                <span class="badge badge-light-success fs-7 fw-bold">License</span>
                            </td>
                            
                            <td class="ps-0">
                                <a href="" class="text-hover-primary text-gray-600">ReXe: Workstation 7</a>
                            </td>
                            
                            <td>745.234.56.21</td>
                            
                            <td>3 mins ago</td>
                            
                            <td data-bs-target="license">uytt456765gjkkjhi4312673</td>

                            <td class="ps-5">
                                                                <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-500 btn-sm btn-outline-light d-" fdprocessedid="5z5c85">
                                    <i class="ki-duotone ki-copy fs-2"></i>                                     
                                </button>
                                                            </td>
                        </tr>
                                            <tr>
                            <td class="ps-9">
                                <span class="badge badge-light-warning fs-7 fw-bold">To be Paid</span>
                            </td>
                            
                            <td class="ps-0">
                                <a href="" class="text-hover-primary text-gray-600">Swedline: Workstation 54</a>
                            </td>
                            
                            <td>441.967.56.54</td>
                            
                            <td>8 mins ago</td>
                            
                            <td data-bs-target="license">ygd456765gjkkjhi83095427</td>

                            <td class="ps-5">
                                                                <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-500 btn-sm btn-outline-light d-" fdprocessedid="erwem">
                                    <i class="ki-duotone ki-copy fs-2"></i>                                     
                                </button>
                                                            </td>
                        </tr>
                     	                  
                </tbody>
                <!--end::Tbody-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
</div>
@endsection
