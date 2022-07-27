<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='gallery';
    protected $fillable=['title','cover','tag','created_at','updated_at'];
    protected $hidden=['created_at','updated_at','deleted_at'];

    // public function image(){
    //     return $this->hasOne('App\Models\Image','gallery_id');//one to one relationship
    // }

    public function image(){
        return $this->hasMany('App\Models\Image','gallery_id','id');
    }
}
