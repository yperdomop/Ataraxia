<div class="form-group">
    {!! Form::label('first_name', 'Nombre') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Ingresar nombre del usuario']) !!}
    @error('first_name')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div>
<br />
<div class="form-group">
    {!! Form::label('last_name', 'Apellido') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Ingresar apellido del usuario']) !!}
    @error('last_name')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div>
<br />
<div class="form-group">
    {!! Form::label('email', 'Correo Electrónico') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresar correo del usuario']) !!}
    {{-- directiva validar campos formulario --}}
    @error('email')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div>
<br />

{{-- <div class="form-group">
    {!! Form::label('company_datum_id', 'Datos de la companía') !!}
    {!! Form::text('company_datum_id', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingresar datos de la compañía',
    ]) !!}
    @error('company_datum_id')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div>
<br />
<div class="form-group">
    {!! Form::label('city_id', 'Ciudad') !!}
    {!! Form::text('city_id', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese la ciudad',
    ]) !!}
    @error('city_id')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div>
<br>
<div class="form-group">
    {!! Form::label('phone', 'Teléfono') !!}
    {!! Form::tel('phone', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese su teléfono',
    ]) !!}
    @error('phone')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div>
<br>
<div class="form-group">
    {!! Form::label('identification_document', 'Número de identificación') !!}
    {!! Form::text('identification_document', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese su número de identificación',
    ]) !!}
    @error('identification_document')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div>
<br>
<div class="form-group">
    {!! Form::label('gender', 'Género') !!}
    <select class="form-select" aria-label="Default select example">
        <option selected>Seleccione su género</option>
        <option value="1">Mujer</option>
        <option value="2">Hombre</option>
        <option value="3">Otro</option>
    </select>
    @error('gender')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div>
<br>
<div class="form-group">
    {!! Form::label('birth_date', 'Fecha de nacimiento') !!}
    {!! Form::date('birth_date', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese su fecha de nacimiento',
    ]) !!}
    @error('birth_date')
        <small>*{{ $message }}</small>
        <br>
    @enderror
</div> --}}
<br>
<h2 class="h5">Listado de roles</h2>
@foreach ($roles as $role)
    <div>
        <label>
            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
            {{ $role->name }}
        </label>
    </div>
@endforeach
{!! Form::submit('Enviar', ['class' => 'btn', 'style' => 'color: black; background-color:#FFAA37;']) !!}
