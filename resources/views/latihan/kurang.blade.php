<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Pengurangan</h1>
    <form action="{{ route('store_pengurangan') }}" method="post">
        @csrf
        <label for="">Angka 1</label>
        <input type="number" placeholder="masukan angka 1" name="angka1">
        <br><br>
        <label for="">Angka 2</label>
        <input type="number" placeholder="masukan angka 2" name="angka2">
        <br><br><br>
        <input type="submit" value="Hitung">
    </form>

    <h2 class="text-center">Totalnya Bro : {{ $jumlah }}</h2>
</body>
</html>
