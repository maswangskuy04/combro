<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SB Admin 2 - Dashboard</title>
    @include('layouts2.inc.css')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layouts2.inc.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts2.inc.navbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts2.inc.footer')
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('layouts2.inc.modal')

    @include('layouts2.inc.js')
</body>

</html>
