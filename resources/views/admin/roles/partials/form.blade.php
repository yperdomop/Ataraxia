<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresar nombre del rol']) !!}
    
    @error('name')
    <small>*{{$message}}</small>
    <br> 
 @enderror    
</div>

<br />
<h2 class="h5">Listado de permisos</h2>
    @foreach ($permissions as $permission)
        <div>
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                {{$permission->description}}
            </label>
        </div>                    
    @endforeach
{!! Form::submit('Guardar', ['class'=>'btn', 'style'=>"color: black; background-color:#FFAA37;"]) !!}