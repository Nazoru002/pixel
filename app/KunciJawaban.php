<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KunciJawaban extends Model
{
    
    protected $table="tes_kunci_jawab_pg";
    protected $primaryKey="id";
    protected $fillable =['type','nomor','kunci'];
}
