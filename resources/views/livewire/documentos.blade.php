<div class="form-group col">
    <select name="dato" class="form-select select2" wire:model="idc">
        <option value="" selected>compañias</option>
        @foreach ($datos as $dato)
            <option value={{ $dato->id }}>{{ $dato->bussiness_name }}</option>
        @endforeach
    </select>
    <br />

    @isset($compania->documents)
        @foreach ($compania->documents as $document)
            <h2>{{ $document->document_type->name }}</h2>


            <iframe src="{{ Storage::url($document->document_route) }}" type="application/pdf" frameborder="0" height="300px"
                width="100%"></iframe>
        @endforeach
    @endisset

</div>
