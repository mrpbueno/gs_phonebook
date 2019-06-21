@extends('adminlte::page')

@section('title', trans('app.title'))

@section('content_header')
    <h1><i class="fa fa-phone"></i> {{ trans('app.phonebook') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li class="active">{{ trans('app.phonebook') }}</li>
    </ol>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> {{ trans('app.new') }}</h3>
                </div>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{ route('contact.update', $contact) }}" autocomplete="off">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">{{ trans('app.first_name') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="first_name" value="{{ $contact->first_name }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last_name">{{ trans('app.last_name') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                                    <input type="text" class="form-control" name="last_name" value="{{ $contact->last_name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="department">{{ trans('app.department') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-institution"></i></span>
                                    <input type="text" class="form-control" name="department" value="{{ $contact->department }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number_work">{{ trans('app.phone_number_work') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="tel" class="form-control" name="phone_number_work" pattern="[0-9]{3,15}$" value="{{ $contact->phone_number_work }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_number_home">{{ trans('app.phone_number_home') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="tel" class="form-control" name="phone_number_home" pattern="[0-9]{3,15}$" value="{{ $contact->phone_number_home }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_number_cell">{{ trans('app.phone_number_cell') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="tel" class="form-control" name="phone_number_cell" pattern="[0-9]{3,15}$" value="{{ $contact->phone_number_cell }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </section>
@stop
@section('css')

@stop
@section('js')

@stop