<!DOCTYPE html>
<html lang="en">
<head>
@include('stageNow/layouts/head')

</head>
<body class="hold-transition- skin-black sidebar-mini ">
<div class="wrapper">
@include('admin/layouts/header')
    @section('admin-content')
        @show
@include('admin/layouts/sidebar')
@include('stageNow/layouts/footer')
</div>
</body>
</html>