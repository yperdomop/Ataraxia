<x-app-layout>
    <a class="btn btn-link" href="">Volver</a>
    <h1 style="text-align:center">Resumen de datos</h1>
    <div class="d-flex justify-content-center">
        <table class="table w-75 table-bordered table-striped">
            <tbody>
                <tr>
                    <th>Razón Social</th>
                    <td>{{ $company->bussiness_name }}</td>
                </tr>

                <tr>
                    <th>NIT</th>
                    <td>{{ $company->nit }}</td>
                </tr>
                <tr>
                    <th>Representante Legal</th>
                    <td>{{ $company->legal_representative }}</td>
                </tr>
                <tr>
                    <th>Documento Representante Legal</th>
                    <td>{{ $company->legal_representative_document }}</td>
                </tr>
                <tr>
                    <th>Teléfono</th>
                    <td>{{ $company->phone }}</td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td>{{ $company->address }}</td>
                </tr>
                <tr>
                    <th>Ciudad</th>
                    <td>{{ $company->city->name }}</td>
                </tr>
                <tr>
                    <th>Deportes</th>
                    <td>{{ $company->sport->name }}</td>
                </tr>
                <tr>
                    <th>Tipo de membresia</th>
                    <td class="text-capitalize">{{ $company->users->first()->getRoleNames()->first() }}</td>
                </tr>
                <tr>
                    <th>Periodo de membresia</th>
                    <td>Trimestral</td>
                </tr>
                <tr>
                    <th>Total a pagar</th>
                    <td>$1.000.000</td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <a href="{{ route('ecommerce.payment') }}" <a class="btn" style="color: black; background-color:#FFAA37;">Ir a
            pagar</a>
    </div>
</x-app-layout>
