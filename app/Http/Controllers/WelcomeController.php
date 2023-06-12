<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    public function index(){
        $res = Http::get('http://localhost:1323/api/loker/get/random');
  
        $loker = $res->json();
  
        return view('Welcome', ['loker' => $loker]);
  
      }

}
