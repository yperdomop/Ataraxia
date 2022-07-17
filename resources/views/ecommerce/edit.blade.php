<x-app-layout>
    <a class="btn btn-link" href="{{ route('ecommerce.membership') }}">Volver</a>
    <div class="row m-0" style="--bs-gutter-x: 0">
        <div class="col-sm-6">
            <form action="{{ route('ecommerce.update', $company) }}" method="POST" class="formulario"
                enctype="multipart/form-data">
                @csrf
                <h1 class="formulario__titulo">Formulario de datos</h1>
                <p>Los campos con * son obligatorios</p>
                <div class="mb-3">
                    <input type="text" class="form-control" name="nombre"
                        placeholder="* Nombre del representante legal"
                        value="{{ $company->users->first()->first_name }}">
                    @error('nombre')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="apellido"
                        placeholder="* Apellido del representante legal"
                        value="{{ $company->users->first()->last_name }}">
                    @error('apellido')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="cedula" placeholder="* Ingrese la cédula"
                        value="{{ $company->legal_representative_document }}">
                    @error('cedula')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">

                    <input type="text" class="form-control" name="direccion" placeholder="Ingrese la dirección"
                        value="{{ $company->address }}">
                    @error('direccion')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">

                    <input type="text" class="form-control" name="nit" placeholder="* Ingrese el NIT"
                        value="{{ $company->nit }}">
                    @error('nit')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">

                    <input type="phone" class="form-control" name="telefono" placeholder="* Ingrese el teléfono"
                        value="{{ $company->phone }}">
                    @error('telefono')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">

                    <input type="email" class="form-control" name="email" placeholder="* Ingrese el email"
                        value="{{ $company->email }}">
                    @error('email')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">

                    <input type="text" class="form-control" name="razon" placeholder="Ingrese la razón social"
                        value="{{ $company->bussiness_name }}">
                </div>
                <select name="periodo" class="form-select" aria-label="Default select example">
                    <option value="">* Seleccione la vigencia de la membresía</option>
                    @foreach ($frecuencias as $frecuencia)
                        <option value={{ $frecuencia->id }} @if ($frecuencia->id == $company->purchases->last()->membership->payment->id) selected @endif>
                            {{ $frecuencia->name }}</option>
                    @endforeach
                </select>
                @error('periodo')
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
                <br>
                <select name="ciudad" class="form-select" aria-label="Default select example">
                    <option value="" selected>* Seleccione la ciudad</option>
                    @foreach ($ciudades as $ciudad)
                        <option value={{ $ciudad->id }} @if ($ciudad->id == $company->city->id) selected @endif>
                            {{ $ciudad->name }}</option>
                    @endforeach
                </select>
                @error('ciudad')
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror
                <br>
                <select name="deporte" class="form-select" aria-label="Default select example">
                    <option value="" selected>* Seleccione un deporte</option>
                    @foreach ($deportes as $deporte)
                        <option value={{ $deporte->id }} @if ($deporte->id == $company->sport->id) selected @endif>
                            {{ $deporte->name }}</option>
                    @endforeach
                </select>
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

</x-app-layout>
