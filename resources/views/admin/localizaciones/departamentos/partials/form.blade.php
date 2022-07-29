<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresar nombre del departamento']) !!}
    {!! Form::hidden('country_id', $country->id) !!}

    @error('name')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div>
{!! Form::submit('Guardar', ['class' => 'btn', 'style' => 'color: black; background-color:#FFAA37;']) !!}
