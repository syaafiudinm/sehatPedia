<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $diseases = Disease::orderBy('created_at')->get();

        return view('beranda',[
            'diseases' => $diseases
        ]);
    }
}
