<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Image extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='image';
    protected $fillable=['title','image','type','gallery_id','tag','description','date','deleted_at','created_at','updated_at'];
    protected $hidden=['created_at','updated_at','deleted_at'];

    // public function gallery(){
    //     return $this->belongsTo('App\Models\Gallery','gallery_id');//one to one relationship

    // }
    public function gallery(){
       return $this->belongsTo('App\Models\Type','type','id');
    }
}
