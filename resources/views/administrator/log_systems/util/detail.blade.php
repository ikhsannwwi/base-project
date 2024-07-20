<div class="modal bg-white fade" tabindex="-1" id="detail">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content shadow-none">
            <div class="modal-header">
                <h5 class="modal-title">Detail <span id="title"></span></h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                <rect fill="#000000" opacity="0.5"
                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                    x="0" y="7" width="16" height="2" rx="1"></rect>
                            </g>
                        </svg>
                    </span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#detail').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            var modalBody = $('.modal-body');
            modalBody.html('<div id="loadingSpinner" style="display: none;">' +
                '<i class="fas fa-spinner fa-spin"></i> Sedang memuat...' +
                '</div>');
            var loadingSpinner = $('#loadingSpinner');

            loadingSpinner.show();

            $.ajax({
                url: '{{ route('admin.log_systems.getDetail') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                method: 'POST',
                success: function(response) {
                    var data = response.data;
                    $('#title').text(data.ip_address)

                    const jsonObj = JSON.parse(data.data);
                    const prettyJsonString = JSON.stringify(jsonObj, null, 2);

                    modalBody.html(
                        `<div class="row mx-0">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">

                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Id
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.id}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                User
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.user ? data.user.name : '-'}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Ip Address
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.ip_address}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Module
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.module}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Action
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.action}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Device
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.device}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Browser Name
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.browser_name}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Browser Version
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.browser_version}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Date Time
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${moment(data.created_at).format('DD-MM-YYYY HH:mm:ss')}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Data Id
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.data_id}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Data
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${prettyJsonString}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`
                    );

                    loadingSpinner.hide();
                }
            });
        });
    </script>
@endpush
