<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function register(Request $request){

        $request->validate(
            [
                'nik'=>'required',
                'nama'=>'required',
                'jk'=>'required',
                'tgl_lhr'=>'required',
                'nohp'=>'required',
                'alamat'=>'required',
                'email'=>'required|email|max:100',
                'pass'=>'required|min:6|max:20',
            ]
          );

        $res = Http::post('http://localhost:1323/api/pelamar/post/'. $request->nik .'/'. $request->nama .'/'. $request->jk .'/'. $request->tgl_lhr .'/'. $request->nohp .'/'. $request->alamat .'/'. $request->email .'/'. $request->pass);

      }

      public function login(Request $request){

        $res = Http::get('http://localhost:1323/api/pelamar/login/'. $request->email_l .'/'. $request->password_l,[
          "headers"=>[
            "Authorization"=>"Bearer".session()->get('token.acces_token')
          ]
        ]);

        if(is_null($res->json())){
          
          error_log('err');

          return redirect()->back()->with('errormessage','Username atau Password salah !!!');

        }else{

          $user = $res->json();
          error_log('success');

          $minutes = 180;
          foreach($user as $user){
            $id = $user['id_pelamar'];
          };

          return \Redirect::route('profile')->cookie('u_id', $id, $minutes);

        };

      }

      public function logout(Request $request){
        return \Redirect::route('welcome')->cookie('u_id', '', -3600);
      }
}
