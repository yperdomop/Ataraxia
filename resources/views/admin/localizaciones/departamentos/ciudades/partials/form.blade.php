<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresar nombre de la ciudad']) !!}
    {!! Form::hidden('department_id', $department->id) !!}

    @error('name')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div>
{!! Form::submit('Guardar', ['class' => 'btn', 'style' => 'color: black; background-color:#FFAA37;']) !!}
