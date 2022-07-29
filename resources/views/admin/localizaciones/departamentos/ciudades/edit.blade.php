@extends('adminlte::page')

@section('title', 'Editar ciudad')

@section('content_header')
    <a class="btn btn-link"
        href="{{ route('admin.departamentos.show', [$department->country, $department]) }}"><u>Volver</u></a>
    <h1 class="text-center">Editar ciudad</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($city, ['route' => ['admin.ciudades.update', [$department, $city]], 'method' => 'put']) !!}
            @include('admin.localizaciones.departamentos.ciudades.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
