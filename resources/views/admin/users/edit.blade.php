@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.users.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Editar usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            @include('admin.users.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
