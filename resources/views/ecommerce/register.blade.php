<x-register-layout>
    <a class="btn btn-link" href="{{ route('ecommerce.membership') }}">Volver</a>
    <div class="row m-0" style="--bs-gutter-x: 0">
        <div class="col-sm-6">
            <form action="{{ route('ecommerce.storage', $membership) }}" method="POST" class="formulario"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="membresia" value="{{ $membership }}">
                <h1 class="formulario__titulo">Formulario de datos</h1>
                <p>Los campos con * son obligatorios</p>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        placeholder="* Nombre del representante legal" value="{{ old('nombre') }}">
                    <label for="nombre">* Nombre del representante legal</label>
                    @error('nombre')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="apellido" id="apellido"
                        placeholder="* Apellido del representante legal" value="{{ old('apellido') }}">
                    <label for="apellido">* Apellido del representante legal</label>
                    @error('apellido')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="cedula" id="cedula"
                        placeholder="* Ingrese la cédula" value="{{ old('cedula') }}">
                    <label for="cedula">* Ingrese la cédula representante legal</label>
                    @error('cedula')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        placeholder="Ingrese la dirección" value="{{ old('direccion') }}">
                    <label for="direccion">* Ingrese la dirección de la compañía</label>
                    @error('direccion')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nit" id="nit"
                        placeholder="* Ingrese el NIT" value="{{ old('nit') }}">
                    <label for="nit">* Ingrese el NIT</label>
                    @error('nit')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="razon" id="razon"
                        placeholder="Ingrese la razón social" value="{{ old('razon') }}">
                    <label for="razon">Ingrese la razón social</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="phone" class="form-control" name="telefono" id="telefono"
                        placeholder="* Ingrese el teléfono" value="{{ old('telefono') }}">
                    <label for="telefono">* Ingrese el teléfono</label>
                    @error('telefono')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="* Ingrese el email" value="{{ old('email') }}">
                    <label for="email">* Ingrese el email</label>
                    @error('email')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <select name="periodo" class="form-select" id="periodo" aria-label="Default select example">
                        @foreach ($frecuencias as $frecuencia)
                            <option value={{ $frecuencia->id }}>{{ $frecuencia->name }}</option>
                        @endforeach
                    </select>
                    <label for="periodo">* Seleccione la vigencia de la membresía</label>
                    @error('periodo')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-floating">
                    <select name="ciudad" class="form-select" id="ciudad" aria-label="Default select example">
                        @foreach ($ciudades as $ciudad)
                            <option value={{ $ciudad->id }}>{{ $ciudad->name }}</option>
                        @endforeach
                    </select>
                    <label for="periodo">* Seleccione la ciudad</label>
                    @error('ciudad')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-floating">
                    <select name="deporte" class="form-select" id="deporte" aria-label="Default select example">
                        @foreach ($deportes as $deporte)
                            <option value={{ $deporte->id }}>{{ $deporte->name }}</option>
                        @endforeach
                    </select>
                    <label for="periodo">* Seleccione un deporte</label>
                    @error('deporte')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="d-flex flex-row-reverse">
                    <input type="submit" class="formulario__submit" value="Continuar">
                </div>

            </form>
        </div>
        <div
            class="col-6 d-none d-sm-block fondoimg"style="background-image:url({{ asset('img/poster-formulario.png') }});">
        </div>
    </div>
</x-register-layout>
