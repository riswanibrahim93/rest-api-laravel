<?php

namespace App\Artikel;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Artikel\Subjek;

class Artikel extends Model
{
    protected $fillable = [
        'title', 'slug', 'body', 'subjek_id',
    ];

    public function getRouteKeyName(){
    	return 'slug';
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function subjek(){
    	return $this->belongsTo(Subjek::class);
    }
}
