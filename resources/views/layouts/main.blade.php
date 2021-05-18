<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/modern-business.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

</head>

<body>

<!-- Navigation -->
<x-navbar></x-navbar>

<x-header></x-header>

<!-- Page Content -->
<div class="container">
    {{--    <a href='{{route('news.toOrder')}}' class="btn btn-primary order-btn">Make an order</a>--}}
    @yield('content')
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
