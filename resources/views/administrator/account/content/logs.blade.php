@extends('administrator.account.index')
@section('content_account')
<div class="card mb-5 mb-lg-10">
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
                <select class="form-select form-select-sm form-select-solid w-125px select2-hidden-accessible" data-control="select2" data-placeholder="Select Hours" data-hide-search="true" data-select2-id="select2-data-9-emi5" tabindex="-1" aria-hidden="true" data-kt-initialized="1">                    
                    <option value="1" selected="" data-select2-id="select2-data-11-cn2c">1 Hours</option>
                    <option value="2">6 Hours</option>
                    <option value="3">12 Hours</option>
                    <option value="4">24 Hours</option>
                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-10-ncij" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm form-select-solid w-125px" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-cnot-container" aria-controls="select2-cnot-container"><span class="select2-selection__rendered" id="select2-cnot-container" role="textbox" aria-readonly="true" title="1 Hours">1 Hours</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>      
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
<div class="card pt-4 ">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>Logs</h2>
        </div>
        <!--end::Card title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Button-->
            <button type="button" class="btn btn-sm btn-light-primary" fdprocessedid="mdebfi">
                <i class="ki-duotone ki-cloud-download fs-3"><span class="path1"></span><span class="path2"></span></i>  
                Download Report
            </button>
            <!--end::Button-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body py-0">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                <!--begin::Table body-->
                <tbody>
                                                                    <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge--->
                            <td class="min-w-70px">
                                <div class="badge badge-light-success">200 OK</div>
                            </td>
                            <!--end::Badge--->
 
                            <!--begin::Status--->
                            <td>
                               POST /v1/invoices/in_4284_3098/payment                            </td>
                            <!--end::Status--->

                            <!--begin::Timestamp--->
                            <td class="pe-0 text-end min-w-200px">
                                05 May 2024, 11:05 am                            </td>
                            <!--end::Timestamp--->
                        </tr>
                        <!--end::Table row-->
                                                                    <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge--->
                            <td class="min-w-70px">
                                <div class="badge badge-light-success">200 OK</div>
                            </td>
                            <!--end::Badge--->
 
                            <!--begin::Status--->
                            <td>
                               POST /v1/invoices/in_3474_9437/payment                            </td>
                            <!--end::Status--->

                            <!--begin::Timestamp--->
                            <td class="pe-0 text-end min-w-200px">
                                05 May 2024, 5:30 pm                            </td>
                            <!--end::Timestamp--->
                        </tr>
                        <!--end::Table row-->
                                                                    <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge--->
                            <td class="min-w-70px">
                                <div class="badge badge-light-success">200 OK</div>
                            </td>
                            <!--end::Badge--->
 
                            <!--begin::Status--->
                            <td>
                               POST /v1/invoices/in_5683_6591/payment                            </td>
                            <!--end::Status--->

                            <!--begin::Timestamp--->
                            <td class="pe-0 text-end min-w-200px">
                                10 Nov 2024, 6:43 am                            </td>
                            <!--end::Timestamp--->
                        </tr>
                        <!--end::Table row-->
                                                                    <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge--->
                            <td class="min-w-70px">
                                <div class="badge badge-light-danger">500 ERR</div>
                            </td>
                            <!--end::Badge--->
 
                            <!--begin::Status--->
                            <td>
                               POST /v1/invoice/in_6131_2961/invalid                            </td>
                            <!--end::Status--->

                            <!--begin::Timestamp--->
                            <td class="pe-0 text-end min-w-200px">
                                21 Feb 2024, 10:30 am                            </td>
                            <!--end::Timestamp--->
                        </tr>
                        <!--end::Table row-->
                                                                    <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge--->
                            <td class="min-w-70px">
                                <div class="badge badge-light-success">200 OK</div>
                            </td>
                            <!--end::Badge--->
 
                            <!--begin::Status--->
                            <td>
                               POST /v1/invoices/in_3474_9437/payment                            </td>
                            <!--end::Status--->

                            <!--begin::Timestamp--->
                            <td class="pe-0 text-end min-w-200px">
                                19 Aug 2024, 8:43 pm                            </td>
                            <!--end::Timestamp--->
                        </tr>
                        <!--end::Table row-->
                                                                    <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge--->
                            <td class="min-w-70px">
                                <div class="badge badge-light-warning">404 WRN</div>
                            </td>
                            <!--end::Badge--->
 
                            <!--begin::Status--->
                            <td>
                               POST /v1/customer/c_66783750c8eee/not_found                            </td>
                            <!--end::Status--->

                            <!--begin::Timestamp--->
                            <td class="pe-0 text-end min-w-200px">
                                24 Jun 2024, 8:43 pm                            </td>
                            <!--end::Timestamp--->
                        </tr>
                        <!--end::Table row-->
                                                                    <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge--->
                            <td class="min-w-70px">
                                <div class="badge badge-light-success">200 OK</div>
                            </td>
                            <!--end::Badge--->
 
                            <!--begin::Status--->
                            <td>
                               POST /v1/invoices/in_3474_9437/payment                            </td>
                            <!--end::Status--->

                            <!--begin::Timestamp--->
                            <td class="pe-0 text-end min-w-200px">
                                20 Jun 2024, 5:30 pm                            </td>
                            <!--end::Timestamp--->
                        </tr>
                        <!--end::Table row-->
                                                                    <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge--->
                            <td class="min-w-70px">
                                <div class="badge badge-light-success">200 OK</div>
                            </td>
                            <!--end::Badge--->
 
                            <!--begin::Status--->
                            <td>
                               POST /v1/invoices/in_2834_8261/payment                            </td>
                            <!--end::Status--->

                            <!--begin::Timestamp--->
                            <td class="pe-0 text-end min-w-200px">
                                15 Apr 2024, 5:30 pm                            </td>
                            <!--end::Timestamp--->
                        </tr>
                        <!--end::Table row-->
                                                                    <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge--->
                            <td class="min-w-70px">
                                <div class="badge badge-light-danger">500 ERR</div>
                            </td>
                            <!--end::Badge--->
 
                            <!--begin::Status--->
                            <td>
                               POST /v1/invoice/in_2728_8266/invalid                            </td>
                            <!--end::Status--->

                            <!--begin::Timestamp--->
                            <td class="pe-0 text-end min-w-200px">
                                19 Aug 2024, 11:30 am                            </td>
                            <!--end::Timestamp--->
                        </tr>
                        <!--end::Table row-->
                                                                    <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge--->
                            <td class="min-w-70px">
                                <div class="badge badge-light-success">200 OK</div>
                            </td>
                            <!--end::Badge--->
 
                            <!--begin::Status--->
                            <td>
                               POST /v1/invoices/in_9443_2442/payment                            </td>
                            <!--end::Status--->

                            <!--begin::Timestamp--->
                            <td class="pe-0 text-end min-w-200px">
                                05 May 2024, 6:43 am                            </td>
                            <!--end::Timestamp--->
                        </tr>
                        <!--end::Table row-->
                                    </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
</div>
@endsection