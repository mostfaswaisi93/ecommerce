@extends('layouts.admin')
@section('title') {{ trans('admin.roles') }} @endsection

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ trans('admin.roles') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">{{ trans('admin.home') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('admin.roles') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-body">
    <section>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ trans('admin.roles') }}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="btn-group">
                        @if (auth()->user()->can('create_roles'))
                        <a href="{{ route('admin.roles.create') }}">
                            <button class="btn btn-primary mb-2">
                                <i class="feather icon-user-plus mr-25"></i>
                                {{ trans('admin.create_role') }}
                            </button>
                        </a>
                        @else
                        <a href="#">
                            <button class="btn btn-primary mb-2 disabled">
                                <i class="feather icon-user-plus"></i> {{ trans('admin.create_role') }}
                            </button>
                        </a>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table id="roles-table" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin.name') }}</th>
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
                { data: 'name', name: 'name' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false }
            ],
            // dom: 'Bfrtip',
            // buttons: [
            //     {
            //         extend: 'print',
            //         exportOptions: {
            //             columns: ':visible'
            //         }
            //     }
            // ],
            language : {
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