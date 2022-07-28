@extends('adminlte::page')

@section('title', 'Compañía')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <h1 class="text-center">Gestión de Documentos</h1>
@stop
@section('content')
    <h6>Seleccione el usuario para ver sus documentos</h6>
    <br>
@stop
