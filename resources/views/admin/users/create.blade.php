@extends('adminlte::page')

@section('title', 'Crear usuario')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.users.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Crear usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store']) !!}
            @include('admin.users.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
