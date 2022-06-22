<x-app-layout>
    <a class="btn btn-link" href="{{route('admin.permisos.index')}}">Volver</a>
    <h1 class="h2">Crear permisos</h1>
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.permisos.store']) !!}
                @include('admin.permisos.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
</x-app-layout>