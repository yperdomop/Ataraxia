<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company_datum;

class DocumentController extends Controller
{
    public function index()
    {
        return view('admin.documentos.index');
    }
}
