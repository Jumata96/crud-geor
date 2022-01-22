<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    use HasFactory;
    public function biblioteca(){
        return $this->belongsTo('App\Models\Biblioteca');
    }
}
