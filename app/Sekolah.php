<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table="sekolah";
    protected $primaryKey="id";
    protected $fillable =['nama_sekolah','kode_sekolah'];

    public function ruser(){
    	return $this->belongsTo('App\User','id','id_sekolah');
    }
    public function rsiswaAll(){
    	return $this->hasMany('App\User','id_sekolah','id')->where('level','siswa');
    }
    public function rbk(){
    	return $this->hasOne('App\User','id_sekolah','id')->where('level','bk');
    }
}
