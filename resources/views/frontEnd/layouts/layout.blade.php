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
<div class="mobile-nav">
    <a href="{{ route('post.create') }}" class="add-post" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @endguest><i class="bi bi-plus"></i></a>
    <ul>
        <li>
            <a href="{{ route('home') }}">
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-search"></i>
                <span>Search</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-heart"></i>
                <span>Wishlist</span>
            </a>
        </li>
        <li>
            <a href="{{ route('my-account.index') }}">
                <i class="bi bi-person"></i>
                <span>Account</span>
            </a>
        </li>
    </ul>
</div>
@include('frontEnd.includes.footer')


<script src="{{ asset('assets/frontEnd/js/bootstrap.bundle.js') }}"></script>

<script src="{{ asset('assets/frontEnd/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontEnd/js/owl.carousel.js') }}"></script>

<script src="{{ asset('assets/frontEnd/js/custom.js') }}"></script>
<script>
    let BASE_URL = "{{ route('home') }}";
    $(".btn-custom-close").on('click', function (e){
        $(e.target).parent().remove();
    });
</script>

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
