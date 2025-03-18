<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function about() {
    return view('about');
}

public function contact() {
    return view('contact');
}

public function profile() {
    return view('profile');
}

}


