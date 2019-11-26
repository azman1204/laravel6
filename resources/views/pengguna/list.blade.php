@extends('master')
@section('content')
<table class="table table-bordered">
    <tr>
        <td>Bil</td>
        <td>Nama</td>
        <td>ID</td>
        <td>Tindakan</td>
    </tr>
    @foreach ($pengguna as $p)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->id_pengguna }}</td>
        <td>
            <a href="/edit-pengguna/{{$p->id}}" class="btn btn-info btn-sm">Kemaskini</a>
            <a href="/hapus-pengguna/{{$p->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Anda Pasti ?')">Hapus</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection