<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistoriController extends Controller
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

          $res = Http::get('http://localhost:1323/api/melamar/get/pelamar/'. $id );

          $melamar = $res->json();

          return view('Histori', ['user'=> $user, 'melamar' => $melamar]);

        }catch(\Exception $e){
          return $e->getMessage();
        }
  
      }

      public function toTest(Request $request){
        try{

          $id = $request->cookie('u_id');

          $res = Http::get('http://localhost:1323/api/pelamar/get/id/'. $id ,[
            "headers"=>[
              "Authorization"=>"Bearer".session()->get('token.acces_token')
            ]
          ]);

          $user = $res->json();

          $res = Http::get('http://localhost:1323/api/test/get/' );          

        }catch(\Exception $e){
          return $e->getMessage();
        }

      }
}
