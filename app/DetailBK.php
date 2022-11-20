<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBK extends Model
{
    protected $table="detail_siswa";
    protected $primaryKey="id";
    protected $fillable =['id_user','nama','no_telp'];
}
