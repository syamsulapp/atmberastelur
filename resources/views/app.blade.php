<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('atmberas/assets/img/favicon.svg')}}" />
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('atmberas/assets/css/bootstrap-5.0.0-alpha-2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('atmberas/assets/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('atmberas/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('atmberas/assets/css/lindy-uikit.css') }}" />
    <link rel="stylesheet" href="{{ asset('atmberas/assets/css/base-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('atmberas/assets/bootstrap-4/css/bootstrap.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>@yield('judul')</title>
</head>
@include('header.header')

@yield('konten')

@include('footer.footer')
<script src="{{ asset('atmberas/assets/bootstrap-4/js/jquery-3.6.0.min.js') }}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{ asset('atmberas/assets/bootstrap-4/js/popper.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('atmberas/assets/bootstrap-4/js/bootstrap.min.js') }}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('atmberas/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/mysweet.js') }}"></script>
<!-- ========================= scroll-top start ========================= -->
<a href="#" class="scroll-top"> <i class="lni lni-chevron-up"></i> </a>
<!-- ========================= scroll-top end ========================= -->


<!-- ========================= JS here ========================= -->
<script src="{{ asset('atmberas/assets/js/bootstrap.5.0.0.alpha-2-min.js') }}"></script>
<script src="{{ asset('atmberas/assets/js/count-up.min.js') }}"></script>
<script src="{{ asset('atmberas/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('atmberas/assets/js/main.js') }}"></script>
</body>

</html>