@extends('master')
@section('content')
<legend>Daftar Pengguna</legend>
<form action="/daftar-pengguna" method="post">
    <input type="hidden" name="id" value="{{ old('id', $pengguna->id) }}">
    @csrf
    <div class="row">
        <div class="col col-md-12">Nama</div>
    <div class="col col-md-12"><input name="nama" value="{{ old('nama', $pengguna->nama) }}" type="text" class="form-control"></div>
    </div>
    <div class="row">
        <div class="col col-md-12">ID Pengguna</div>
    <div class="col col-md-12"><input name="id_pengguna" value="{{ old('id_pengguna', $pengguna->id_pengguna) }}" type="text" class="form-control"></div>
    </div>
    <div class="row">
        <div class="col col-md-12">Katalaluan</div>
        <div class="col col-md-12"><input name="password" value="999999" type="password" class="form-control"></div>
    </div>
    <div class="row mt-2">
        <div class="col col-md-12"></div>
        <div class="col col-md-12"><input type="submit" class="btn btn-primary" value="Simpan"></div>
    </div>
</form>
@endsection