<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    function index(Request $request){

        $id = $request->cookie('u_id');

        $res = Http::get('http://localhost:1323/api/pelamar/get/id/'. $id ,[
            "headers"=>[
                    "Authorization"=>"Bearer".session()->get('token.acces_token')
                ]
        ]);
        $user = $res->json();

        $res = Http::get('http://localhost:1323/api/test/get/'. $request->r_posisi);

        $test = $res->json();

        $data = array(
            'posisi'=>$request->r_posisi,
            'id_melamar'=>$request->r_idmlmr
        );


        return view('Test', ['test'=>$test, 'user'=>$user])->with($data);
    }

    function nilai(Request $request){
        try{

            error_log($request->score);

            $id = $request->cookie('u_id');
  
            $res = Http::put('http://localhost:1323/api/melamar/nilai/'. $request->id_melamar . '/' . $request->score);
  
            return \Redirect::route('histori')->with('message','Berhasil mengisi Tes !!!');
  
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
