@extends('layouts.admin')
@section('title') {{ trans('admin.edit_user') }} @endsection

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ trans('admin.edit_user') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">{{ trans('admin.home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.users.index') }}">{{ trans('admin.users_management') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('admin.edit_user') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-body">
    <section class="portlet">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="feather icon-edit mr-25"></i>
                            {{ trans('admin.edit_user') }} - {{ $user->name }}
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @include('partials._errors')
                            <form action="{{ route('admin.users.update', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>{{ trans('admin.name') }}</label>
                                                <input id="name" type="text" name="name" class="form-control"
                                                    value="{{ $user->name }}" placeholder="{{ trans('admin.name') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>{{ trans('admin.username') }}</label>
                                                <input id="username" type="text" name="username" class="form-control"
                                                    value="{{ $user->username }}"
                                                    placeholder="{{ trans('admin.username') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>{{ trans('admin.email') }}</label>
                                                <input id="email" type="email" name="email" class="form-control"
                                                    value="{{ $user->email }}" placeholder="{{ trans('admin.email') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="media mb-2">
                                            <a class="mr-2 my-25" href="#">
                                                <img src="{{ $user->image_path }}" alt="users avatar"
                                                    class="users-avatar-shadow rounded image img-thumbnail image-preview"
                                                    height="70" width="70">
                                            </a>
                                            <div class="media-body mt-50">
                                                <label>{{ trans('admin.user_image') }}</label>
                                                <div class="col-4 d-flex mt-1 px-0">
                                                    <input type="file" class="form-control-file image" name="image"
                                                        id="image" style="display:none;">
                                                    <button class="btn btn-primary" onclick="FileUpload();">
                                                        <i class="fa fa-plus"></i>
                                                        {{ trans('admin.file_upload') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive border rounded px-1">
                                            <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2">
                                                <i class="feather icon-lock mr-50"></i>
                                                {{ trans('admin.permissions') }}
                                            </h6> <br>
                                            @php
                                            $models = ['users', 'categories', 'items', 'countries', 'cities',
                                            'locations', 'languages'];
                                            $maps = ['create', 'read', 'update', 'delete'];
                                            @endphp
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>{{ trans('admin.module') }}</th>
                                                        @foreach ($maps as $map)
                                                        <th>
                                                            {{ trans('admin.' .$map) }}
                                                        </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($models as $index => $model)
                                                    <tr>
                                                        <td> {{ trans('admin.' .$model) }}</td>
                                                        @foreach ($maps as $map)
                                                        <td>
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" name="permissions[]"
                                                                    {{ $user->hasPermission($map . '_' . $model) ? 'checked' : '' }}
                                                                    value="{{ $map . '_' . $model }}">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ trans('admin.edit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection