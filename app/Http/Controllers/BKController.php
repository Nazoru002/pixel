<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use Excel;
use App\Imports\PesertaImport;
class BKController extends Controller
{
    public function index(){
    	return view('bk.index');
    }
    public function siswa(){
    	return view('bk.siswa.index');
    }
    public function siswaCreate(){
    	return view('bk.siswa.create');
    }
    public function siswaCreateSave(Request $request){
    	$input = array(
    		'nama_user' => $request->get('nama_user'),
    		'username' => $request->get('username'),
    		'password' => Hash::make($request->get('password')),
    		'display_password' => $request->get('password'),
    		'id_sekolah' => $request->get('id_sekolah'),
    		'level' => 'siswa',
    	);

    	if(User::create($input)){
    		return redirect(route('bk-siswa'))->with('success','Data Siswa sudah ditambahkan!');
    	}
    	else{
    		return redirect(route('bk-siswa-create'))->with('Error','Terjadi kesalahan pada server');
    	}
    }
    public function siswaEdit(Request $request,$id){
    	$data = User::find($id);
    	return view('bk.siswa.edit')->with('data',$data);
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
    		return redirect(route('bk-siswa'))->with('success','Data Siswa sudah dirubah!');
    	}
    	else{
    		return redirect(route('bk-siswa-create'))->with('Error','Terjadi kesalahan pada server');
    	}
    }
    public function siswaDelete(Request $request,$id){
    	$data = User::find($id);
    	$data->delete();
    	return redirect(route('bk-siswa'))->with('success','Data siswa sudah dihapus');
    }
    public function siswaDetail(Request $request,$id){
    	$data = User::find($id);
    	return view('bk.siswa.detail')->with('data',$data);
    }
    public function siswaImport(Request $request){
        $path = $request->file('file');
        // dd($path);
        Excel::import(new PesertaImport, $path);
        return redirect(route('bk-siswa'))->with('success', 'Data Siswa sudah di import!');
    }
    public function hasilTesExport(Request $request){
        $path = $request->file('file');
        // dd($path);
        Excel::import(new hasilTesExport, $path);
        return redirect(route('bk-siswa'))->with('success', 'Data Hasil Tes Siswa sudah di import!');
        
        // return Excel::download(new hasilTesExport,'Export Hasil Tes Siswa.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    
    public function settingsPage(){
        return view('bk.settings');
    }
    public function psc(){
        return view('bk.psc');
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
            return redirect(route('bk-settings'))->with('success','Password Sudah Dirubah');
        }
        else{
            return redirect(route('bk-settings'))->with('error','Password lama salah!');
        }
    }
    public function settingsName(Request $request){
        $request->validate([
            'nama_user' => 'required|min:5|max:255' 
        ]);
        $user = Auth::user();
        $user->nama_user = $request->get('nama_user');
        if($user->save()){
            return redirect(route('bk-settings'))->with('success','Nama sudah dirubah');
        }
        else{
            return redirect(route('bk-settings'))->with('error','Terjadi kesalahan pada server');
        }
    }
}
