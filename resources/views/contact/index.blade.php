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
        @include('flash::message')
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-list"></i> {{ trans('app.list') }}</h3>
            </div><br/>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table id="contact" class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('app.first_name') }}</th>
                            <th>{{ trans('app.last_name') }}</th>
                            <th>{{ trans('app.department') }}</th>
                            <th>{{ trans('app.phone_number_work') }}</th>
                            <th>{{ trans('app.phone_number_home') }}</th>
                            <th>{{ trans('app.phone_number_cell') }}</th>
                            <th>{{ trans('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->first_name }}</td>
                            <td>{{ $contact->last_name }}</td>
                            <td>{{ $contact->department }}</td>
                            <td>{{ $contact->phone_number_work }}</td>
                            <td>{{ $contact->phone_number_home }}</td>
                            <td>{{ $contact->phone_number_cell }}</td>
                            <td>
                                <div class="btn-group btn-group-xs edit_buttons edit_tr_buttons">
                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="post" id="{{ $contact->id }}">
                                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-xs btn-success">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fa fa-fw fa-trash-o"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <p class="text-center"><a href="https://github.com/mrpbueno/gs_phonebook">{{ trans('app.title') }} 2019 - {{ date('Y') }}</a></p>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
    </section>
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/adminlte/vendor/datatables/datatables.css') }}"/>
@stop
@section('js')
    <script type="text/javascript" src="{{ asset('vendor/adminlte/vendor/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#contact').DataTable({
                "language": {
                    "sEmptyTable":   "Nenhum registro encontrado",
                    "sProcessing":   "A processar...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Procurar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    },
                    "oAria": {
                        "sSortAscending":  ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });
        } );
    </script>
@stop