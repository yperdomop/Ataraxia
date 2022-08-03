@extends('adminlte::page')

@section('title', 'Departamento')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <a class="btn btn-link" href="{{ route('admin.localizaciones.show', $country) }}"><u>Volver</u></a>
    <h1 class="text-center">Ver departamento</h1>
@stop

@section('content')
    <h2 class="text-center">{{ $department->name }} - {{ $country->name }}</h2>
    <a href="{{ route('admin.departamentos.edit', [$country, $department]) }}" style="color: black; border-color:#FFAA37;"
        class="btn btn-outline-primary m-3">
        Editar
        localización</a>
    <a href="{{ route('admin.ciudades.create', $department) }}" style="color: black; border-color:#FFAA37;"
        class="btn btn-outline-primary">
        Crear
        ciudad</a>
    <br>
    <table class="table table-bordered"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ciudad</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($department->cities as $city)
                    <th scope="row">{{ $city->id }}</th>
                    <td>{{ $city->name }}</td>

                    <td width="10px">
                        <a href="{{ route('admin.ciudades.edit', [$department, $city]) }}"
                            style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary" title="Editar"><i
                                class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('admin.ciudades.destroy', [$department, $city]) }}" method="post"
                            onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger"
                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                    class="bi bi-trash3-fill"></i></button>
                        </form>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
