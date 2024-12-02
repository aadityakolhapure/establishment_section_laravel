<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hodController extends Controller
{
    public function dashboard(){
        return view('hod.dashboard');
      }
}
