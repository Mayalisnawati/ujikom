<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Violet | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('bahan/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('bahan/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('bahan/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('bahan/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('bahan/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('bahan/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('bahan/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!-- Search model -->
    <!-- Search model end -->

    <!-- Header Section Begin -->
    @include('frontend.components.navbar')
    <!-- Header Info Begin -->
    <!-- Header Info End -->
    <!-- Header End -->
    @yield('content')

    <!-- Lookbok Section Begin -->
    <!-- Lookbok Section End -->

    <!-- Logo Section Begin -->

    <!-- Logo Section End -->

    <!-- Footer Section Begin -->
    @include('frontend.components.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('bahan/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('bahan/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bahan/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('bahan/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('bahan/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('bahan/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('bahan/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('bahan/js/main.js') }}"></script>
</body>

</html>
