<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>stageNow</title>
    <link href="/frontend/login-data/css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Impressive Login & Sign up Forms Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script src="/frontend/js/jquery-1.11.3.min.js"></script>
    <!-- //end-smoth-scrolling -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,600italic,700,300italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#salary').hide();
            $('#type').on('change', function(event) {
                var opt = this.options[ this.selectedIndex ];
                var musisi = $(opt).text().match(/Musisi/i);
                if(musisi) {
                    $('#salary').show();
                } else {
                    $('#salary').hide();
                }
            });
        });
    </script>
</head>
<body style="background-color: #D05C18">

    @if(\Illuminate\Support\Facades\Session::has('alert-success'))
    {!! \Illuminate\Support\Facades\Session::get('alert-success') !!}
    @endif
    <div class="main" >
        <div class="login-top left">
            <h1 style="color: #0b3e6f"> Daftar Akun</h1>
            <hr>
            <div class="clearfix"> </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="/registerPost" method="post">
                {{csrf_field()}}
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
                <br>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                <input type="password" name="confirmation" class="form-control" placeholder="Konfirmasi Password" required="">
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required="">
                {{-- <input type="text" name="salary" class="form-control" placeholder="Minimal Pembayaran Anda" required=""> --}}
                <input type="text" name="phone" class="form-control" placeholder="Nomor Telfon" required="">
                <input type="text" name="address" class="form-control" placeholder="Alamat" required="">
                <select type="text" id="type" name="type" class="form-control" required=""'>
                    <option value="">-- Siapakah Dirimu ? --</option>
                    @foreach(\App\modelTipe::all() as $cihuy)
                    <option value="{{ $cihuy->id }}">{{ $cihuy->nama }}</option>
                    @endforeach
                </select>
                <br>
                <input type="text" id="salary" name="salary" class="form-control" placeholder="Bayaran minimal mu!">
                <br>
                <button type="submit" class="btn btn-md btn-primary">Daftar</button>
            </form>
        </div>


        <div class="login-top right">
            <h3>Masuk</h3>
            <form action="/loginPost" method="post">
                {{csrf_field()}}
                <input type="text" class="email1 " name="email" placeholder="Email" required="">
                <input type="password" class="password1" name="password"  placeholder="Password" required="">
                <input type="checkbox" id="brand" value="">
                <div class="login-bottom">
                    <ul>
                        <li>

                            <input type="submit" value="LOGIN">

                        </li>
                        <div class="clear"></div>
                    </ul>
                </div>


            </form>

        </div>
        <div class="clear"></div>
    </div>
    <div class="copy-right w3l-agile">
       <strong style="color:white">Copyright &copy; 2018-{{Carbon\carbon::now()->year}} <a style="font-size: 25px" href="https://BeritaJohn.com">StageNow</a>.</strong>
   </div>
   {{--<script> window.onload = swal ( "Oops !" ,  "Password atau Email kamu Salah!" ,  "error" )</script>--}}

</body>
</html>
