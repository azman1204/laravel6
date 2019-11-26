@extends('master')
@section('content')

<a href="/daftar-pengguna" class="btn btn-primary mb-1">Daftar Pengguna</a>

<form method="post" action="/senarai-pengguna" class="mb-2">
    @csrf
    <div class="row">
        <div class="col-md-1">Nama</div>
        <div class="col-md-5"><input type="text" name="nama" class="form-control"></div>
        <div class="col-md-1"><input type="submit" class="btn btn-primary" value="Cari"></div>
    </div>
</form>
Jumpa {{ $pengguna->total() }} rekod
<table class="table table-bordered">
    <tr>
        <td>Bil</td>
        <td>Nama</td>
        <td>ID</td>
        <td>Tindakan</td>
    </tr>
    @php $no = $pengguna->firstItem() @endphp
    @foreach ($pengguna as $p)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->id_pengguna }}</td>
        <td>
            <a href="/edit-pengguna/{{$p->id}}" class="btn btn-info btn-sm">Kemaskini</a>
            <a href="/hapus-pengguna/{{$p->id}}" class="btn btn-danger btn-sm"
                onclick="return confirm('Anda Pasti ?')">Hapus</a>
        </td>
    </tr>
    @endforeach
</table>

{{ $pengguna->appends(['nama' => $nama])->links() }}
@endsection