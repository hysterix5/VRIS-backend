<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprehension extends Model
{
    use HasFactory;

    public function establishments()
    {
        return $this->hasMany(Establishment::class);
    }

    public function violators()
    {
        return $this->hasMany(Violators::class);
    }

    public function public_conveyances()
    {
        return $this->hasMany(PublicConveyances::class);
    }
}
