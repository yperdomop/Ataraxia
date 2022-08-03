<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Document_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::user()->company) {
            return view('dashboard');
        } else {
            if (Auth::user()->company->documents->count() == 0) {
                return redirect()->route('documentos');
            } else {
                return view('dashboard');
            }
        }
    }

    public function documentos()
    {
        $tipos = Document_type::all();
        return view('users.document', compact('tipos'));
    }

    public function guardarDocumentos(Request $request)
    {
        $request->validate([
            "tipo" => "required",
            "file" => "mimes:pdf,png,jpg"
        ]);

        if (Auth::user()->company->documents->count() == 0) {
            $var = 'info';
            $msg = 'Ya puedes continuar navegando en nuestra página.';
        } else {
            $var = 'confirm';
            $msg = "Documento cargado";
        }

        $url = Storage::put('documents', $request->file('file'));

        Auth::user()->company->documents()->create([
            'document_type_id' => $request->tipo,
            'document_route' => $url
        ]);


        return redirect()->route('dashboard')->with($var, $msg);
    }
    public function VerDocumentos()
    {
        $documentos =  Auth::user()->company->documents;
        return view('users.VerDocument', compact('documentos'));
    }

    public function EliminarDocumento(Document $document)
    {
        Storage::delete($document->document_route);
        $document->delete();

        return redirect()->route('dashboard');
    }
}
