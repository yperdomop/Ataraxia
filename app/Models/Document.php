<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'documentable_id',
        'documentable_type',
        'document_route',
        'document_type_id',
        'registred',
        'status'
    ];

    //relación polimorfica
    public function documentable()
    {
        return $this->morphTo();
    }

    //uno a muchos inverso
    public function document_type()
    {
        return $this->belongsTo(Document_type::class);
    }
}
