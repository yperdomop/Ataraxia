<x-register-layout>
    @push('image')
        style="background-image:url({{ asset('img/background-membresias.png') }});"
    @endpush
    <div class="table-responsive pt-3" class="font-sans antialiased fondoimg">
        <h1 class="text-white text-decoration-underline text-under-color">TIPOS DE MEMBRESÍA</h1>
        <table class="table table-bordered table-striped text-white" style="border-radius: 20px">
            <thead class="text-center" style="background-color:#FFAA37;">
                <tr>
                    @foreach ($membresias as $membresia)
                        <th class="text-capitalize " scope="col">{{ $membresia->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($membresias as $membresia)
                        <td>
                            <table class="table text-white">
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
                            <a href="{{ route('ecommerce.register', $membresia->name) }}"
                                style="background-color:#FFAA37;color: #fff; border-radius: 15px;"
                                class="btn">Comprar</a>
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

</x-register-layout>
