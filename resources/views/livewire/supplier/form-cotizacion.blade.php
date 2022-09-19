<div>
    {!! Form::hidden('hotels', $hoteles) !!}
    {!! Form::hidden('restaurants', $restaurantes) !!}
    {!! Form::hidden('transports', $transportes) !!}
    {!! Form::hidden('logistics', $logisticas) !!}
    {!! Form::hidden('insumos', $insumos) !!}
    @if ($hoteles > 0)
        <div class="pt-3 row d-flex justify-content-between">
            <h4>
                <strong>Hospedaje</strong>
            </h4>
            <div>
                <button class="btn btn-ataraxia" wire:click.prevent="addHotel" title="Agregar Hotel"><i
                        class="fas fa-hotel"></i><i class="fas fa-plus"></i></button>
            </div>
        </div>
    @endif
    @for ($i = 0; $i < $hoteles; $i++)
        <div class="pt-3 row">
            <div class="form-group col mb-3">
                {!! Form::label('nombre_hotel_' . $i, 'Nombre del hotel') !!}
                {!! Form::text('nombre_hotel_' . $i, null, ['class' => 'form-control', 'placeholder' => 'Nombre del hotel']) !!}
                @error('nombre_hotel_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                {!! Form::label('valor_hotel_' . $i, 'Costo del hotel') !!}
                {!! Form::number('valor_hotel_' . $i, 0, [
                    'class' => 'form-control',
                    'placeholder' => 'Costo del hotel',
                    'wire:model.lazy' => 'lw_hotel.' . $i,
                    'wire:focusout' => 'sumar',
                ]) !!}
                @error('valor_hotel_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                {!! Form::label('ubicacion_hotel_' . $i, 'Ubicación del hotel') !!}
                {!! Form::text('ubicacion_hotel_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ubicación del hotel',
                ]) !!}
                @error('ubicacion_hotel_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                {!! Form::label('descripcion_hotel_' . $i, 'Descripción del hotel') !!}
                {!! form::textarea('descripcion_hotel_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Descripción del hotel',
                    'rows' => '2',
                ]) !!}
            </div>
        </div>
    @endfor
    @if ($restaurantes > 0)
        <div class="pt-3 row d-flex justify-content-between">
            <h4>
                <strong>Alimentación</strong>
            </h4>
            <div>
                <button class="btn btn-ataraxia" wire:click.prevent="addRestaurante" title="Agregar Restaurante"><i
                        class="fas fa-utensils"></i><i class="fas fa-plus"></i></button>
            </div>
        </div>
    @endif
    @for ($i = 0; $i < $restaurantes; $i++)
        <div class="pt-3 row">
            <div class="form-group col mb-3">
                {!! Form::label('nombre_restaurante_' . $i, 'Nombre del restaurante') !!}
                {!! Form::text('nombre_restaurante_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Nombre del restaurante',
                ]) !!}
                @error('nombre_restaurante_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                {!! Form::label('valor_restaurante_' . $i, 'Costo del restaurante') !!}
                {!! Form::number('valor_restaurante_' . $i, 0, [
                    'class' => 'form-control',
                    'placeholder' => 'Costo del restaurante',
                    'wire:model.lazy' => 'lw_restaurante.' . $i,
                    'wire:focusout' => 'sumar',
                ]) !!}
                @error('valor_restaurante_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                {!! Form::label('ubicacion_restaurante_' . $i, 'Ubicación del restaurante') !!}
                {!! Form::text('ubicacion_restaurante_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ubicación del restaurante',
                ]) !!}
                @error('ubicacion_restaurante_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                {!! Form::label('descripcion_restaurante_' . $i, 'Descripción del restaurante') !!}
                {!! form::textarea('descripcion_restaurante_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Descripción del restaurante',
                    'rows' => '2',
                ]) !!}
            </div>
        </div>
    @endfor
    @if ($transportes > 0)
        <div class="pt-3 row d-flex justify-content-between">
            <h4>
                <strong>Transporte</strong>
            </h4>
            <div>
                <button class="btn btn-ataraxia" wire:click.prevent="addTransporte" title="Agregar Transporte"><i
                        class="fas fa-taxi"></i><i class="fas fa-plus"></i></button>
            </div>
        </div>
    @endif
    @for ($i = 0; $i < $transportes; $i++)
        <div class="pt-3 row">
            <div class="form-group col">
                {!! Form::label('tipo_transporte_' . $i, 'Tipo de transporte') !!}
                {!! Form::select('tipo_transporte_' . $i, $transport_types, null, [
                    'class' => 'form-control form-select-lg',
                    'placeholder' => 'Seleccione el transporte',
                ]) !!}
            </div>
            <div class="form-group col mb-3">
                {!! Form::label('nombre_transporte_' . $i, 'Nombre del transporte') !!}
                {!! Form::text('nombre_transporte_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Nombre del transporte',
                ]) !!}
                @error('nombre_transporte_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                {!! Form::label('valor_transporte_' . $i, 'Costo del transporte') !!}
                {!! Form::number('valor_transporte_' . $i, 0, [
                    'class' => 'form-control',
                    'placeholder' => 'Costo del transporte',
                    'wire:model.lazy' => 'lw_transporte.' . $i,
                    'wire:focusout' => 'sumar',
                ]) !!}
                @error('valor_transporte_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                {!! Form::label('descripcion_transporte_' . $i, 'Descripción del transporte') !!}
                {!! form::textarea('descripcion_transporte_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Descripción del transporte',
                    'rows' => '2',
                ]) !!}
            </div>
        </div>
    @endfor
    @if ($logisticas > 0)
        <div class="pt-3 row d-flex justify-content-between">
            <h4>
                <strong>Logistica</strong>
            </h4>
            <div>
                <button class="btn btn-ataraxia" wire:click.prevent="addLogistica" title="Agregar Transporte"><i
                        class="fas fa-dolly"></i><i class="fas fa-plus"></i></button>
            </div>
        </div>
    @endif
    @for ($i = 0; $i < $logisticas; $i++)
        <div class="pt-3 row">
            <div class="form-group col mb-3">
                {!! Form::label('nombre_logistica_' . $i, 'Nombre operador logístico') !!}
                {!! Form::text('nombre_logistica_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Nombre operador logístico',
                ]) !!}
                @error('nombre_logistica_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                {!! Form::label('valor_logistica_' . $i, 'Costo operador logístico') !!}
                {!! Form::number('valor_logistica_' . $i, 0, [
                    'class' => 'form-control',
                    'placeholder' => 'Costo operador logístico',
                    'wire:model.lazy' => 'lw_logistica.' . $i,
                    'wire:focusout' => 'sumar',
                ]) !!}
                @error('valor_logistica_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                {!! Form::label('ubicacion_logistica_' . $i, 'Ubicación operador logístico') !!}
                {!! Form::text('ubicacion_logistica_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ubicación operador logístico',
                ]) !!}
                @error('ubicacion_logistica_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                {!! Form::label('descripcion_logistica_' . $i, 'Descripción operador logístico') !!}
                {!! form::textarea('descripcion_logistica_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Descripción operador logístico',
                    'rows' => '2',
                ]) !!}
            </div>
        </div>
    @endfor
    @if ($insumos > 0)
        <div class="pt-3 row d-flex justify-content-between">
            <h4>
                <strong>Insumos</strong>
            </h4>
            <div>
                <button class="btn btn-ataraxia" wire:click.prevent="addInsumo" title="Agregar Insumos"><i
                        class="fas fa-futbol"></i><i class="fas fa-plus"></i></button>
            </div>
        </div>
    @endif
    @for ($i = 0; $i < $insumos; $i++)
        <div class="pt-3 row">
            <div class="form-group col mb-3">
                {!! Form::label('nombre_insumo_' . $i, 'Nombre proveedor insumos') !!}
                {!! Form::text('nombre_insumo_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Nombre proveedor insumos',
                ]) !!}
                @error('nombre_insumo_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                {!! Form::label('valor_insumo_' . $i, 'Costo proveedor insumos') !!}
                {!! Form::number('valor_insumo_' . $i, 0, [
                    'class' => 'form-control',
                    'placeholder' => 'Costo proveedor insumos',
                    'wire:model.lazy' => 'lw_insumo.' . $i,
                    'wire:focusout' => 'sumar',
                ]) !!}
                @error('valor_insumo_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                {!! Form::label('ubicacion_insumo_' . $i, 'Ubicación proveedor') !!}
                {!! Form::text('ubicacion_insumo_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ubicación proveedor insumos',
                ]) !!}
                @error('ubicacion_insumo_' . $i)
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                {!! Form::label('descripcion_insumo_' . $i, 'Descripción proveedor insumos') !!}
                {!! form::textarea('descripcion_insumo_' . $i, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Descripción proveedor insumos',
                    'rows' => '2',
                ]) !!}
            </div>
        </div>
    @endfor
    <div class="mb-3 row">
        <div class="form-group col mb-3">
            <label for="formFile" class="form-label">Subir archivo de cotización</label>
            <input class="form-control" name="file" type="file" id="file">
        </div>
        <div class="form-group col mb-3">
            <label for="total" class="form-label">Total cotización</label>
            <input type="number" name="f_total" wire:model="total" class="form-control" placeholder="Total cotización"
                readonly>
        </div>
    </div>
</div>
