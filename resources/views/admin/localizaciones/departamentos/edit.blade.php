@extends('adminlte::page')

@section('title', 'Crear departamento')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.localizaciones.show', $country) }}"><u>Volver</u></a>
    <h1 class="text-center">Crear departamento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($department, [
                'route' => ['admin.departamentos.update', [$country, $department]],
                'method' => 'put',
            ]) !!}
            @include('admin.localizaciones.departamentos.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
