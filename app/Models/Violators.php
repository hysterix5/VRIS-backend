<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violators extends Model
{
    use HasFactory;

    public function apprehension()
    {
        return $this->belongsTo(Apprehension::class);
    }
}
