<div class="modal fade" tabindex="-1" id="filter-module">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Module</h5>

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
                <table id="DataTableFilterModule" class="table table-row-bordered gy-5 gs-7">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800">
                            <th class="min-w-15px">No</th>
                            <th class="min-w-200px">Identifier</th>
                            <th class="min-w-200px">Name</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="selectData-Module">Select</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset_administrator('plugins/sweetalert2/page/option.js') }}"></script>
    <script type="text/javascript">
        function addSelectedClassByModuleId(moduleId) {
            var table = $('#DataTableFilterModule').DataTable();


            if ($.fn.dataTable.Select) {

                if (table.select) {

                    table.rows().deselect();
                }
            }

            table.rows().nodes().to$().removeClass('selected');
            if (moduleId) {
                table.rows().every(function() {
                    var rowData = this.data();
                    if (rowData.id === parseInt(moduleId)) {

                        if ($.fn.dataTable.Select && table.select) {
                            this.select();
                        }
                        $(this.node()).addClass('selected');
                        return false;
                    }
                });
            }
        }

        $('#filter-module').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);

            $("#DataTableFilterModule").DataTable().destroy();
            $('#DataTableFilterModule tbody').remove();
            var data_table = $('#DataTableFilterModule').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [0, 'asc']
                ],
                ajax: {
                    url: '{{ route('admin.log_systems.getDataModule') }}',
                    dataType: "JSON",
                    type: "GET",
                },
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'identifier',
                        name: 'identifier'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                ],
                drawCallback: function(settings) {

                    var moduleId = $("#inputModuleId").val();
                    addSelectedClassByModuleId(moduleId);
                },
            });


            $('#DataTableFilterModule tbody').on('click', 'tr', function() {

                $('#DataTableFilterModule tbody tr').removeClass('selected');


                $(this).addClass('selected');

                var data = data_table.row(this).data();
            });


            $('#selectData-Module').off().on('click', function(e) {
                e.preventDefault();


                var selectedRowData = data_table.rows('.selected').data()[0];


                if (selectedRowData) {

                    $("#inputModuleName").val(selectedRowData.name);
                    $("#inputModuleId").val(selectedRowData.id);


                    $('#filter-module').modal('hide');
                } else {
                    var toasty = new Toasty(optionToast);
                    toasty.configure(optionToast);
                    toasty.error('Pilih salah satu');
                }
            });
        });
    </script>
@endpush
