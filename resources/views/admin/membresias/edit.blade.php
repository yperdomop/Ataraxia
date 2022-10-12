@extends('adminlte::page')

@section('title', 'Membresias')

@section('content_header')
    <a class="btn btn-link" href="{{ route('admin.memberships.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Editar Membresía</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($membership, ['route' => ['admin.memberships.update', $membership], 'method' => 'put']) !!}
            @include('admin.membresias.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop
