@extends('adminlte::page')

@section('title', 'Crear ciudad')

@section('content_header')
    <a class="btn btn-link"
        href="{{ route('admin.departamentos.show', [$department->country, $department]) }}"><u>Volver</u></a>
    <h1 class="text-center">Crear ciudad</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.ciudades.store', $department]]) !!}
            @include('admin.localizaciones.departamentos.ciudades.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
