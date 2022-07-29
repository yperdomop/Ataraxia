@extends('adminlte::page')

@section('title', 'Crear departamento')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <a class="btn btn-link" href="{{ route('admin.localizaciones.show', $country) }}"><u>Volver</u></a>
    <h1 class="text-center">Crear departamento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.departamentos.store', $country]]) !!}
            @include('admin.localizaciones.departamentos.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
