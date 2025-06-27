<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
