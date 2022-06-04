<x-app-layout>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>    
    @endif
    <h1>Roles</h1>
    <a href="{{route('admin.roles.create')}}" class="btn btn-success">Crear Rol</a>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $roles as $role )
                    <th scope="row">{{$role->id}}</th>
                    <td>{{$role->name}}</td>
                    
                    <td width="10px">
                        <a href="{{ route('admin.roles.edit', $role)}}" class="btn btn-outline-primary" title="Editar"><i class="fa-solid fa-pencil"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('admin.roles.destroy', $role) }}" method="post" onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-outline-danger" title="Eliminar"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>