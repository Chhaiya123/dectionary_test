<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function setting(){
        if(Auth::user()){
             return view('profile.show');
        }else{
            return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the Profile.',
            ])->onlyInput('email');
        }
        
    }
    public function viewProfile(){
        if(Auth::user()){
             return view('pages.profile');
             
        }else{
            return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the Profile.',
            ])->onlyInput('email');
        }
        
    }
}
