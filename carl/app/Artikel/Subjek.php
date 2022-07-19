<?php

namespace App\Artikel;

use Illuminate\Database\Eloquent\Model;
use App\Artikel\Artikel;

class Subjek extends Model
{
    public function artikel(){
        return $this->hasMany(Artikel::class);
    }
}
