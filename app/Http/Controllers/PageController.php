<?php
namespace App\Http\Controllers;

class PageController extends Controller {
    public function home() {
        // call view resources/views/home/welcome.blade.php
        return view('home.welcome'); 
    }
}