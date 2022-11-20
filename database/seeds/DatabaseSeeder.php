<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Sekolah;
use App\KunciJawaban;
use App\DetailSiswa;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create(array(
         'nama_user' => "Administrator",
         'username' => "Admin",
         'password' => Hash::make("123@admin"),
         'level' => 'admin',
        ));
        

        Sekolah::create(array(
        	'nama_sekolah' => "SMPN 10 Kota Sukabumi",
        	'kode_sekolah' => 'test123',
        ));

        User::create(array(
            'nama_user' => "Guru BK",
            'username' => "bk1",
            'password' => Hash::make("bk1"),
            'level' => 'bk',
            'id_sekolah' => 1,
            'display_password' => "bk1",
        ));
        User::create(array(
        	'nama_user' => 'Siswa',
        	'username' => 'ts1',
        	'password' => Hash::make('ts1'),
        	'id_sekolah' => 1,
        	'level' => 'siswa',
            'display_password' => 'ts1',
        ));

        // DetailSiswa::create(array(
        //     'id_user' => 3,
        //     'nama' => 'Test Siswa',
        //     'no_telp' => '088888888888',
        //     'tgl_lahir' => '2000-10-14',
        //     'jenis_kelamin' => 'Laki-Laki',
        //     'minat_melanjutkan' => 'Kerja',
        // ));

        
        // Tes Numerik
        $kunci = ['B','B','B','B','A','C','C','C','B','A'];
        for($i = 0;$i<10;$i++){
            KunciJawaban::create(array(
                'type' => 'numerik',
                'nomor' => $i+1,
                'kunci' => $kunci[$i],
            ));
        }


        // Tes Bahasa
        $kunci = ['D','D','C','C','A','A','A','C','D','B'];
        for($i = 0;$i<10;$i++){
            KunciJawaban::create(array(
                'type' => 'bahasa',
                'nomor' => $i+1,
                'kunci' => $kunci[$i],
            ));
        }
        // Tes Logika
        $kunci = ['C','D','B','A','B','C','D','C','C','C'];
        for($i = 0;$i<10;$i++){
            KunciJawaban::create(array(
                'type' => 'logika',
                'nomor' => $i+1,
                'kunci' => $kunci[$i],
            ));
        }

        // Tes Daya Ingat
        $kunci = ['2','6','6','7','2','7','8','5','8','4'];
        for($i = 0;$i<10;$i++){
            KunciJawaban::create(array(
                'type' => 'daya_ingat',
                'nomor' => $i+1,
                'kunci' => $kunci[$i],
            ));
        }
    }
}
