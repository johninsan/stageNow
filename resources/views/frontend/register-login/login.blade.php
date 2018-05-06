<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>StageNow</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<body>
@if(\Illuminate\Support\Facades\Session::has('alert-success'))
    {!! \Illuminate\Support\Facades\Session::get('alert-success') !!}
@endif
<div class="container">
  <h2>Stage Now</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Daftar</a></li>
    <li><a data-toggle="tab" href="#menu1">Log In</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     <div class="col-md-6">
      <h1 style="color: #0b3e6f"> Daftar Akun</h1>
            <hr>
            <div class="clearfix"> </div>
            <form action="/registerPost" method="post">
                {{csrf_field()}}
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
                <br>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                <br>
                <input type="password" name="confirmation" class="form-control" placeholder="Konfirmasi Password" required="">
                <br>
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required="">
                <br>
                {{-- <input type="text" name="salary" class="form-control" placeholder="Minimal Pembayaran Anda" required=""> --}}
                <input type="text" name="phone" class="form-control" placeholder="Nomor Telfon" required="">
                <br>
                <input type="text" name="address" class="form-control" placeholder="Alamat" required="">
                <br>
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
     <div class="col-md-6">
         
     </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h1 style="color: #0b3e6f"> Masuk</h1>
            <hr>
        <div class="col-md-6">
            <form action="/loginPost" method="post">
                {{csrf_field()}}
                <div class="col-md-1">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="col-md-11">                     
                    <input type="text" class="email1 form-control"  name="email" placeholder="Email" required=""><br>
                </div>
                <div class="col-md-1">
                    <i class="fa fa-unlock-alt"></i>
                </div>
                <div class="col-md-11">                     
                    <input type="password" class="password1  form-control" name="password"  placeholder="Password" required=""><br>
                </div>
                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
        </div>
        <div class="col-md-6">
            &nbsp;
        </div>
    </div>
  </div>
</div>
<div class="copy-right w3l-agile text-center" style="margin-top: 30px;">
    <strong>Copyright &copy; {{Carbon\carbon::now()->year}} <a style="font-size: 25px" href="#">StageNow</a>.</strong>
</div>
</body>
</html>
