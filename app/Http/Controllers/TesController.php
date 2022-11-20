<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JawabanTesUser;
use Auth;
use Arr;
use App\HasilTes;
use App\KunciJawaban;
class TesController extends Controller
{
    public function numerik(){
    	return view('users.tes.numerik');
    }
    public function numerikTes(){
    	return view('users.tes.numerik_start');
    }
    public function numerikSave(Request $request){
    	$i = 1;
        $nilai = 0;
        $type = "numerik";
    	foreach(Arr::except($request->input(),['_token']) as $key => $value){
    		JawabanTesUser::create(array(
    			'id_user' => Auth::user()->id,
    			'type' => $type,
    			'nomor' => $i,
    			'jawaban' => $value,
    		));
            $kunci = KunciJawaban::where('type',$type)->where('nomor',$i)->first();
            if($kunci){
                if($value == $kunci->kunci){
                    $nilai+=10;
                }
            }
    		$i++;
    	}
        HasilTes::create(array(
            'id_user' => Auth::user()->id,
            'type' => $type,
            'hasil' => $nilai,
        ));
    	return redirect(route('siswa-tes-numerik'))->with('success','Tes telah diselesaikan');
    }
    public function bahasa(){
    	return view('users.tes.bahasa');
    }
    public function bahasaTes(){
    	return view('users.tes.bahasa_start');
    }
    public function bahasaSave(Request $request){
        $i = 1;
        $nilai = 0;
        $type = "bahasa";
        foreach(Arr::except($request->input(),['_token']) as $key => $value){
            JawabanTesUser::create(array(
                'id_user' => Auth::user()->id,
                'type' => $type,
                'nomor' => $i,
                'jawaban' => $value,
            ));
            $kunci = KunciJawaban::where('type',$type)->where('nomor',$i)->first();
            if($kunci){
                if($value == $kunci->kunci){
                    $nilai+=10;
                }
            }
            $i++;
        }
        HasilTes::create(array(
            'id_user' => Auth::user()->id,
            'type' => $type,
            'hasil' => $nilai,
        ));
    	return redirect(route('siswa-tes-bahasa'))->with('success','Tes telah diselesaikan');
    }
    public function logika(){
    	return view('users.tes.logika');
    }
    public function logikaTes(){
    	return view('users.tes.logika_start');
    }
    public function logikaSave(Request $request){
        $i = 1;
        $nilai = 0;
        $type = "logika";
        foreach(Arr::except($request->input(),['_token']) as $key => $value){
            JawabanTesUser::create(array(
                'id_user' => Auth::user()->id,
                'type' => $type,
                'nomor' => $i,
                'jawaban' => $value,
            ));
            $kunci = KunciJawaban::where('type',$type)->where('nomor',$i)->first();
            if($kunci){
                if($value == $kunci->kunci){
                    $nilai+=10;
                }
            }
            $i++;
        }
        HasilTes::create(array(
            'id_user' => Auth::user()->id,
            'type' => $type,
            'hasil' => $nilai,
        ));
    	return redirect(route('siswa-tes-logika'))->with('success','Tes telah diselesaikan');
    }
    public function kepribadian(){
    	return view('users.tes.kepribadian');
    }
    public function kepribadianTes(){
    	return view('users.tes.kepribadian_start');
    }
    public function kepribadianSave(Request $request){
    	$i = 1;
        $nilai = 0;
        $type = "kepribadian";
        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
    	foreach(Arr::except($request->input(),['_token']) as $key => $value){
    		JawabanTesUser::create(array(
    			'id_user' => Auth::user()->id,
    			'type' => 'kepribadian',
    			'nomor' => $i,
    			'jawaban' => $value,
    		));
            switch($value){
                case "A":
                    $a++;
                break;
                case "B":
                    $b++;
                break;
                case "C":
                    $c++;
                break;
                case "D":
                    $d++;
                break;
                default:
                break;
            }
    		$i++;
    	}

        if($a >= $b && $a >= $c && $a >= $d){
            $nilai = 1;
        }
        else if($b > $a && $b > $c && $b >= $d){
            $nilai = 2;
        }
        else if($c >= $a && $c >= $b && $c >= $d){
            $nilai = 3;
        }
        else if($d >= $a && $d >= $b && $d >= $c){
            $nilai = 4;
        }
        else{
            $nilai = 5;
        }
        HasilTes::create(array(
            'id_user' => Auth::user()->id,
            'type' => $type,
            'hasil' => $nilai,
        ));
    	return redirect(route('siswa-tes-kepribadian'))->with('success','Tes telah diselesaikan');
    }
    public function dayaingat(){
    	return view('users.tes.dayaingat');
    }
    public function dayaingatTes(){
    	return view('users.tes.dayaingat_start');
    }
    public function dayaingatSave(Request $request){
        $i = 1;
        $nilai = 0;
        $type = "daya_ingat";
        foreach(Arr::except($request->input(),['_token']) as $key => $value){
            JawabanTesUser::create(array(
                'id_user' => Auth::user()->id,
                'type' => $type,
                'nomor' => $i,
                'jawaban' => $value,
            ));
            $kunci = KunciJawaban::where('type',$type)->where('nomor',$i)->first();
            if($kunci){
                if($value == $kunci->kunci){
                    $nilai+=10;
                }
            }
            $i++;
        }
        HasilTes::create(array(
            'id_user' => Auth::user()->id,
            'type' => $type,
            'hasil' => $nilai,
        ));
    	return redirect(route('siswa-tes-dayaingat'))->with('success','Tes telah diselesaikan');
    }
    public function hasil(){
    	return view('users.tes.hasil');
    }
}
