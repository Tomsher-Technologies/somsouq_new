<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Som Souq</title>
    <link rel="stylesheet" href="{{ asset('assets/frontEnd/css/main.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    @yield('stylesheet')

</head>
<body>
@include('frontEnd.includes.main-header')

@yield('content')

@include('frontEnd.includes.footer')

<script src="{{ asset('assets/frontEnd/js/bootstrap.bundle.js') }}"></script>

<script src="{{ asset('assets/frontEnd/js/jquery.min.js') }}"></script>
{{--<script src="{{ asset('assets/frontEnd/js/owl.carousel.js') }}"></script>--}}

<script src="{{ asset('assets/frontEnd/js/custom.js') }}"></script>

@yield('script')
<!-- <script type="text/javascript">
  $(window).on('load',function(){
    var delayMs = 1500; // delay in milliseconds

    setTimeout(function(){
        $('#loginModal').modal('show');
    }, delayMs);
});
</script> -->
</body>
</html>
