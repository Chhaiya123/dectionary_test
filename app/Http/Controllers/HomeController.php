<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::user()){
            $data = Word::all();
            // dd($data);
            return view('pages.word', compact('data'));
        }else{
            return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the Profile.',
            ])->onlyInput('email');
        }
        
    }
    public function word(){
        if(Auth::user()){
            $data_word = Word::paginate(12);
            // dd($data);
            return view('pages.word', compact('data_word'));
        }else{
            return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the Profile.',
            ])->onlyInput('email');
        }
    }
}
