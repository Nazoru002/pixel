<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\User;
use App\HasilTes;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class hasilTesExportPerSekolah implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = array();
        $rawData = array();
        
        $rawData = User::where('level','siswa')->where('id_sekolah',Session::get('sekolah_id'))->with('rdetsis')->with('rsekolah')->get()->toArray();
        
        foreach($rawData as $raw){
        	if(!isset($raw['rdetsis'])){
        		continue;
        	}
        	
        	$dataTes = $this->getHasil($raw['id']);
        	if($dataTes){
        	    if(isset($dataTes['numerik']) && isset($dataTes['bahasa']) && isset($dataTes['logika']) && isset($dataTes['daya_ingat']) && isset($dataTes['kepribadian'])){
        	        $inputan = array(
                        'Nama Siswa'    => $raw['nama_user'],
                        'Kelas'         => $raw['rdetsis']['kelas'],
                        'Sub Jurusan'   => $raw['rdetsis']['sub_jurusan'],
                        'Jurusan'       => $raw['rdetsis']['jurusan'],
                        'Jenis Kelamin' => $raw['rdetsis']['jenis_kelamin'],
                        'Asal Sekolah'  => $raw['rsekolah']['nama_sekolah'],
                        'numerik' => $dataTes['numerik'],
                        'bahasa' => $dataTes['bahasa'],
                        'logika' => $dataTes['logika'],
                        'daya_ingat' => $dataTes['daya_ingat'],
                        'kepribadian' => $dataTes['kepribadian'],
                        'Predikat Kepribadian'      => $this->getPredikat($raw['id'])
                    );
                    array_push($data, $inputan);
        	    }
        	}
            
        }
        
        Session::forget('sekolah_id');
        return collect($data);
    }

    public function getHasil($user_id){
        $data = [];
        $getHasil = HasilTes::where("id_user", $user_id)->groupBy("type")->get();
        
        if(!$getHasil){
            return 'Belum mengerjakan';
        }else{
            foreach($getHasil as $gh){
                if($gh->type == 'numerik'){
                    $data['numerik'] = $gh->hasil;
                }elseif($gh->type == 'bahasa'){
                    $data['bahasa'] = $gh->hasil;
                }elseif($gh->type == 'logika'){
                    $data['logika'] = $gh->hasil;
                }elseif($gh->type == 'daya_ingat'){
                    $data['daya_ingat'] = $gh->hasil;
                }elseif($gh->type == 'kepribadian'){
                    $data['kepribadian'] = $gh->hasil;
                }else{
                    $data = null;
                    break;
                }
            }
            
            return $data;
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
            'Kelas',
            'Sub Jurusan',
            'Jurusan',
            'Jenis Kelamin',
            'Asal Sekolah',
            'Numerik',
            'Bahasa',
            'Logika',
            'Daya Ingat',
            'Kepribadian',
            'Predikat Kepribadian'
        ];
    }
}
