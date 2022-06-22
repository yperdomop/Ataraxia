<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresar nombre de permiso']) !!}
    
    @error('name')
    <small>*{{$message}}</small>
    <br> 
 @enderror    
</div>
<br>
<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Ingresar nombre del rol']) !!}
    
    @error('description')
    <small>*{{$message}}</small>
    <br> 
 @enderror    
</div>
<br>

{!! Form::submit('Guardar', ['class'=>'btn', 'style'=>"color: black; background-color:#FFAA37;"]) !!}