<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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

    // list dan carian pengguna
    public function senarai(Request $req) {
        // $pengguna = Pengguna::all(); // return all data dlm bentuk array of obj Pengguna
        if(! empty($req->nama)) {
            // user buat carian
            $nama = $req->nama;
            $pengguna = Pengguna::where('nama', 'LIKE', "%$nama%")->orderBy('nama')->paginate(3);
        } else {
            // tidak buat carian
            $nama = '';
            $pengguna = Pengguna::orderBy('nama')->paginate(3); // return all data dlm bentuk array of obj Pengguna
        }
        
        return view('pengguna.list', ['pengguna' => $pengguna, 'nama' => $nama]);
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

        // jangan update password kalau password tidak dikemaskini
        if ($req->password === '999999') {
            // tidak kemaskini password. jangan buat apa-apa
        } else {
            // kemaskini password
            $pengguna->password = Hash::make($req->password);
        }      

        //validation
        $data = $req->all(); // return an array of form submitted data
        $rules = ['nama' => 'required|min:5', 'id_pengguna' => 'required', 'password' => 'confirmed'];
        $msg = [
            'nama.required' => 'Nama wajib diisi', 
            'nama.min' => 'Nama mesti lebih dari 5 karakter'
        ];
        $v = Validator::make($data, $rules, $msg);
        if (! $v->fails()) {
            // validation ok
            $pengguna->save();
            return redirect('/senarai-pengguna');
        } else {
            // validation failed
            return redirect('/daftar-pengguna')->withInput()->withErrors($v);
        }
    }
}