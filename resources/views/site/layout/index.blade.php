<html>
<?php
use Illuminate\Support\Facades\Route;
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{env('APP_NAME')}} </title>

    @include(layouts('site').'.css')

</head>


<body @if(auth()->check()) id="editProfile" @endif>


<div @if(Route::currentRouteName() == 'home') class="HeaderContainer" @endif>
    <!--Start Header-->
@include(layouts('site').'.header')
<!--End Header-->
    <!-------------------------->

</div>

@if(session()->has('activation'))

    <div class="alert alert-info">
        {{session()->get('activation')}}
    </div>
@endif
<!--Start Body-->
@yield('content')
<!--Start Hero Section-->
<!------------------------------------------------->
<!--Start Footer-->
@include(layouts('site').'.footer')
<!--End Footer-->

@include(layouts('site').'.models')

@include(layouts('site').'.js')
</body>

</html>
