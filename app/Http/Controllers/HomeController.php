<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){
        $image=Image::select()->count();
        $gallery=Gallery::select()->count();
        return view('home',compact('image','gallery'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gallery()
    {
        $gallery= Gallery::select()->get();
        return $gallery;
    }
    public function image()
    {

        $image= Image::select()->get();
        return $image;
    }
}
