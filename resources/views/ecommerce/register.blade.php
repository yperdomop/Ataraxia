<x-app-layout>
    {{-- @if (session('info'))
         <div class="alert alert-success">
             <strong>{{session('info')}}</strong>
         </div>    
     @endif --}}
    {{-- enctype="multipart/form-data" nos permite enviar archivos --}}
    <a class="btn btn-link" href="{{ route('ecommerce.membership') }}">Volver</a>
    <form action="{{ route('ecommerce.register.summary') }}" method="POST" class="formulario"
        enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="membresia" value="{{ $membership }}">
        <h1 class="formulario__titulo">Formulario de datos</h1>
        <div class="mb-3"><br>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del representante legal">
        </div>
        <div class="mb-3">

            <input type="text" class="form-control" name="cedula" placeholder="Ingrese la cédula">
        </div>
        <div class="mb-3">

            <input type="text" class="form-control" name="direccion" placeholder="Ingrese la dirección">
        </div>
        <div class="mb-3">

            <input type="text" class="form-control" name="nit" placeholder="Ingrese el nit">
        </div>
        <div class="mb-3">

            <input type="phone" class="form-control" name="telefono" placeholder="Ingrese el teléfono">
        </div>
        <div class="mb-3">

            <input type="email" class="form-control" name="email" placeholder="Ingrese el email">
        </div>
        <div class="mb-3">

            <input type="text" class="form-control" name="razon" placeholder="Ingrese la razón social">
        </div>
        <select name="periodo" class="form-select" aria-label="Default select example">
            <option selected>Seleccione el periodo</option>
            <option value="Mesual">Mensual</option>
            <option value="Trimestral">Trimestral</option>
            <option value="Anual">Anual</option>
        </select><br>



        <select name="ciudad" class="form-select" aria-label="Default select example">
            <option selected>Seleccione la ciudad</option>
            <option value="Cali">Cali</option>
            <option value="Bogotá">Bogotá</option>
            <option value="Neiva">Neiva</option>
        </select><br>
        <div class="mb-3">
            <input type="text" class="form-control" name="deporte" placeholder="Ingrese el deporte">
        </div><br>
        <div class="mb-3">
            <input class="form-control" type="file" name="archivo" multiple>
        </div>
        <div class="d-flex flex-row-reverse">
            <input type="submit" class="formulario__submit" value="Continuar">
        </div>

    </form>

</x-app-layout>
