@extends('layouts.admin')
@section('title') {{ trans('admin.show_contact') }} @endsection

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{ trans('admin.show_contact') }}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">{{ trans('admin.home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.contacts.index') }}">{{ trans('admin.contacts') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('admin.show_contact') }}</li>
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
                            <i class="fa fa-folder-open mr-25"></i>
                            {{ trans('admin.show_contact') }} - {{ $contact->title }}
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="col-6"><b>{{ trans('admin.customer') }}</b></label>
                                        <span class="col-6">{{ $contact->customer->first_name }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="col-6"><b>{{ trans('admin.created_at') }}</b></label>
                                        <span class="col-6">{{ $contact->created_at->format('m-d-Y') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="col-6"><b>{{ trans('admin.mobile') }}</b></label>
                                        <span class="col-6">{{ $contact->mobile }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="col-6"><b>{{ trans('admin.message') }}</b></label> <br> <br>
                                        <div class="col-12" style="word-break: break-word;">{{ $contact->message }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection