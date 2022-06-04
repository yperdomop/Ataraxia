<x-app-layout>
    <a class="btn btn-link" href="{{route('admin.users.index')}}">Volver</a>
    <h1 class="h2">Editar Usuario</h1>
    <div class="card">
        <div class="card-body">
            {!! Form::model($user, ['route'=>['admin.users.update', $user], 'method'=>'put']) !!}
                @include('admin.users.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
</x-app-layout>