<x-app-layout>
    <a class="btn btn-link" href="{{route('admin.roles.index')}}">Volver</a>
    <h1 class="h2">Editar Rol</h1>
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method'=>'put']) !!}
                @include('admin.roles.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
</x-app-layout>