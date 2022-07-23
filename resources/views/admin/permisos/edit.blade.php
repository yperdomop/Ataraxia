@extends('adminlte::page')

@section('title', 'Editar permiso')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.permisos.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Editar permiso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($permiso, ['route' => ['admin.permisos.update', $permiso], 'method' => 'put']) !!}
            @include('admin.permisos.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
