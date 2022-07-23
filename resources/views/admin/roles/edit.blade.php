@extends('adminlte::page')

@section('title', 'Editar rol')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.roles.index') }}"><u>Volver</u></a>
    <h1 class="h2">Editar Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
            @include('admin.roles.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
