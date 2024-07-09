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
    <link rel="stylesheet" href="{{ asset('assets/frontEnd/vendor/toastr/toastr.min.css') }}">
    @yield('stylesheet')

</head>
<body>
@include('frontEnd.includes.main-header')

@yield('content')

@include('frontEnd.includes.mobile-nav')

@include('frontEnd.includes.footer')


<script src="{{ asset('assets/frontEnd/js/bootstrap.bundle.js') }}"></script>

<script src="{{ asset('assets/frontEnd/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontEnd/js/owl.carousel.js') }}"></script>

<script src="{{ asset('assets/frontEnd/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontEnd/js/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/frontEnd/vendor/toastr/toastr.min.js') }}"></script>
<script>
    let BASE_URL = "{{ route('home') }}";
    $(".btn-custom-close").on('click', function (e){
        $(e.target).parent().remove();
    });

    $(function() {
        /**
         * Global search form validation here
         */

        $('#searchFormId1').validate({
            onfocusout: false,
            highlight: function (element) {
                $(element).focus();
                $(element).css('border-color', 'red');
            },
            unhighlight: function(element) {
                $(element).css('border-color', '#dee2e6');
            },
            errorPlacement: function(error, element) {},
        });
    });

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
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
