<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;


class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }
    public function index(){
        $titel = 'Welcome to Laravel!';
        return view('pages.index', compact('title'));
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){ 
        $data = array(
            'title' => 'services',
            'which' => ['Web Developing', 'Seo']
        );
        return view('pages.services')->with($data);
    }
    
}
