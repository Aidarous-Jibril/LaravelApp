<?php

namespace App\Http\Controllers; // added this namespace automatically 

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //create a public controller func/methods which returns views.
    //Index contrller
    public function index(){
        $title = 'WELCOME TO LARAVEL!'; 
        return view('pages/index', compact('title')); //title not working, i'll check it
        //return view('pages/index')->with('title', $title); //OPTION2
    }

    //About contrller
    public function about(){
        return view('pages/about');
    }

    //Services contrller
    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web design', 'Programming', 'Selling']
        );
        return view('pages/services')->with($data);
    }
}
