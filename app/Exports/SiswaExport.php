<?php

namespace App\Exports;

use App\User;
use App\DetailSiswa;
use App\Sekolah;
use PhpOffice\PhpSpreadsheet\Shared\Date;
// use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\WithEvents;
// use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Auth;
use Carbon\Carbon;
use App\HasilTes;
class SiswaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    // public function map($map): array
    // {
    //     return [
    //         $invoice->invoice_number,
    //         Date::dateTimeToExcel(Date::dateTimeToExcel(Carbon::parse($raw->rdetsis->updated_at)->format('d-m-Y H:i:s'))),
    //         $invoice->total
    //     ];
    // }
    
    public function columnFormats(): array
    {
        return [
            'AF' => NumberFormat::FORMAT_DATE_DDMMYYYY
        ];
    }
    
    public function collection()
    {
        $data = array();
        $rawData = array();
        if(Auth::user()->level == "admin"){
            $rawData = User::withTrashed()->where('level','siswa')->with('rsekolah')->with('rdetsis')->get()->toArray();
        }else{
            $rawData = User::withTrashed()->where('level','siswa')->where('id_sekolah',Auth::user()->id_sekolah)->with('rdetsis')->with('rsekolah')->get()->toArray();
        }
        
        // RAW Query untuk ORDER BY dari tabel detail_siswa updated_at 
        foreach($rawData as $raw){
        	if(!isset($raw['rdetsis']['nama'])){
        		continue;
        	}
        	
        	$tes = "Belum Selesai";
        	
            $counter = HasilTes::where('id_user',$raw['id'])->count();
            if($counter >= 5){
                $tes = "Sudah Selesai";
            }
            
            $inputan = array(
                'ID'                        => $raw['id'],
                'Asal Sekolah'              => $raw['rsekolah']['nama_sekolah'],
	            'Nama Siswa'                => $raw['rdetsis']['nama'],
                'Pengerjaan Tes'            => $tes,
	            'Tanggal Lahir'             => $raw['rdetsis']['tgl_lahir'],
	            'Jenis Kelamin'             => $raw['rdetsis']['jenis_kelamin'],
	            'Username'                  => $raw['username'],
	            'Password'                  => $raw['display_password'],
	            'Kelas'                     => $raw['rdetsis']['kelas'],
	            'Jurusan'                   => $raw['rdetsis']['jurusan'],
	            'Sub Jurusan'               => $raw['rdetsis']['sub_jurusan'],
	            'Nomor HP'                  => $raw['rdetsis']['no_telp'],
	            'Alamat'                    => $raw['rdetsis']['alamat'],
	            'Akun Facebook'             => $raw['rdetsis']['facebook'],
	            'Akun Instagram'            => $raw['rdetsis']['instagram'],
	            'Channel Youtube'           => $raw['rdetsis']['youtube'],
	            'Alamat Email'              => $raw['rdetsis']['email'],
	            'Cita-Cita'                 => $raw['rdetsis']['cita_cita'],
	            'Hobi'                      => $raw['rdetsis']['hobi'],
	            'Minat Melanjutkan'         => $raw['rdetsis']['minat_melanjutkan'],
	            'Kelebihan Diri'            => $raw['rdetsis']['strength'],
	            'Kekurangan Diri'           => $raw['rdetsis']['weakness'],
	            'Nama Ayah'                 => $raw['rdetsis']['nama_ayah'],
	            'Nomor HP Ayah'             => $raw['rdetsis']['hp_ayah'],
	            'Pekerjaan Ayah'            => $raw['rdetsis']['job_ayah'],
	            'Nama Ibu'                  => $raw['rdetsis']['nama_ibu'],
	            'Nomor HP Ibu'              => $raw['rdetsis']['hp_ibu'],
	            'Pekerjaan Ibu'             => $raw['rdetsis']['job_ibu'],
	            'Melanjutkan Setelah Lulus' => $raw['rdetsis']['tracker_lanjut'],
                'Universitas/Perusahaan'    => $raw['rdetsis']['tracker_nama'],
                'Program Studi/Jabatan'     => $raw['rdetsis']['tracker_bidang'],
                'Tanggal Pengisian'         => Carbon::parse($raw['rdetsis']['updated_at'])->format('d-m-Y H:i:s'),
            );
            array_push($data, $inputan);
        }
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Asal Sekolah',
            'Nama Siswa',
            'Pengerjaan Tes',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Username',
            'Password',
            'Kelas',
            'Jurusan',
            'Sub Jurusan',
            'Nomor HP',
            'Alamat',
            'Akun Facebook',
            'Akun Instagram',
            'Channel Youtube',
            'Alamat Email',
            'Cita-Cita',
            'Hobi',
            'Minat Melanjutkan Pendidikan',
            'Kelebihan Diri',
            'Kekurangan Diri',
            'Nama Ayah',
            'Nomor HP Ayah',
            'Pekerjaan Ayah',
            'Nama Ibu',
            'Nomor HP Ibu',
            'Pekerjaan Ibu',
            'Melanjutkan Setelah Lulus',
            'Universitas/Perusahaan',
            'Program Studi/Jabatan',
            'Tanggal Pengisian',
        ];
    }
}
