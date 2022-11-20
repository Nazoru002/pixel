<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\User;
use App\DetailSiswa;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Auth;
class SiswaExport2 implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = array();
        $rawData = array();
        if(Auth::user()->level == "admin"){
            $rawData = User::withTrashed()->where('level','siswa')->with('rdetsis')->with('rsekolah')->get();
        }
        else{
            $rawData = User::withTrashed()->where('level','siswa')->where('id_sekolah',Auth::user()->id_sekolah)->with('rdetsis')->with('rsekolah')->get();
        }
        foreach($rawData as $raw){
        	if(!isset($raw->rsekolah)){
        		continue;
        	}
            $inputan = array(
                'ID' => $raw->id,
	            'Nama Siswa' => $raw->nama_user,
	            'Username' => $raw->username,
	            'Password' => $raw->display_password,
	            'Asal Sekolah' => $raw->rsekolah->nama_sekolah,
            );
            array_push($data, $inputan);
        }
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Siswa',
            'Username',
            'Password',
            'Asal Sekolah',
        ];
    }
}
