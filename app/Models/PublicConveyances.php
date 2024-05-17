<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicConveyances extends Model
{
    use HasFactory;

    public function apprehension()
    {
        return $this->hasOne(Apprehension::class, 'public_conveyance_id');
    }
}
