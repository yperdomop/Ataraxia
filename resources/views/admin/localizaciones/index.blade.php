@extends('adminlte::page')

@section('title', 'Localizaciones')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <h1 class="text-center">Localizaciones</h1>
@stop
@section('content')
    <a href="{{ route('admin.localizaciones.create') }}" style="background-color:#FFAA37;" class="btn"> Crear
        localización</a>
    <br>
    <table class="table table-bordered"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">país</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($countries as $country)
                    <th scope="row">{{ $country->id }}</th>
                    <td>{{ $country->name }}</td>

                    <td width="10px">
                        <a href="{{ route('admin.localizaciones.show', $country) }}"
                            style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary" title="Mostrar"><i
                                class="bi bi-binoculars-fill"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('admin.localizaciones.destroy', $country) }}" method="post"
                            onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger"
                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                    class="bi bi-trash-fill"></i></button>
                        </form>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
