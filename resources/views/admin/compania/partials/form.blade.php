<div class="pt-3 row">
    <div class="form-group col">
        {!! Form::label('bussiness_name', 'Nombre') !!}
        {!! Form::text('bussiness_name', null, [
            'class' => 'form-control',
            'placeholder' => 'Ingresar nombre de la compañía',
        ]) !!}
        @error('bussiness_name')
            <small>*{{ $message }}</small>
            <br>
        @enderror
    </div>

    <div class="form-group col">
        {!! Form::label('legal_representative', 'Representante') !!}
        {!! Form::text('legal_representative', null, [
            'class' => 'form-control',
            'placeholder' => 'Ingresar representante legal de la compañía',
        ]) !!}
        @error('legal_representative')
            <small>*{{ $message }}</small>
            <br>
        @enderror
    </div>

</div>

<div class="pt-3 row">
    <div class="form-group col">
        {!! Form::label('nit', 'Nit') !!}
        {!! Form::text('nit', null, [
            'class' => 'form-control',
            'placeholder' => 'Ingresar el Nit',
        ]) !!}
        @error('nit')
            <small>*{{ $message }}</small>
            <br>
        @enderror
    </div>
    <div class="form-group col">
        {!! Form::label('address', 'Dirección') !!}
        {!! Form::text('address', null, [
            'class' => 'form-control',
            'placeholder' => 'Ingresar representante legal de la compañía',
        ]) !!}
        @error('address')
            <small>*{{ $message }}</small>
            <br>
        @enderror
    </div>
</div>
<div class="pt-3 row">
    <div class="form-group col">
        {!! Form::label('phone', 'Teléfono') !!}
        {!! Form::text('phone', null, [
            'class' => 'form-control',
            'placeholder' => 'Ingresar el teléfono',
        ]) !!}
        @error('phone')
            <small>*{{ $message }}</small>
            <br>
        @enderror
    </div>
    <div class="form-group col">
        {!! Form::label('city_id', 'Ciudad') !!}
        {!! Form::select('city_id', $ciudades->pluck('name', 'id'), null, [
            'class' => 'form-control',
            'placeholder' => 'Ingresar la ciudad',
        ]) !!}
        @error('city_id')
            <small>*{{ $message }}</small>
            <br>
        @enderror
    </div>
</div>
<div class="pt-3 row">
    <div class="form-group col">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, [
            'class' => 'form-control',
            'placeholder' => 'Ingresar el correo electrónico',
        ]) !!}
        @error('email')
            <small>*{{ $message }}</small>
            <br>
        @enderror
    </div>
    <div class="form-group col">
        {!! Form::label('legal_representative_document', 'Documento') !!}
        {!! Form::text('legal_representative_document', null, [
            'class' => 'form-control',
            'placeholder' => 'Ingresar el documento de identidad',
        ]) !!}
        @error('legal_representative_document')
            <small>*{{ $message }}</small>
            <br>
        @enderror
    </div>
</div>
<div class="pt-3 row">
    <div class="form-group col">
        {!! Form::label('sport_id', 'Deporte') !!}
        {!! Form::select('sport_id', $deportes->pluck('name', 'id'), null, [
            'class' => 'form-control',
            'placeholder' => 'Ingresar el deporte',
        ]) !!}
        @error('sport_id')
            <small>*{{ $message }}</small>
            <br>
        @enderror
    </div>
    <div class="form-group col">
        {!! Form::label('postal_code', 'Código postal') !!}
        {!! Form::text('postal_code', null, [
            'class' => 'form-control',
            'placeholder' => 'Ingresar el código postal',
        ]) !!}
        @error('postal_code')
            <small>*{{ $message }}</small>
            <br>
        @enderror
    </div>
</div>
{!! Form::submit('Enviar', ['class' => 'btn', 'style' => 'color: black; background-color:#FFAA37;']) !!}
