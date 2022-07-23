@extends('adminlte::page')

@section('title', 'Compañía')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <h1 class="text-center">compañía</h1>
@stop
@section('content')
    <a href="{{ route('admin.compania.create') }}" style="background-color:#FFAA37;" class="btn"> Crear compañía</a>
    <br>
    <table class="table table-bordered"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Representante legal</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($companies as $company_datum)
                    <th scope="row">{{ $company_datum->id }}</th>
                    <td>{{ $company_datum->bussiness_name }}</td>
                    <td>{{ $company_datum->legal_representative }}</td>

                    <td width="10px">
                        <a href="{{ route('admin.compania.edit', $company_datum) }}"
                            style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary" title="Editar"><i
                                class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('admin.compania.destroy', $company_datum) }}" method="post"
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
