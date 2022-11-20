<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\User;
use App\HasilTes;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Auth;
class hasilTesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = array();
        $rawData = array();
        
        if(Auth::user()->level == "admin"){
            $rawData = User::where('level','siswa')->with('rdetsis')->with('rsekolah')->get()->toArray();
        }else{
            $rawData = User::where('level','siswa')->where('id_sekolah',Auth::user()->id_sekolah)->with('rdetsis')->with('rsekolah')->get()->toArray();
        }

        foreach($rawData as $raw){
        	if(!isset($raw['rdetsis'])){
        		continue;
        	}
        	
            $counter = HasilTes::where('id_user',$raw['id'])->get()->toArray();
            if(count($counter) >= 5){
                $inputan = array(
                    'Nama Siswa'    => $raw['nama_user'],
                    'Jenis Kelamin' => $raw['rdetsis']['jenis_kelamin'],
                    'Kelas'         => $raw['rdetsis']['kelas'],
                    'Jurusan'       => $raw['rdetsis']['jurusan'],
                    'Sub Jurusan'   => $raw['rdetsis']['sub_jurusan'],
                    'Nomor HP'      => $raw['rdetsis']['no_telp'],
                    'Asal Sekolah'  => $raw['rsekolah']['nama_sekolah']
                );
                array_push($data, $inputan);
            }
        }
        
        return collect($data);
    }

    public function getHasil($user_id, $type){
        $getHasil = HasilTes::select("hasil")->where("id_user", $user_id)->where("type", $type)->get();
        
        if(!$getHasil){
            return 'Belum mengerjakan';
        }else{
            foreach($getHasil as $gh){
                return $gh->hasil;
            }
        }
    }
    
    public function getPredikat($id_user){
        $hkepribadian = HasilTes::where('id_user', $id_user)->where('type','kepribadian')->first();
        $nkepribadian = 0;
        
    	if($hkepribadian){
            $nkepribadian = (int) $hkepribadian->hasil;
        }
        
        // $predikat = ['0','S','C','D','I','0'];
        $title = ['NONE','STEADINESS (KEMANTAPAN)','COMPLIANCE (ADAPTIF)','DOMINANCE (MENDOMINASI)','INFLUENCE (BERPENGARUH)','ERROR'];
        $kepribadian_index = $nkepribadian;
        return $title[$kepribadian_index];
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Jenis Kelamin',
            'Kelas',
            'Jurusan',
            'Sub Jurusan',
            'Nomor HP',
            'Asal Sekolah'
        ];
    }
}
