<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresar nombre del usuario']) !!}
     @error('name')
       <small>*{{$message}}</small>
       <br> 
    @enderror    
</div>
<br />
<div class="form-group">
    {!! Form::label('email', 'Correo Electrónico') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresar correo del usuario']) !!}
    {{-- directiva validar campos formulario  --}}
   @error('email')
       <small>*{{$message}}</small>
       <br> 
    @enderror     
</div>
<br />
<h2 class="h5">Listado de roles</h2>
    @foreach ($roles as $role)
        <div>
            <label>
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                {{$role->name}}
            </label>
        </div>                    
    @endforeach
{!! Form::submit('Enviar', ['class'=>'btn', 'style'=>"color: black; background-color:#FFAA37;" ]) !!}