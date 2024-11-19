<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkincareCategory extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function skincare()
    {
        return $this->belongsTo(Skincare::class);
    }
}
