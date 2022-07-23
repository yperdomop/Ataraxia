@extends('adminlte::page')

@section('title', 'Crear rol')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.roles.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Crear rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
            @include('admin.roles.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
