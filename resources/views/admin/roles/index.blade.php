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
            </div><hr>
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
            // scrollY: "50vh",
            // scrollCollapse: true,
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[ 2, "desc" ]],
            ajax: {
                url: "{{ route('admin.roles.index') }}",
            },
            columns: [{
                    render: function(data, type, row, meta) {
                        console.log(row);
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, searchable: false, orderable: false
                },
                { data: 'name' },
                { data: 'users_count', 
                    render: function(data, type, row, meta) {
                        console.log(row.users_count);
                        return "<div class='badge badge-success'>"+ data +"</div>";
                    }
                },
                { data: 'created_at' },
                { data: 'action', orderable: false }
            ],
            // dom: 'Blfrtip',
            // buttons: [
            //     {
            //         text: '<i class="fa fa-plus"></i>', className: 'btn btn-info'
            //     },
            //     {
            //         extend: 'csv',
            //         exportOptions: {
            //             columns: ':visible'
            //         }
            //     }
            // ],
            // lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            language: {
                url: getDataTableLanguage()
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
                        console.log(data);
                        $('#roles-table').DataTable().ajax.reload();
                        toastr.success('{{ trans('admin.deleted_successfully') }}!');
                    }
                });
            }
        });
    });
</script>

@endpush