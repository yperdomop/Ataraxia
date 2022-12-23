<div class="form-group col">
    <select name="dato" class="form-select select2" wire:model="idc">
        <option value="" selected>compañias</option>
        @foreach ($datos as $dato)
            <option value={{ $dato->id }}>{{ $dato->bussiness_name }}</option>
        @endforeach
    </select><br><br>

    @isset($compania->documents)
        @foreach ($compania->documents as $document)
            <div class="d-flex justify-content-between">
                <span class="h4">{{ $document->document_type->name }}</span>

                {!! Form::model($document, ['route' => ['admin.documentos.update', $document], 'method' => 'put']) !!}
                <div class="input-group m-1">
                    {!! Form::label('status', 'Estado: ', ['class' => 'align-self-center']) !!}
                    {!! Form::select(
                        'status[]',
                        ['Pendiente' => 'Pendiente', 'Aprobado' => 'Aprobado', 'Rechazado' => 'Rechazado'],
                        null,
                        [
                            'class' => 'form-control',
                        ],
                    ) !!}

                    {!! Form::submit('Actualizar', ['class' => 'btn mx-1', 'style' => 'color: black; background-color:#FFAA37;']) !!}

                </div><br>
                {!! Form::close() !!}

            </div>

            <iframe src="{{ Storage::url($document->document_route) }}" type="application/pdf" frameborder="0" height="300px"
                width="100%"></iframe>
        @endforeach
    @endisset

</div>
