<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.head')
</head>
<body>

<!--begin top-intro -->
<div class="top-intro" id="top-intro">
   @include('frontend.components.navbar-atas')
</div>
<!--end top-intro -->

<!--begin header -->
<header class="header">
    @include('frontend.components.header')
</header>
<!--end header -->
@if(\Illuminate\Support\Facades\Session::has('sweet-alert'))
    {!! \Illuminate\Support\Facades\Session::get('sweet-alert') !!}
@endif

@section('section')
        @show


@include('frontend.components.footer')

@include('frontend.script')

</body></html>