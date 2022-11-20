<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('level',['admin','bk','siswa']);
            $table->integer('id_sekolah')->nullable();
            $table->string('display_password')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('sekolah',function(Blueprint $table){
            $table->id();
            $table->string('nama_sekolah');
            $table->string('kode_sekolah')->unique();
            $table->timestamps();
        });
        Schema::create('detail_bk',function(Blueprint $table){
            $table->id();
            $table->integer('id_user');
            $table->string('nama');
            $table->string('no_telp');
            $table->timestamps();
        });
        Schema::create('detail_siswa',function(Blueprint $table){
            $table->id();
            $table->integer('id_user');
            $table->string('nama');
            $table->string('no_telp');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('sub_jurusan');
            $table->string('lembaga_sekolah');
            $table->date('tgl_lahir');
            $table->text('alamat')->nullable();
            $table->string('kelas');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('email')->nullable();
            $table->string('youtube')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('hobi')->nullable();
            // $table->enum('minat_melanjutkan',['Kerja','Kuliah'])->nullable();
            $table->enum('minat_melanjutkan',['SMK','SMA'])->nullable();
            $table->text('strength')->nullable();
            $table->text('weakness')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('hp_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('hp_ibu')->nullable();
            $table->string('job_ayah')->nullable();
            $table->string('job_ibu')->nullable();
            $table->string('tracker_lanjut')->nullable();
            $table->string('tracker_bidang')->nullable();
            $table->string('tracker_nama')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('sekolah');
        Schema::drop('detail_bk');
        Schema::drop('detail_siswa');
    }
}
