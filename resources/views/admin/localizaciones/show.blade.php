@extends('adminlte::page')

@section('title', 'Localizaciones')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <a class="btn btn-link" href="{{ route('admin.localizaciones.index') }}"><u>Volver</u></a>
    <h1 class="text-center">Ver localización</h1>
@stop

@section('content')
    <h2 class="text-center">{{ $country->name }}</h2>
    <a href="{{ route('admin.localizaciones.edit', $country) }}" style="color: black; border-color:#FFAA37;"
        class="btn btn-outline-primary m-3"> Editar
        localización</a>
    <a href="{{ route('admin.departamentos.create', $country) }}" style="color: black; border-color:#FFAA37;"
        class="btn btn-outline-primary"> Crear
        departamento</a>
    <br>
    <table class="table table-bordered"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Departamento</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($country->departments as $department)
                    <th scope="row">{{ $department->id }}</th>
                    <td>{{ $department->name }}</td>

                    <td width="10px">
                        <a href="{{ route('admin.departamentos.show', [$country, $department]) }}"
                            style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary" title="Mostrar"><i
                                class="bi bi-binoculars-fill"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('admin.departamentos.destroy', [$country, $department]) }}" method="post"
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
