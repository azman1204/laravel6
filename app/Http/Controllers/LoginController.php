<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller {
    // authenticate a user
    public function auth(Request $req) {
       if (Auth::attempt([
           'id_pengguna' => $req->id_pengguna, 
           'password' => $req->password])) {
            return redirect('senarai-pengguna');
       } else {
           // with() -> simpan simpan data dlm session
           return redirect()->back()->with('err', 'Login tidak berjaya');
       }
    }

    public function login() {
        return view('login.form');
    }
}