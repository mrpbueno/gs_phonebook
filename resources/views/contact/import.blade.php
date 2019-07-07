@extends('adminlte::page')

@section('title', trans('app.title'))

@section('content_header')
    <h1><i class="fa fa-phone"></i> {{ trans('app.phonebook') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li>{{ trans('app.phonebook') }}</li>
        <li class="active">{{ trans('app.import_file') }}</li>
    </ol>
@stop

@section('content')
    <section class="content">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('flash::message')
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-upload"></i> {{ trans('app.import_file') }}</h3>
                </div><br/>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{ route('contact.import.file') }}" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="import_file">{{ trans('app.import_file_label') }}</label>
                        <input type="file" id="import_file" name="import_file">
                        <p class="help-block">{{ trans('app.import_file_help') }}</p>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('app.save') }}</button>
                </div>
                </form>
                <!-- /.box-footer -->
            </div>
        </div>
    </section>
@stop
@section('css')

@stop
@section('js')

@stop