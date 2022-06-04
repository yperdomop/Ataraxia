<x-app-layout>
    <a class="btn btn-link" href="{{route('admin.roles.index')}}">Volver</a>
    <h1 class="h2">Crear Rol</h1>
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
                @include('admin.roles.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
</x-app-layout>