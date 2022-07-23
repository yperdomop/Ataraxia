@extends('adminlte::page')

@section('title', 'Editar compañía')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.compania.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Editar Compañía</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($companium, ['route' => ['admin.compania.update', $companium], 'method' => 'put']) !!}
            @include('admin.compania.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
