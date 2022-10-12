@extends('adminlte::page')

@section('title', 'Crear Membresía')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.memberships.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Crear Membresía</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.memberships.store']) !!}
            @include('admin.membresias.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
