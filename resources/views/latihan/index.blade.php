<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
        }

        .menu {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #2b2d42;
        }

        .menu .list-menu {
            list-style-type: none;
            padding: 10px 20px;
            background-color: #2b2d42;
            border-radius: 20px;
            transition: .4s ease-in-out;
        }

        .menu .list-menu a {
            text-decoration: none;
            color: #fdf0d5;
            text-transform: uppercase;
        }

        .menu .list-menu:hover {
            background-color: #e56b6f;
            transition: .4s ease-in-out;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <h1>Hitung Hitungan Biar Jago Kayak Atmin Suki</h1>
    <ul class="menu">
        <li class="list-menu"><a href="{{ route('penjumlahan') }}">Penjumlahan</a></li>
        <li class="list-menu"><a href="{{ route('pengurangan') }}">Pengurangan</a></li>
        <li class="list-menu"><a href="{{ route('pembagian') }}">Pembagian</a></li>
        <li class="list-menu"><a href="{{ route('perkalian') }}">Perkalian</a></li>
        <li class="list-menu"><a href="{{ route('modulus') }}">Modulus</a></li>
    </ul>
</body>

</html>
