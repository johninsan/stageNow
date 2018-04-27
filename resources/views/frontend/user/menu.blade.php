<!--begin breadcrumb-wrapper-->
<div class="breadcrumb-wrapper">

    <!--begin container -->
    <div class="container">

        <!--begin row -->
        <div class="row">

            <!--begin col-xs-6 -->
            <div class="col-xs-6">

                <h2 class="page-title">{{ $menu }}</h2>

            </div>
            <!--end col-xs-6 -->

            <!--begin col-xs-6 -->
            <div class="col-xs-6 text-right">

                <ol class="breadcrumb">
                    <p class="active" style="color: red">Hello, {{ \Illuminate\Support\Facades\Session::get('name') }}</p>
                    <hr>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/home/pesan">Pesan</a></li>

                </ol>

            </div>
            <!--end col-xs-6 -->

        </div>
        <!--end row -->

    </div>
    <!--end container -->

</div>