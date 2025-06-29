<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function barrio()
    {
        return $this->belongsTo(Barrio::class);
    }
}
