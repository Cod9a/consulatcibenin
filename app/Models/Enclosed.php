<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Enclosed extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['url'];

    protected static function boot() {
        parent::boot();
        static::deleting(function ($item) {
            Storage::disk('public')->delete($item->path);
        });
    }

    public function getUrlAttribute() {
        return Storage::disk('public')->url($this->path);
    }
}
