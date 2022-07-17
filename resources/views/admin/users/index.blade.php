<x-app-layout>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <h1>Usuarios</h1>
    <a href="{{ route('admin.users.create') }}" style="background-color:#FFAA37;" class="btn">Crear usuarios</a>
    <br>
    <table class="table table-bordered"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->roles as $role)
                        {{ $role->name }}
                    @endforeach
                </td>
                <td width="10px">
                    <a href="{{ route('admin.users.edit', $user) }}" style="color: black; border-color:#FFAA37;"
                        class="btn btn-outline-primary" title="Editar"><i class="bi bi-pencil-square"></i></a>
                </td>
                <td width="10px">
                    <form action="{{ route('admin.users.destroy', $user) }}" method="post"
                        onSubmit="return confirm('Seguro desea eliminar?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger"
                            style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                class="bi bi-trash3-fill"></i></button>

                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
