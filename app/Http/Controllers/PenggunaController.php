<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller {
    // show back the original data to edit
    public function edit($id) {
        $pengguna = Pengguna::find($id);
        return view('pengguna.form', ['pengguna' => $pengguna]);
    }

    public function hapus($id) {
        Pengguna::find($id)->delete(); // find() - cari by primary key, retun an object
        return redirect()->back();
    }

    // list pengguna
    public function senarai() {
        // $pengguna = Pengguna::all(); // return all data dlm bentuk array of obj Pengguna
        $pengguna = Pengguna::orderBy('nama')->get(); // return all data dlm bentuk array of obj Pengguna
        return view('pengguna.list', ['pengguna' => $pengguna]);
    }

    public function daftar() {
        // resources/views/pengguna/form.blade.php
        $pengguna = new Pengguna();
        return view('pengguna.form', ['pengguna' => $pengguna]); 
    }

    // read all data from form, and save to pengguna table
    public function save(Request $req) {
        //dd($req->all()); // dump die
        $id = $req->id;

        if (empty($id)) {
            // insert
            $pengguna = new Pengguna(); // insert
        } else {
            // update
            $pengguna = Pengguna::find($id);
        }
        
        $pengguna->nama = $req->nama;
        $pengguna->id_pengguna = $req->id_pengguna;
        $pengguna->password = $req->password;
        $pengguna->save();
        return redirect('/senarai-pengguna');
    }
}