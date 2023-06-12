<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
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

          if (is_null($id)) {
            $id = 0;
          }

          $res = Http::get('http://localhost:1323/api/pnddkn/get/' . $id);

          $pnddkn = $res->json();

          $res = Http::get('http://localhost:1323/api/pnglmn/get/' . $id);

          $pnglmn = $res->json();

          return view('Profile',['user' => $user, 'pendidikan'=> $pnddkn, 'pengalaman'=> $pnglmn]);
          
        }catch(\Exception $e){
          return $e->getMessage();
        }
  
      }

      public function perbarui(Request $request){
        try{
    
            $id = $request->cookie('u_id');
    
            $res = Http::put('http://localhost:1323/api/pelamar/put/'. $id . '/' . $request->p_nik . '/' . $request->p_nama .'/' . $request->p_jk .'/' . $request->p_tgl_lhr .'/' . $request->p_nohp .'/' . $request->p_alamat .'/' . $request->p_email .'/' . $request->p_pass );
    
            return \Redirect::route('profile')->with('message','Data Berhasil Diperbaharui !!!');
    
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function tambahPendidikan(Request $request){
        try{
  
            $id = $request->cookie('u_id');

            $res = Http::post('http://localhost:1323/api/pnddkn/post',[
                'id_pelamar' => $id,
			    'sekolah' => $request->p_sklh,
			    'jurusan' => $request->p_jrsn,
			    'nilai' => $request->p_nilai,
			    'thn_lulus' => $request->p_tgl_lls,
            ]);

            return \Redirect::route('profile')->with('message','Data Berhasil Ditambahkan !!!');

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function tambahPengalaman(Request $request){
        try{
  
            $id = $request->cookie('u_id');

            $res = Http::post('http://localhost:1323/api/pnglmn/post/'. $id . "/" . $request->p_prshaan . "/" . $request->p_pssi . "/" . $request->p_fd. "/" . $request->p_ld . "/" . $request->p_desk);

            return \Redirect::route('profile')->with('message','Data Berhasil Ditambahkan !!!');

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function ubahPendidikan(Request $request){
      try{

          $id = $request->cookie('u_id');

          $res = Http::put('http://localhost:1323/api/pnddkn/put/' . $request->pe_id, [
            'sekolah' => $request->pe_sklh,
            'jurusan' => $request->pe_jrsn,
            'nilai' => $request->pe_nilai,
            'thn_lulus' => $request->pe_tgl_lls,
        ]);

          return \Redirect::route('profile')->with('message','Data Berhasil Diubah !!!');

      }catch(\Exception $e){
          return $e->getMessage();
      }
  }

  public function ubahPengalaman(Request $request){
    try{

        $id = $request->cookie('u_id');

        $res = Http::put('http://localhost:1323/api/pnglmn/put/'. $request->pe_id  . "/" . $request->pe_prshaan . "/" . $request->pe_pssi . "/" . $request->pe_fd . "/" . $request->pe_ld ."/" . $request->pe_desk);

        return \Redirect::route('profile')->with('message','Data Berhasil Diubah !!!');

    }catch(\Exception $e){
        return $e->getMessage();
    }
}

  public function hapusPendidikan(Request $request){
    try{

        $id = $request->cookie('u_id');

        $res = Http::delete('http://localhost:1323/api/pnddkn/delete/'. $request->pd_id);

        return \Redirect::route('profile')->with('message','Data Berhasil Dihapus !!!');

    }catch(\Exception $e){
        return $e->getMessage();
    }
}

public function hapusPengalaman(Request $request){
    try{

        $id = $request->cookie('u_id');

        $res = Http::delete('http://localhost:1323/api/pnglmn/delete/'. $request->pd_id);

        return \Redirect::route('profile')->with('message','Data Berhasil Dihapus !!!');

    }catch(\Exception $e){
        return $e->getMessage();
    }
}
    
}
