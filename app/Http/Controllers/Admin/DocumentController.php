<?php

namespace App\Http\Controllers\Admin;

use App\Mail\confirdocumentoMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Company_datum;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        return view('admin.documentos.index');
    }

    public function update(Request $request, Document $document)
    {
        $document->update(['status' => $request->status[0]]);

        //notificación al correo
        $correo = new confirdocumentoMailable($document);
        Mail::to($document->documentable->email)->send($correo);

        return redirect()->route('admin.documentos.index')->with('info', 'Documento actualizado');
    }
}
