@extends('adminlte::page')

@section('title', 'Crear localización')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <a class="btn btn-link" href="{{ route('admin.localizaciones.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Crear localización</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.localizaciones.store']) !!}
            @include('admin.localizaciones.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
