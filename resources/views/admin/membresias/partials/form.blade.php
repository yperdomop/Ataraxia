<div class="form-group">
    {!! Form::label('role', 'Tipo de membresía') !!}
    {!! Form::select('role', $roles->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
    <br>

    {!! Form::label('price', 'Precio') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Ingresar precio de la membresía']) !!}

    <br>
    {!! Form::label('pago', 'Frecuencia de Pagos') !!}
    {!! Form::select('pago', $pagos->pluck('name', 'id'), null, ['class' => 'form-control']) !!}

    @error('name')
        <small>*{{ $message }}</small>
        <br>
    @enderror
    <br>
    {!! Form::submit('Guardar', ['class' => 'btn', 'style' => 'color: black; background-color:#FFAA37;']) !!}
</div>
