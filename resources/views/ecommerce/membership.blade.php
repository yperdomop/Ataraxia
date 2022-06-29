<x-app-layout>

    <h1 class="text-center">TIPOS DE MEMBRESIA</h1>
    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                @foreach ($membresias as $membresia)
                    <th class="text-capitalize" scope="col">{{ $membresia->name }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($membresias as $membresia)
                    <td>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                @foreach ($membresia->permissions as $permiso)
                                    <tr>
                                        <td class="ps-4 text-capitalize">{{ $permiso->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                @endforeach
            </tr>
            <tr>
                @foreach ($membresias as $membresia)
                    <td class="text-center">
                        <a href="{{ route('ecommerce.register', $membresia->name) }}" style="background-color:#FFAA37;"
                            class="btn">Comprar</a>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</x-app-layout>
