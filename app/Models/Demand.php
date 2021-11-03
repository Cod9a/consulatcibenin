<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['full_date'];

    public function document() {
        return $this->belongsTo(Document::class);
    }

    public function encloseds() {
        return $this->hasMany(Enclosed::class);
    }

    public function getFullDateAttribute() {
        return $this->created_at->format('d/m/Y');
    }

    public function documentForm() {
        return $this->hasOne(DocumentForm::class);
    }
    
    public function meeting() {
        return $this->hasOne(Meeting::class);
    }
}
