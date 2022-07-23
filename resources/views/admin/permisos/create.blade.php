@extends('adminlte::page')

@section('title', 'Crear permiso')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.permisos.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Crear permiso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.permisos.store']) !!}
            @include('admin.permisos.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
