<!DOCTYPE html>
<html lang="en">
<head>
@include('stageNow/layouts/head')

</head>
<body class="hold-transition- skin-black sidebar-mini ">
<div class="wrapper">
@include('stageNow/layouts/header')
    @section('main-content')
        @show
@include('stageNow/layouts/sidebar')
@include('stageNow/layouts/footer')
</div>
</body>
</html>