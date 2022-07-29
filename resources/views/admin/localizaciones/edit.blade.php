@extends('adminlte::page')

@section('title', 'Editar localización')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.localizaciones.show', $country) }}"><u>Volver</u></a>
    <h1 class="text-center">Editar localización</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($country, ['route' => ['admin.localizaciones.update', $country], 'method' => 'put']) !!}
            @include('admin.localizaciones.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
