<x-register-layout>
    <a class="btn btn-link" href="{{ route('ecommerce.membership') }}">Volver</a>
    <div class="row m-0" style="--bs-gutter-x: 0">
        <div class="col-sm-6">
            <form action="{{ route('ecommerce.update', $company) }}" method="POST" class="formulario"
                enctype="multipart/form-data">
                @csrf
                <h1 class="formulario__titulo">Formulario de datos</h1>
                <p>Los campos con * son obligatorios</p>
                <div class=" form-floating mb-3">
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        placeholder="* Nombre del representante legal"
                        value="{{ $company->users->first()->first_name }}">
                    <label for="nombre">* Nombre del representante legal</label>
                    @error('nombre')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" form-floating mb-3">
                    <input type="text" class="form-control" name="apellido" id="apellido"
                        placeholder="* Apellido del representante legal"
                        value="{{ $company->users->first()->last_name }}">
                    <label for="apellido">* Apellido del representante legal</label>
                    @error('apellido')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="cedula" id="cedula"
                        placeholder="* Ingrese la cédula" value="{{ $company->legal_representative_document }}">
                    <label for="cedula">* Cédula del representante legal</label>
                    @error('cedula')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        placeholder="Ingrese la dirección" value="{{ $company->address }}">
                    <label for="direccion">* Dirección del representante legal</label>
                    @error('direccion')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">

                    <input type="text" class="form-control" name="nit" name="nit"
                        placeholder="* Ingrese el NIT" value="{{ $company->nit }}">
                    <label for="nit">* Ingrese Nit</label>
                    @error('nit')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">

                    <input type="phone" class="form-control" name="telefono" id="telefono"
                        placeholder="* Ingrese el teléfono" value="{{ $company->phone }}">
                    <label for="telefono">* Ingrese el teléfono</label>
                    @error('telefono')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">

                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="* Ingrese el email" value="{{ $company->email }}">
                    <label for="email">* Ingrese el Email</label>
                    @error('email')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">

                    <input type="text" class="form-control" name="razon" id="razon"
                        placeholder="Ingrese la razón social" value="{{ $company->bussiness_name }}">
                    <label for="email"> Ingrese la razón socila</label>
                </div>
                <div class="form-floating">
                    <select name="periodo" class="form-select" id="periodo" aria-label="Default select example">
                        @foreach ($frecuencias as $frecuencia)
                            <option value={{ $frecuencia->id }} @if ($frecuencia->id == $company->purchases->last()->membership->payment->id) selected @endif>
                                {{ $frecuencia->name }}</option>
                        @endforeach
                    </select>
                    <label for="periodo">* Seleccione la vigencia de la membresía</label>
                </div><br>
                @error('periodo')
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
                <div class="form-floating">
                    <select name="ciudad" class="form-select" id="ciudad" aria-label="Default select example">
                        @foreach ($ciudades as $ciudad)
                            <option value={{ $ciudad->id }} @if ($ciudad->id == $company->city->id) selected @endif>
                                {{ $ciudad->name }}</option>
                        @endforeach
                    </select>
                    <label for="ciudad">* Seleccione la ciudad</label>
                </div><br>
                @error('ciudad')
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
                <div class="form-floating">
                    <select name="deporte" class="form-select" id="deporte" aria-label="Default select example">
                        @foreach ($deportes as $deporte)
                            <option value={{ $deporte->id }} @if ($deporte->id == $company->sport->id) selected @endif>
                                {{ $deporte->name }}</option>
                        @endforeach
                    </select>
                    <label for="deporte">* Seleccione un deporte</label>
                </div><br>
                @error('deporte')
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
                <br>
                <div class="d-flex flex-row-reverse">
                    <input type="submit" class="formulario__submit" value="Continuar">
                </div>
            </form>
        </div>
        <div class="col-6 d-none d-sm-block fondoimg"
            style="background-image:url({{ asset('img/poster-formulario.png') }});">
        </div>
    </div>

</x-register-layout>
