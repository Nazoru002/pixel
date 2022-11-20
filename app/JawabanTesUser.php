<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanTesUser extends Model
{
    
    protected $table="tes_user_jawaban";
    protected $primaryKey="id";
    protected $fillable =['id_user','type','nomor','jawaban'];

    public function rkunci(){
    	return $this->hasOne('App\KunciJawaban','nomor','nomor')->where('type','numerik');
    }
}
