<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    @include('layouts.includes.masyarakatcss') 
</head>

<body>
    <!-- Page loader -->
    <div id="preloader"></div>
    <!-- Header -->
    @include('layouts.includes.masyarakatheader')
    <!-- Isi -->
    @yield('container.isi')
    <!-- Footer -->
    @include('layouts.includes.masyarakatfooter')
    <!-- Js -->
    @include('layouts.includes.masyarakatjavascript')
</body>

</html>
