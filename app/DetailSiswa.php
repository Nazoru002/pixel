<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSiswa extends Model
{

    protected $table="detail_siswa";
    protected $primaryKey="id";
    protected $fillable =['lembaga_sekolah','jurusan','sub_jurusan','id_user','kelas','nama','no_telp','tgl_lahir','alamat','jenis_kelamin','facebook','instagram','email','youtube','cita_cita','hobi','minat_melanjutkan','strength','weakness','nama_ayah','hp_ayah','nama_ibu','hp_ibu','job_ayah','job_ibu','tracker_lanjut','tracker_nama','tracker_bidang'];

    protected function ruser(){
    	return $this->belongsTo('App\User','id_user','id_user');
    }
}
