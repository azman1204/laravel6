<form action="/login" method="post">
    @csrf
    {{ session('err') }}
    <input type="text" name="id_pengguna" placeholder="Id pengguna">
    <br>
    <input type="text" name="password">
    <br>
    <input type="submit" value="Log Masuk">
</form>