<x-app-layout>
    <a class="btn btn-link" href="{{route('admin.permisos.index')}}">Volver</a>
    <h1 class="h2">Editar Permisos</h1>
    <div class="card">
        <div class="card-body">
            {!! Form::model($permiso, ['route' => ['admin.permisos.update', $permiso], 'method'=>'put']) !!}
                @include('admin.permisos.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
</x-app-layout>