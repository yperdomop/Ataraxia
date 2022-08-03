<x-app-layout>
    <div class="vh-100">
        <a class="btn btn-link" href="{{ route('dashboard') }}">Volver</a>
        <div><br>
            <h2>
                <center><strong> AQUI PUEDES VER TUS DOCUMENTOS</strong></center>
            </h2>
            <div class="row m-3">
                <div class="col">
                    <table class="table table-bordered"><br>
                        <thead class="table-dark">
                            <tr>

                                <th scope="col">Tipo de documento</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentos as $documento)
                                <tr>
                                    <td>
                                        {{ $documento->document_type->name }}
                                    </td>
                                    <td width="10px">
                                        <a href="{{ Storage::url($documento->document_route) }}"
                                            style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                                            target="_blank" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                    </td>

                                    <td width="10px">
                                        <form action="{{ route('documentos.eliminar', $documento) }}" method="post"
                                            onSubmit="return confirm('Seguro desea eliminar?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger"
                                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                                    class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
