@extends('layouts.admin')
@section('title') {{ trans('admin.roles') }} @endsection

@section('content')

<div class="content-body">
    <section>
        <div class="card">
            <div class="card-header">
                <div class="tbl-title">{{ trans('admin.roles') }}</div>
                <div class="btn-group">
                    @if (auth()->user()->can('create_roles'))
                    <a href="{{ route('admin.roles.create') }}">
                        <button class="btn btn-sm btn-primary">
                            <i class="feather icon-plus"></i>
                            {{ trans('admin.create_role') }}
                        </button>
                    </a>
                    @else
                    <a href="#">
                        <button class="btn btn-primary disabled">
                            <i class="feather icon-plus"></i> {{ trans('admin.create_role') }}
                        </button>
                    </a>
                    @endif
                </div>
            </div>
            <hr>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="roles-table" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin.name') }}</th>
                                    <th>{{ trans('admin.users_count') }}</th>
                                    <th>{{ trans('admin.created_at') }}</th>
                                    <th>
                                        @if(auth()->user()->can(['update_roles', 'delete_roles']))
                                        {{ trans('admin.action') }}
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        $('#roles-table').DataTable({
            // charset: 'utf-8',
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[ 2, "desc" ]],
            ajax: {
                url: "{{ route('admin.roles.index') }}",
            },
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, searchable: false, orderable: false
                },
                { data: 'name' },
                { data: 'users_count', 
                    render: function(data, type, row, meta) {
                        return "<div class='badge badge-success'>"+ data +"</div>";
                    }
                },
                { data: 'created_at' },
                { data: 'action', orderable: false }
            ],
            dom:    "<'row'<'col-sm-2'l><'col-sm-8 text-center'B><'col-sm-2'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                { text: '<i class="fa fa-refresh"></i> {{ trans("admin.refresh") }}', className: 'btn dtbtn btn-sm btn-default',
                    action: function (e, dt, node, config) {
                        dt.ajax.reload(null, false);
                    }
                },
                { extend: 'csvHtml5', charset: "UTF-8", bom: true, className: 'btn dtbtn btn-sm btn-success', text: '<i class="fa fa-file"></i> CSV' },
                { extend: 'excelHtml5', charset: "UTF-8", bom: true, className: 'btn dtbtn btn-sm btn-success', text: '<i class="fa fa-file"></i> Excel' },
                { extend: 'pdfHtml5', charset: "UTF-8", bom: true, className: 'btn dtbtn btn-sm btn-success', text: '<i class="fa fa-file"></i> PDF' },
                { extend: 'print', className: 'btn dtbtn btn-sm btn-primary', text: '<i class="fa fa-print"></i> {{ trans("admin.print") }}' },

                { text: '<i class="fa fa-trash"></i> {{ trans("admin.trash") }}', className: 'btn dtbtn btn-sm btn-danger delBtn' },
                { text: '<i class="fa fa-plus"></i> {{ trans("admin.create_role") }}', className: 'btn dtbtn btn-sm btn-primary' },
            ],
            language: {
                url: getDataTableLanguage(),
                search: ' ',
                searchPlaceholder: '{{ trans("admin.search") }}...'
            }
        });
    });
    
    $(document).on('click', '.delete', function(){
        role_id = $(this).attr('id');
        swal({
            title: "{{ trans('admin.are_sure') }}",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{ trans('admin.yes') }}',
            cancelButtonText: '{{ trans('admin.cancel') }}'
        }).then(function(result){
            if(result.value){
                $.ajax({
                    url:"roles/destroy/" + role_id,
                    success: function(data){
                        $('#roles-table').DataTable().ajax.reload();
                        toastr.success('{{ trans('admin.deleted_successfully') }}!');
                    }
                });
            }
        });
    });
</script>

@endpush