<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table='type';
    protected $fillable =['type'];

    public function image(){
        return $this->hasMany('App\Models\Image','type','id');
    }
}
