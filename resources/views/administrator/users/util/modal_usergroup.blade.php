<div class="row">
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
        <div class="form-group mandatory mb-10">
            <label class="form-label" data-parsley-column="User Group">User Group</label>
            <div class="input-group">
                <input type="text" class="form-control"
                    value="{{ Route::is('admin.users.edit*') ? ($data->user_group ? $data->user_group->name : 'Moderator') : '' }}"
                    id="inputUserGroupName" placeholder="User Group Name" data-parsley-required="true" readonly>
                <input type="text" class="d-none"
                    value="{{ Route::is('admin.users.edit*') ? ($data->user_group ? $data->user_group->id : 0) : '' }}"
                    name="user_group" id="inputUserGroupId">
                <a href="#" class="btn btn-light-primary btn-sm pt-4" data-bs-toggle="modal"
                    data-bs-target="#filterUserGroup">
                    <i class="fas fa-search mx-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="filterUserGroup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Group</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x">
                        <svg xmlns="http:
                            <g transform="translate(12.000000, 12.000000)
                            rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
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
                <table id="DataTable" class="table table-row-bordered gy-5 gs-7">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800">
                            <th class="min-w-15px">No</th>
                            <th class="min-w-200px">Name</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="selectData-UserGroup">Select</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset_administrator('plugins/sweetalert2/page/option.js') }}"></script>
    <script type="text/javascript">
        function addSelectedClassByUserGroupId(userGroupId) {
            var table = $('#DataTable').DataTable();

            if ($.fn.dataTable.Select) {
                if (table.select) {
                    table.rows().deselect();
                }
            }

            table.rows().nodes().to$().removeClass('selected');
            if (userGroupId) {
                table.rows().every(function() {
                    var rowData = this.data();
                    if (rowData.id === parseInt(userGroupId)) {
                        if ($.fn.dataTable.Select && table.select) {
                            this.select();
                        }
                        $(this.node()).addClass('selected');
                        return false;
                    }
                });
            }
        }

        $('#filterUserGroup').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);

            $("#DataTable").DataTable().destroy();
            $('#DataTable tbody').remove();
            var data_table = $('#DataTable').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [0, 'asc']
                ],
                ajax: {
                    url: '{{ route('admin.users.getDataUserGroup') }}',
                    dataType: "JSON",
                    type: "GET",
                },
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                ],
                drawCallback: function(settings) {

                    var userGroupId = $("#inputUserGroupId").val();
                    addSelectedClassByUserGroupId(userGroupId);
                },
            });


            $('#DataTable tbody').on('click', 'tr', function() {

                $('#DataTable tbody tr').removeClass('selected');


                $(this).addClass('selected');

                var data = data_table.row(this).data();
            });


            $('#selectData-UserGroup').off().on('click', function(e) {
                e.preventDefault();


                var selectedRowData = data_table.rows('.selected').data()[0];


                if (selectedRowData) {

                    $("#inputUserGroupName").val(selectedRowData.name);
                    $("#inputUserGroupId").val(selectedRowData.id);


                    $('#filterUserGroup').modal('hide');
                } else {
                    var toasty = new Toasty(optionToast);
                    toasty.configure(optionToast);
                    toasty.error('Pilih salah satu');
                }
            });
        });
    </script>
@endpush
