<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function word(){
        if(Auth::user()) {
            $data_word = Word::paginate(12);
            $search = null;
            return view('pages.word', compact('data_word','search'));
        } else {
            return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }
    }
    public function search(Request $request){
        if(Auth::user()) {
            $search = $request->input('search');
        
            $filter_word = Word::where('word', 'like', '%' . $search . '%')
                ->orwhere('word_km', 'like', '%' . $search . '%')
                ->orwhere('word_en', 'like', '%' . $search . '%')
                ->get();
            if($search == ''){
                $search == null;
                return redirect()->route('word')->with(compact('filter_word','search'));
            }
            return view('pages.word', compact('filter_word','search'));
        } else {
            return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }

    }
}
