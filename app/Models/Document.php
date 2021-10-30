<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    const CARTE_CONSULAIRE = 'carte-consulaire';
    use HasFactory;
    protected $casts = [];
    protected $guarded = [];
}
