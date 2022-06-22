<x-app-layout>
    <a class="btn btn-link" href="{{ route('ecommerce.register', $membership['membresia']) }}">Volver</a>
    <h1 style="text-align:center">Resumen de datos</h1>
    <div class="d-flex justify-content-center">
        <table class="table w-75 table-bordered">
            <thead class="thead-dark">
            <tbody>
                <tr>
                    <th>Razón Social</th>
                    <td>{{ $membership['razon'] }}</td>
                </tr>

                <tr>
                    <th>NIT</th>
                    <td>{{ $membership['nit'] }}</td>
                </tr>
                <tr>
                    <th>Representante Legal</th>
                    <td>{{ $membership['nombre'] }}</td>
                </tr>
                <tr>
                    <th>Documento Representante Legal</th>
                    <td>{{ $membership['cedula'] }}</td>
                </tr>
                <tr>
                    <th>Teléfono</th>
                    <td>{{ $membership['telefono'] }}</td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td>{{ $membership['direccion'] }}</td>
                </tr>
                <tr>
                    <th>Ciudad</th>
                    <td>{{ $membership['ciudad'] }} </td>
                </tr>
                <tr>
                    <th>Deportes</th>
                    <td>{{ $membership['deporte'] }}</td>
                </tr>
                <tr>
                    <th>Tipo de membresia</th>
                    <td>{{ $membership['membresia'] }}</td>
                </tr>
                <tr>
                    <th>Periodo de membresia</th>
                    <td>{{ $membership['periodo'] }}</td>
                </tr>
                <tr>
                    <th>Total a pagar</th>
                    <td>$1.000.000</td>
                </tr>

                {{-- if($_FILES["archivo"]){
                $nombre_base= basename($_FILES["archivo"]["name"]);
                $nombre_final= date("m-d-y")."-". date("H-i-s"). "-" . $nombre_base;
              //esto es opcional si tengo una carpeta creada
                $ruta = "archivovos/" . $nombre_final;
                $subirarchivo= move_upload_file($_FILES["archivo"]["tmp_name"], $ruta);
                if ($subirarchivo){
                    $insertarSQL= "INSERT INTO informes (archivo) VALUES('$ruta')";
                    $resultado = mysql_query($conexion, $insertarSQL);
                    if ($resultado){
                        echo "<script>alert('se ha enviado su informe'); window.location='index.html'</script>";
                    }else{
                        printf("Errormessage: %s\n", mysql_error($conexion));
                    }
                }
               } --}}
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <a class="btn" style="color: black; background-color:#FFAA37;" href="#" role="button">Ir a pagar</a>
    </div>
</x-app-layout>
