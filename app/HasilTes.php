<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilTes extends Model
{
    
    protected $table="tes_user_hasil";
    protected $primaryKey="id";
    protected $fillable =['id_user','type','hasil'];

    public function ruser(){
    	return $this->hasOne('App\User','id','id_user')->where('level','siswa');
    }
}
