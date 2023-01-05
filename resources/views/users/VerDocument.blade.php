<x-app-layout>
    <div class="vh-100">
        <a class="btn btn-ataraxia" href="{{ route('documentos') }}">Cargar nuevo documento</a>
        <div><br>
            <h2>
                <center><strong> AQUI PUEDES VER TUS DOCUMENTOS</strong></center>
            </h2>
            <div class="row m-3">
                <div class="col">
                    <table class="table table-bordered"><br>
                        <thead class="table-dark">
                            <tr style="text-align: center">

                                <th class="border border-warning" scope="col">Tipo de documento</th>
                                <th class="border border-warning" scope="col">Estado</th>
                                <th class="border border-warning" scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($documentos as $documento)
                                <tr>
                                    <td>
                                        {{ $documento->document_type->name }}
                                    </td>
                                    <td>{{ $documento->status }}</td>
                                    <td width="10px">
                                        <a href="{{ Storage::url($documento->document_route) }}"
                                            style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                                            target="_blank" title="Ver documento"><img
                                                src="{{ asset('img/icono-ver.png') }}"
                                                style="width:40px;height:40px;"</a>
                                    </td>

                                    <td width="10px">
                                        @if ($documento->status != 'Aprobado')
                                            <form action="{{ route('documentos.eliminar', $documento) }}" method="post"
                                                onSubmit="return confirm('Seguro desea eliminar?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="border-0"> <img
                                                        src="{{ asset('img/icono-eliminar.png') }}"
                                                        style="width:40px;height:40px;" title="Eliminar"></button>
                                            </form>
                                        @endif

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
