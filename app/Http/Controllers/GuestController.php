<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use Auth;
use Arr;
class GuestController extends Controller
{
    public function index(){
    	if(session()->has('id_sekolah')){
    		return redirect('landing');
    	}
    	else{
    		return view('users.welcome');
    	}
    }
    public function loginToken(Request $request){
    	$kode = $request->get('kode_sekolah');
    	$data = Sekolah::where('kode_sekolah',$kode)->first();
    	if($data){
    		session()->put('id_sekolah',$data->id);
    		return redirect('landing');
    	}
    	else{
    		return redirect('/')->with('error','Kode Tidak Valid!');
    	}
    }
    public function landing(){
    	if(session()->has('id_sekolah')){
    		return view('users.landing');
    	}
    	else{
    		return redirect('/')->with('error',"Verifikasi kode terlebih dahulu!");
    	}
    }
    public function loginUser(){
    	if(session()->has('id_sekolah')){
    		return view('users.login');
    	}
    	else{
    		return redirect('/')->with('error','Verifikasi kode terlebih dahulu!');
    	}
    }
    public function doLoginUser(Request $request){
    	$data = $request->only(['username','password']);
    	$data = Arr::add($data,'id_sekolah',session()->get('id_sekolah'));
    	if(Auth::attempt($data)){
    		if(Auth::user()->level == "siswa"){
    			return redirect(route('siswa-index'));
    		}
    		else{
    			return redirect(route('bk-index'));
    		}
    	}
    	else{
    		return redirect(route('user-login'))->with('error','Username/Password tidak valid');
    	}
    }
    public function logout(){
    	Auth::logout();
    	session()->flush();
    	return redirect('/');
    }
    public function adminLogin(){
        return view('admin.login');
    }
    public function adminDoLogin(Request $request){
        $data = $request->only(['username','password']);
        if(Auth::attempt($data)){
            if(Auth::user()->level == "admin"){
                return redirect(route('admin-index'));
            }
            else{
                return redirect('logout');
            }
        }
        else{
            return redirect(route('admin-login'))->with('error','Username/Password tidak valid');
        }
    }
}
