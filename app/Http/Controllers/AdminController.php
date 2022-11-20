<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use Excel;
use App\{User, Sekolah, DetailSiswa};
use App\Exports\{SiswaExport, SiswaExport2, hasilTesExport, hasilTesExportPerSekolah, SekolahExport};
use App\Imports\PesertaImport;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.index');
    }
    public function siswaIndex(){
    	return view('admin.siswa.index');
    }
    public function siswaCreate(){
    	return view('admin.siswa.create');
    }
    public function siswaCreateSave(Request $request){
        $getUsername = User::where('username', $request->get('username'))->get()->toArray();
        
        if(!$getUsername){
            $input = array(
        		'nama_user'         => $request->get('nama_user'),
        		'username'          => $request->get('username'),
        		'password'          => Hash::make($request->get('password')),
        		'display_password'  => $request->get('password'),
        		'id_sekolah'        => $request->get('id_sekolah'),
        		'level'             => 'siswa',
        	);
        	$data = User::create($input);
        	if($data){
            	$det = DetailSiswa::create(array(
            	    'lembaga_sekolah'   => $request->get('lembaga_sekolah'),
            	    'kelas'             => $request->get('kelas'),
            	    'jurusan'           => $request->get('jurusan'),
            	    'sub_jurusan'       => $request->get('sub_jurusan'),
            	    'id_user'           => $data->id,
            	));
        		return redirect(route('admin-siswa'))->with('success','Data Siswa sudah ditambahkan!');
        	}
        	else{
        		return redirect(route('admin-siswa-create'))->with('Error','Terjadi kesalahan pada server');
        	}
        }else{
            return redirect(route('admin-siswa-create'))->with('Error','Username telah digunakan');
        }
    	
    }
    public function siswaEdit(Request $request,$id){
    	$data = User::find($id);
    	return view('admin.siswa.edit')->with('data',$data);
    }
    public function siswaEditSave(Request $request,$id){
    	$data = User::find($id);
    	$input = array(
    		'nama_user' => $request->get('nama_user'),
    		'username' => $request->get('username'),
    		'password' => Hash::make($request->get('password')),
    		'display_password' => $request->get('password'),
    		'id_sekolah' => $request->get('id_sekolah'),
    		'level' => 'siswa',
    	);

    	if($data->update($input)){
    		return redirect(route('admin-siswa'))->with('success','Data Siswa sudah dirubah!');
    	}
    	else{
    		return redirect(route('admin-siswa-create'))->with('Error','Terjadi kesalahan pada server');
    	}
    }
    public function siswaDelete(Request $request,$id){
    	$data = User::find($id);
    	$data->delete();
    	return redirect(route('admin-siswa'))->with('success','Data siswa sudah dihapus');
    }
    public function siswaDetail(Request $request,$id){
    	$data = User::find($id);
    	return view('admin.siswa.detail')->with('data',$data);
    }
    public function siswaExport(Request $request){
        return Excel::download(new SiswaExport,'Export Data Siswa.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function siswaExport2(Request $request){
        return Excel::download(new SiswaExport2,'Export Username Siswa.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function hasilTesExport(Request $request){
        return Excel::download(new hasilTesExport,'Export Hasil Tes Siswa.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function hasilTesExportPerSekolah(Request $request, $id){
        session()->put('sekolah_id', $id);
        return Excel::download(new hasilTesExportPerSekolah,'Export-Hasil-Tes-Siswa.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function SekolahExport(Request $request){
        return Excel::download(new SekolahExport,'Export Sekolah.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function sekolahIndex(){
    	return view('admin.sekolah.index');
    }
    public function sekolahCreate(){
    	return view('admin.sekolah.create');
    }
    public function sekolahCreateSave(Request $request){
    	$input_sekolah = array(
    		'nama_sekolah' => $request->get('nama_sekolah'),
    		'kode_sekolah' => $request->get('kode_sekolah'),
    	);
    	$sekolah = Sekolah::create($input_sekolah);
    	if($sekolah){
	    	$input_bk = array(
	    		'nama_user' => $request->get('nama_user'),
	    		'username' => $request->get('username'),
	    		'password' => Hash::make($request->get('password')),
	    		'display_password' => $request->get('password'),
	    		'level' => 'bk',
	    		'id_sekolah' => $sekolah->id,
	    	);
	    	if(User::create($input_bk)){
    			return redirect(route('admin-sekolah'))->with('success','Data Sekolah sudah ditambahkan!');
	    	}
	    	else{
	    		return redirect(route('admin-sekolah-create'))->with('Error','Terjadi kesalahan pada server');
	    	}
    	}
    	else{
    		return redirect(route('admin-sekolah-create'))->with('Error','Terjadi kesalahan pada server');
    	}
    }
    public function sekolahEdit(Request $request,$id){
    	$data = Sekolah::query()->with('rbk')->where('id',$id)->first();
    	return view('admin.sekolah.edit')->with('data',$data);
    }
    public function sekolahEditSave(Request $request,$id){
    	$input_sekolah = array(
    		'nama_sekolah' => $request->get('nama_sekolah'),
    		'kode_sekolah' => $request->get('kode_sekolah'),
    	);
    	$sekolah = Sekolah::find($id);
    	if($sekolah->update($input_sekolah)){
	    	$input_bk = array(
	    		'nama_user' => $request->get('nama_user'),
	    		'username' => $request->get('username'),
	    		'password' => Hash::make($request->get('password')),
	    		'display_password' => $request->get('password'),
	    		'level' => 'bk',
	    		'id_sekolah' => $sekolah->id,
	    	);
	    	$bk = User::where('id_sekolah',$sekolah->id)->where('level','bk')->first();
	    	if($bk->update($input_bk)){
    			return redirect(route('admin-sekolah'))->with('success','Data Sekolah sudah diupdate!');
	    	}
	    	else{
	    		return redirect(route('admin-sekolah'))->with('Error','Terjadi kesalahan pada server');
	    	}
    	}
    	else{
    		return redirect(route('admin-sekolah'))->with('Error','Terjadi kesalahan pada server');
    	}
    }
    public function sekolahDelete(Request $request,$id){
    	$data = Sekolah::find($id);
    	User::where('id_sekolah',$data->id)->delete();
    	$data->delete();
    	return redirect(route('admin-sekolah'))->with('success','Data sekolah sudah dihapus');
    }
    public function sekolahDetail(Request $request,$id){
    	$data = Sekolah::query()->with('rsiswaAll')->with('rbk')->where('id',$id)->first();
    	return view('admin.sekolah.detail')->with('data',$data);
    }
    
    public function importSiswa(Request $request){
        $path = $request->file('file');
        Excel::import(new PesertaImport, $path);
        return redirect(route('admin-siswa'))->with('success', 'Data Siswa sudah di import!');
    }
    
    public function settingsPage(){
        return view('admin.settings');
    }
    public function psc(){
        return view('admin.psc');
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
            return redirect(route('admin-settings'))->with('success','Password Sudah Dirubah');
        }
        else{
            return redirect(route('admin-settings'))->with('error','Password lama salah!');
        }
    }
}
