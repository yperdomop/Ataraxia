@extends('adminlte::page')

@section('title', 'Crear Compañía')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.compania.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Crear Compañía</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.compania.store']) !!}
            @include('admin.compania.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
