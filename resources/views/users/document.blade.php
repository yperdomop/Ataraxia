<x-app-layout>
    <h2>
        <h1 class="formulario__titulo">Cargue de Documentos</h1>
    </h2>
    @if (Auth::user()->company->documents->count() == 0)
        @push('scripts')
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire(
                    "¡¡¡Bienvenido!!!",
                    "Antes de comenzar, es necesario que cargue un documento",
                    'success'
                )
            </script>
        @endpush
    @endif
    <form action="{{ route('documentos.guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" w-100 vh-100 align-items-center ">
            <div class=" formulario ">
                <label for="exampleInputEmail1" class="form-label">
                    <h5>Tipo de Documento</h5>
                </label>
                <select class="form-select" name="tipo" id="tipo" aria-label="Default select example">
                    <option selected>Seleccione el Documento</option>
                    @foreach ($tipos as $tipo)
                        //valida si ya esta cargado el tipo de documento
                        @if (Auth::user()->company->documents->where('document_type_id', $tipo->id)->isNotEmpty())
                            @continue
                        @endif
                        <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                    @endforeach
                </select><br>
                {{-- no funciona --}}
                {{-- @error('tipo')
                    <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                @enderror --}}

                <div class="mb-3">
                    <label for="formFile" class="form-label">
                        <h5>Cargue el Documento</h5>
                    </label>
                    <input class="form-control" name="file" type="file" id="formFile">
                </div>
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="formulario__submit">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
