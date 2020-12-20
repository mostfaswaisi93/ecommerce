@extends('layouts.admin')
@section('title') {{ trans('admin.facilities') }}@endsection

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">{{ trans('admin.home') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('admin.facilities') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="btn-group">
    @if (auth()->user()->hasPermission('create_facilities'))
    <a href="{{ route('admin.facilities.create') }}">
        <button class="btn btn-primary mb-2">
            <i class="feather icon-plus mr-25"></i>
            {{ trans('admin.create') }}
        </button>
    </a>
    @else
    <a href="#">
        <button class="btn btn-primary mb-2 disabled">
            <i class="feather icon-plus"></i> {{ trans('admin.create') }}
        </button>
    </a>
    @endif
</div>

<div class="content-body">
    <section class="portlet">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <li class="fa fa-list"></li>
                    {{ trans('admin.facilities') }}
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin.icon') }}</th>
                                    <th>{{ trans('admin.name') }}</th>
                                    <th>{{ trans('admin.created_at') }}</th>
                                    <th>{{ trans('admin.status') }}</th>
                                    <th>{{ trans('admin.change_status') }}</th>
                                    <th>{{ trans('admin.action') }}</th>
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
    var status  = '';
    $(document).ready(function(){
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[ 2, "desc" ]],
            ajax: {
                url: "{{ route('admin.facilities.index') }}",
            },
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, searchable: false, orderable: false
                },
                { data: 'image_path', name: 'image_path',
                    render: function(data, type, full, meta) {
                        return "<img src=" + data + " width='50px' class='img-thumbnail' />";
                    }, orderable: false , searchable: false
                },
                { data: 'name', name: 'name' },
                { data: 'created_at', name: 'created_at', format: 'M/D/YYYY' },
                { data: 'active', name: 'status',
                    render: function(data, type, full, meta) {
                        var text = data ? "{{ trans('admin.active') }}" : "{{ trans('admin.inactive') }}";
                        var color = data ? "success" : "danger"; 
                        return "<div class='badge badge-" +color+ "'>"+ text +"</div>";
                    }, orderable: false , searchable: false
                },
                { data: 'active', name: 'status' },
                { data: 'action', name: 'action', orderable: false }
            ], "columnDefs": [ {
                "targets": 5,
                render: function (data, type, row, meta){
                var $select = $(`
                    <select class='status form-control'
                    id='status' onchange=selectStatus(${row.id})>
                    <option value='1'>{{ trans('admin.active') }}</option>
                    <option value='0'>{{ trans('admin.inactive') }}</option>
                    </select>
                `);
                $select.find('option[value="'+row.active+'"]').attr('selected', 'selected');
                return $select[0].outerHTML
                }
            } ],
            language : {
                url: getDataTableLanguage()
            }
        });
    });

    $(document).on('click', '.delete', function(){
        facility_id = $(this).attr('id');
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
                    url:"facilities/destroy/" + facility_id,
                    success: function(data){
                        console.log(data);
                        $('#data-table').DataTable().ajax.reload();
                        toastr.success('{{ trans('admin.deleted_successfully') }}!');
                    }
                });
            }
        });
    });

    function selectStatus(id){
        facility_id = id;
    }

    $(document).on('change', '#status', function(e) {
        var status_facility = $(this).find("option:selected").val();
        console.log(status_facility)
        if(status_facility == "1"){
            toastr.success('{{ trans('admin.status_changed') }}!');
        }else if(status_facility == "0"){
            toastr.success('{{ trans('admin.status_changed') }}!');
        } else {
            toastr.error('{{ trans('admin.status_not_changed') }}!');
        }
        $.ajax({
            url:"facilities/updateStatus/"+facility_id+"?active="+status_facility,
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            method:"POST",
            data:{},
            contentType: false,
            cache: false,
            processData: false,
            dataType:"json",
            success:function(data)
                {
                var html = '';
                if(data.errors)
                {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++)
                {
                    html += '<p>' + data.errors[count] + '</p>';
                }
                    html += '</div>';
                }
                if(data.success)
                {
                    $('#data-table').DataTable().ajax.reload();
                }
            }
        });
    });
</script>

@endpush