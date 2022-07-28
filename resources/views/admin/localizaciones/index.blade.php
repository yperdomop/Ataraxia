@extends('adminlte::page')

@section('title', 'Compañía')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <h1 class="text-center">Localizaciones</h1>
@stop
@section('content')
    <a href="" style="background-color:#FFAA37;" class="btn"> Crear localización</a>
    <br>
    <table class="table table-bordered"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">país</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Departamento</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($countries as $country)
                    <th scope="row">{{ $country->id }}</th>
                    <td>{{ $country->name }}</td>
                    <td>
                        @foreach ($cities as $city)
                            {{ $city->name }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($departments as $departments)
                            {{ $departments->name }}
                        @endforeach
                    </td>

                    <td width="10px">
                        <a href="" style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                            title="Editar"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
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
