@extends('adminlte::page')

@section('title', 'Membresias')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <h1 class="text-center">Gestión de Membresias</h1>
@stop
@section('content')
    <a href="{{ route('admin.memberships.create') }}" style="background-color:#FFAA37;" class="btn">Crear Membresias</a>
    <br>

    <table class="table table-bordered"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tipo de membresias</th>
                <th scope="col">Frecuencia de pagos</th>
                <th scope="col">Precio</th>
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($memberships as $Membership_price)
                    <th scope="row">{{ $Membership_price->id }}</th>
                    <td>{{ $Membership_price->role->name }}</td>
                    <td>{{ $Membership_price->payment->name }}</td>
                    <td>{{ '$' . number_format($Membership_price->price, 0, ',', '.') }}</td>

                    <td width="10px">
                        <a href="{{ route('admin.memberships.edit', $Membership_price) }}"
                            style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary" title="Editar"><i
                                class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('admin.memberships.destroy', $Membership_price) }}" method="post"
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
