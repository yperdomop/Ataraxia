<x-app-layout>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <h1>Permisos</h1>
    <a href="{{ route('admin.permisos.create') }}" style="background-color:#FFAA37;" class="btn">Crear Permiso</a>
    <br>
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
                    <a href="{{ route('admin.permisos.edit', $permiso) }}" style="color: black; border-color:#FFAA37;"
                        class="btn btn-outline-primary" title="Editar"><i class="bi bi-pencil-square"></i></a>
                </td>
                <td width="10px">
                    <form action="{{ route('admin.permisos.destroy', $permiso) }}" method="post"
                        onSubmit="return confirm('Seguro desea eliminar?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger"
                            style="color: black; border-color:#FFAA37;" title="Eliminar"><i
                                class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
