<div class="modal fade" tabindex="-1" id="filter-menu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Menu</h5>

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
                <table id="DataTableFilterMenu" class="table table-row-bordered gy-5 gs-7">
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
                <button type="button" class="btn btn-primary" id="selectData-Menu">Select</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset_administrator('plugins/sweetalert2/page/option.js') }}"></script>
    <script type="text/javascript">
        function addSelectedClassByMenuId(menuId) {
            var table = $('#DataTableFilterMenu').DataTable();


            if ($.fn.dataTable.Select) {

                if (table.select) {

                    table.rows().deselect();
                }
            }

            table.rows().nodes().to$().removeClass('selected');
            if (menuId) {
                table.rows().every(function() {
                    var rowData = this.data();
                    if (rowData.id === parseInt(menuId)) {

                        if ($.fn.dataTable.Select && table.select) {
                            this.select();
                        }
                        $(this.node()).addClass('selected');
                        return false;
                    }
                });
            }
        }

        $('#filter-menu').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);

            $("#DataTableFilterMenu").DataTable().destroy();
            $('#DataTableFilterMenu tbody').remove();
            var data_table = $('#DataTableFilterMenu').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [0, 'asc']
                ],
                ajax: {
                    url: '{{ route('admin.module_managements.getDataMenu') }}',
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
                        name: 'name',
                        render: function(data, type, row) {
                            return `<i class="${row.icon} mx-1"></i>${data}`;
                        }
                    },
                ],
                drawCallback: function(settings) {

                    var menuId = $("#inputMenuId").val();
                    addSelectedClassByMenuId(menuId);
                },
            });


            $('#DataTableFilterMenu tbody').on('click', 'tr', function() {

                $('#DataTableFilterMenu tbody tr').removeClass('selected');


                $(this).addClass('selected');

                var data = data_table.row(this).data();
            });


            $('#selectData-Menu').off().on('click', function(e) {
                e.preventDefault();


                var selectedRowData = data_table.rows('.selected').data()[0];


                if (selectedRowData) {

                    $("#inputMenuName").val(selectedRowData.name);
                    $("#inputMenuId").val(selectedRowData.id);


                    $('#filter-menu').modal('hide');
                } else {
                    var toasty = new Toasty(optionToast);
                    toasty.configure(optionToast);
                    toasty.error('Pilih salah satu');
                }
            });
        });
    </script>
@endpush
