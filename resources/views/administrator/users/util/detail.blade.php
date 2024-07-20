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
                url: '{{ route('admin.users.getDetail') }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                method: 'POST',
                success: function(response) {
                    var data = response.data;
                    $('#title').text(data.name)

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
                                                Name
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.name}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                UUID
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.uuid}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Status
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.status === 1 ? 'Active' : 'Inactive'}
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
                                                Email
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.email}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                Telephone
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.telephone}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row mx-0">
                                        <div class="col-5">
                                            <div class="title">
                                                User Group
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex">:&ensp;
                                            <div class="fill">
                                                ${data.user_group ? data.user_group.name : 'Developer'}
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
