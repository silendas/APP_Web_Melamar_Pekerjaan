<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LokerController extends Controller
{
    public function index(Request $request){

        try{

          $id = $request->cookie('u_id');

          $res = Http::get('http://localhost:1323/api/pelamar/get/id/'. $id ,[
            "headers"=>[
              "Authorization"=>"Bearer".session()->get('token.acces_token')
            ]
          ]);
          $user = $res->json();
  
          $res = Http::get('http://localhost:1323/api/loker/get');
    
          $loker = $res->json();
  
          $res = Http::get('http://localhost:1323/api/cabang/get');
    
          $cabang = $res->json();
  
          return view('Loker', ['user'=> $user, 'loker'=> $loker, 'cabang'=> $cabang]);

        }catch(\Exception $e){
          return $e->getMessage();
        }
  
      }

      public function search(Request $request){

        try{
          $id = $request->cookie('u_id');

          $res = Http::get('http://localhost:1323/api/pelamar/get/id/'. $id ,[
            "headers"=>[
              "Authorization"=>"Bearer".session()->get('token.acces_token')
            ]
          ]);
          $user = $res->json();

          error_log( $request->p_cbng);

          $res = Http::get('http://localhost:1323/api/loker/search/' . $request->p_cbng);
    
          $loker = $res->json();

          $res = Http::get('http://localhost:1323/api/cabang/get');
    
          $cabang = $res->json();

          return view('Loker', ['user'=> $user, 'loker'=> $loker, 'cabang'=> $cabang]);
        }catch(\Exception $e){
          return $e->getMessage();
        }
      }

      public function melamar(Request $request){

        try{

          $id = $request->cookie('u_id');

          $res = Http::get('http://localhost:1323/api/pnddkn/get/' . $id);

          $pnddkn = $res->json();

          $res = Http::get('http://localhost:1323/api/pnglmn/get/' . $id);

          $pnglmn = $res->json();

          $res = Http::get('http://localhost:1323/api/melamar/get/loker/'. $id .'/'. $request->pd_id);

          $cekLoker = $res->json();


          if (is_null($pnddkn)||is_null($pnglmn)) {
            return \Redirect::route('loker')->with('message','Silahkan lengkapi data profile anda terlebih dahulu !!');
          } 

          if(is_null($cekLoker)){
            
            $res = Http::post('http://localhost:1323/api/melamar/post/' . $id. '/' . $request->pd_id);

            return \Redirect::route('loker')->with('message','Berhasil melamar, silahkan cek Histori anda !!');

          } else {
            
            return \Redirect::route('loker')->with('message','Anda sudah melamar loker ini, Silahkan pilih yang lainnya !!');

          }
          
        }catch(\Exception $e){
          return $e->getMessage();
        }

      }
}
