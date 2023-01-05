{{-- <x-app-layout> --}}
@extends('adminlte::page')

@section('title', 'Permisos')
@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <h1 class="text-center">Permisos</h1>
@stop

@section('content')

    <br>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.permisos.create') }}" style="background-color:#FFAA37;" class="btn">Crear Permiso</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered"><br>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permisos as $permiso)
                        <th scope="row">{{ $permiso->id }}</th>
                        <td>{{ $permiso->name }}</td>
                        <td>{{ $permiso->description }}</td>

                        <td width="10px">
                            <a href="{{ route('admin.permisos.edit', $permiso) }}"
                                style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                                title="Editar"><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.permisos.destroy', $permiso) }}" method="post"
                                onSubmit="return confirm('Seguro desea eliminar?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger"
                                    style="color: black; border-color:#FFAA37;" title="Eliminar"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
{{-- </x-app-layout> --}}
