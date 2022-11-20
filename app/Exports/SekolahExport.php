<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\User;
use App\DetailSiswa;
use App\Sekolah;
use App\HasilTes;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SekolahExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datas = array();
        $data = Sekolah::All();
        
        foreach($data as $d){
            $siswa = User::where('level','siswa')->where('id_sekolah',$d->id)->pluck('id')->toArray();
            $count = 0;
            foreach($d->rsiswaAll as $s){
              $counter = HasilTes::where('id_user',$s->id)->count();
              if($counter >= 5){
                $count++;
              }
            }
            $detsis = DetailSiswa::whereIn('id_user', $siswa)->whereNotNull('nama')->count();
            
            $inputan = array(
                'Nama Sekolah'    => $d->nama_sekolah,
                'Jumlah Akun'         => $d->rsiswaAll()->count(),
                'Jumlah Biodata' => $detsis,
                'Jumlah Tes Selesai'  => $count
            );
            array_push($datas, $inputan);
        }        
        return collect($datas);
    }

    public function headings(): array
    {
        return [
            'Nama Sekolah',
            'Jumlah Akun',
            'Jumlah Biodata',
            'Jumlah Tes Selesai'
        ];
    }
}
