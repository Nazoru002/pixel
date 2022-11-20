<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\User;
use Auth;
use App\Sekolah;
use App\DetailSiswa;
use Hash;
use Maatwebsite\Excel\Concerns\WithStartRow;
// class PesertaImport implements ToModel, WithStartRow
class PesertaImport implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */
    
    public function startRow(): int
    {
        return 2;
    }
    // public function model(array $row)
    // {
    //     // dd($row[2]);
    //     if(Auth::user()->level == 'admin'){
    //         $sekolah = Sekolah::find($row[2]);
    //     	if($sekolah){
    //         	$input = array(
    //         		'nama_user' => $row[1],
    //         		'username' => $row[3],
    //         		'password' => Hash::make($row[4]),
    //         		'display_password' => $row[4],
    //         		'id_sekolah' => $row[2],
    //         		'level' => 'siswa',
    //         	);
    //         	return new User($input);
    //     	}
    //     }
    //     else{
    //         $sekolah = Sekolah::find(Auth::user()->id_sekolah);
    //     	if($sekolah){
    //         	$input = array(
    //         		'nama_user' => $row[1],
    //         		'username' => $row[2],
    //         		'password' => Hash::make($row[3]),
    //         		'display_password' => $row[3],
    //         		'id_sekolah' => Auth::user()->id_sekolah,
    //         		'level' => 'siswa',
    //         	);
    //             return new User($input);
    //     	}
    //     }
    // }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if(Auth::user()->level == 'admin'){
                $sekolah = Sekolah::find($row[2]);
            	if($sekolah){
                	$input = array(
                		'nama_user' => $row[1],
                		'username' => $row[3],
                		'password' => Hash::make($row[4]),
                		'display_password' => $row[4],
                		'id_sekolah' => $row[2],
                		'level' => 'siswa',
                	);
                	$data = User::create($input);
                	$det = DetailSiswa::create(array(
                	    'lembaga_sekolah' => $row[5],
                	    'kelas' => $row[6],
                	    'jurusan' => $row[7],
                	    'sub_jurusan' => $row[8],
                	    'id_user' => $data->id,
                	));
            	}
            }
            else{
                $sekolah = Sekolah::find(Auth::user()->id_sekolah);
            	if($sekolah){
                	$input = array(
                		'nama_user' => $row[1],
                		'username' => $row[2],
                		'password' => Hash::make($row[3]),
                		'display_password' => $row[3],
                		'id_sekolah' => Auth::user()->id_sekolah,
                		'level' => 'siswa',
                	);
                    User::create($input);
            	}
            }
        }
    }
}