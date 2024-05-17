<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprehension extends Model
{
    use HasFactory;

    public function violators()
    {
        return $this->belongsTo(Violators::class);
    }

    public function publicConveyance()
    {
        return $this->belongsTo(PublicConveyances::class);
    }

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

}
