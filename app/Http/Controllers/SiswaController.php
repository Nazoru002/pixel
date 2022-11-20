<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailSiswa;
use Auth;
use Arr;
use Excel;
use Hash;
use App\Imports\PesertaImport;
class SiswaController extends Controller
{
    public function index(){
    	$data = DetailSiswa::where('id_user',Auth::user()->id)->first();
    	if($data){
    	    if($data->nama == null && $data->nama == ""){
    		    return redirect(route('siswa-biodata'));
    	    }
    	    else if($data->jurusan == null && $data->jurusan == ""){
    	        return redirect(route('siswa-biodata-partial'));
    	    }
    	    else{
    	        return view('users.general.index_siswa');
    	    }
    		
    	}
    	else{
    		return redirect(route('siswa-biodata'));
    	}
    }
    public function biodataIndex(){
    	$data = DetailSiswa::where('id_user',Auth::user()->id)->first();
    	if($data && $data->nama != null && $data->nama != "" && $data->jurusan != null && $data->jurusan != ""){
            return redirect(route('siswa-index'));
        }
        else{
    	    return view('users.general.biodata_siswa');
        }
    }
    public function biodataSave(Request $request){
        if($request->get('has_sekolah')){
            
        	$data = $request->validate([
    			"nama" => "required|min:3|max:255",
    			"jenis_kelamin" => "required",
    			"no_telp" => "required|min:7|max:15",
    			"tgl_lahir" => "required",
    			"alamat" => "required|min:15|max:255|",
    			"email" => "email",
    			"facebook" => "",
    			"instagram" => "",
    			"youtube" => "",
    			"cita_cita" => "required",
    			"hobi" => "required",
    			"minat_melanjutkan" => "required",
    			"strength" => "",
    			"weakness" => "",
    			"nama_ayah" => "",
    			"hp_ayah" => "",
    			"job_ayah" => "",
    			"nama_ibu" => "",
    			"hp_ibu" => "",
    			"job_ibu" => ""
        	]);
        }
        else{
        	$data = $request->validate([
    			"nama" => "required|min:3|max:255",
    			"jenis_kelamin" => "required",
    			"no_telp" => "required|min:7|max:15",
    			"tgl_lahir" => "required",
    			'lembaga_sekolah' => 'required',
    			"alamat" => "required|min:15|max:255|",
    			'sub_jurusan' => 'required|numeric|min:0',
    			"email" => "email",
    			"facebook" => "",
    			"instagram" => "",
    			"youtube" => "",
    			"cita_cita" => "required",
    			"hobi" => "required",
    			"minat_melanjutkan" => "required",
    			"kelas" => "required|min:1",
    			"strength" => "",
    			"weakness" => "",
    			"nama_ayah" => "",
    			"hp_ayah" => "",
    			"job_ayah" => "",
    			"nama_ibu" => "",
    			"hp_ibu" => "",
    			"job_ibu" => ""
        	]);
            
        }
    	$inputan = Arr::except($request->input(),['_token','id_detail','has_sekolah']);
    	$data = Arr::add($inputan,'id_user',Auth::user()->id);
    	if($request->get('has_sekolah')){
    	    DetailSiswa::where('id_user',Auth::id())->update($data);
    	}
    	else{
    	    DetailSiswa::create($data);
    	}
    	return redirect(route('siswa-index'))->with('success','Biodata Telah Terisi!');
    }
    
    public function biodataEditIndex(){
    	return view('users.general.biodata_edit');
    }
    public function biodataEditSave(Request $request){
        // dd('dsa');
    	$data = $request->validate([
			"nama" => "required|min:3|max:255",
			"jenis_kelamin" => "required",
			"no_telp" => "required|min:7|max:15",
			"tgl_lahir" => "required",
			"email" => "email",
			"facebook" => "",
			"instagram" => "",
			"youtube" => "",
			"cita_cita" => "required",
			"hobi" => "required",
			"minat_melanjutkan" => "required",
			"strength" => "",
			"weakness" => "",
			"nama_ayah" => "",
			"hp_ayah" => "",
			"job_ayah" => "",
			"nama_ibu" => "",
			"hp_ibu" => "",
			"job_ibu" => ""
    	]);
    	$inputan = Arr::except($request->input(),['_token']);
    	$data = Arr::add($inputan,'id_user',Auth::user()->id);
    	DetailSiswa::where('id_user',Auth::id())->update($data);
    	return redirect(route('siswa-read-biodata'))->with('success','Biodata Telah Diupdate!');
    }
    public function partialbiodataIndex(){
    	return view('users.general.biodata_partial');
    }
    public function partialbiodataSave(Request $request){
    	$data = $request->validate([
    	    'lembaga_sekolah' => 'required',
			"jurusan" => "required",
			'sub_jurusan' => 'required|numeric|min:0',
    	]);
    	DetailSiswa::where('id_user',Auth::id())->update($data);
    	return redirect(route('siswa-index'))->with('success','Biodata Telah Tersimpan!');
    }
    public function readBiodata(){
    	return view('users.general.biodata_read');
    }
    public function settingsPage(){
        return view('users.general.settings');
    }
    public function settings(Request $request){
        $data = $request->validate([
            "password_lama" => "required",
            "password_baru" => "required|min:5|same:password_baru",
            "konfirmasi_password_baru" => "required|min:5|same:password_baru",
        ]);
        $old = $request->get('password_lama');
        $new = $request->get('password_baru');
        $user = Auth::user();
        if($user->display_password == $old){
            $user->password = Hash::make($new);
            $user->display_password = $new;
            $user->save();
            return redirect(route('siswa-index'))->with('success','Password Sudah Dirubah');
        }
        else{
            return redirect(route('siswa-settings'))->with('error','Password lama salah!');
        }
    }
    public function tracker(){
        return view('users.general.tracker');
    }
    public function trackerSave(Request $request){
        $data = $request->validate([
            'tracker_lanjut' => 'required',
            'tracker_nama' => 'required|min:3',
            'tracker_bidang' => 'required|min:3',
        ]);
        $data = DetailSiswa::where('id_user',Auth::id())->first();
        if($data){
            $data->tracker_lanjut = $request->get('tracker_lanjut');
            $data->tracker_nama = $request->get('tracker_nama');
            $data->tracker_bidang = $request->get('tracker_bidang');
            $data->save();
            return redirect(route('siswa-index'))->with('success','Data sudah disimpan');
        }
        else{
            return redirect(route('siswa-tracker'))->with('success','Ada kesalahan pada sistem');
        }
    }
    public function psc(){
        return view('users.general.psc');
    }
}
