<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return redirect()->route('admin.documentos.index');
    }
}
