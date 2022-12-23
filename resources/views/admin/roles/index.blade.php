@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <h1 class="text-center">Roles</h1>
@stop

@section('content')
    <a href="{{ route('admin.roles.create') }}" style="background-color:#FFAA37;" class="btn">Crear Rol</a>
    <br>
    <table class="table table-bordered"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <th scope="row">{{ $role->id }}</th>
                <td>{{ $role->name }}</td>

                <td width="10px">
                    <a href="{{ route('admin.roles.edit', $role) }}" style="color: black; border-color:#FFAA37;"
                        class="btn btn-outline-primary" title="Editar"><i class="bi bi-pencil-square"></i></a>
                </td>
                <td width="10px">
                    <form action="{{ route('admin.roles.destroy', $role) }}" method="post"
                        onSubmit="return confirm('Seguro desea eliminar?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger" style="color: black; border-color:#FFAA37;"
                            title="Eliminar"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
