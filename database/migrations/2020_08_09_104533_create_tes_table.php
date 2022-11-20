<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes_user_jawaban', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->enum('type',['numerik','bahasa','logika','kepribadian','daya_ingat']);
            $table->integer('nomor');
            $table->string('jawaban');
            $table->timestamps();
        });

        Schema::create('tes_kunci_jawab_pg',function(Blueprint $table){
            $table->id();
            $table->enum('type',['numerik','bahasa','logika','daya_ingat']);
            $table->integer('nomor');
            $table->string('kunci');
            $table->timestamps();
        });

        Schema::create('tes_user_hasil',function(Blueprint $table){
            $table->id();
            $table->enum('type',['numerik','bahasa','logika','kepribadian','daya_ingat']);
            $table->integer('id_user');
            $table->string('hasil');
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
        Schema::drop('tes_user_jawaban');
        Schema::drop('tes_kunci_jawab_pg');
        Schema::drop('tes_user_hasil');
    }
}
