 <header class="header">

    <!-- begin navbar -->
    <div class="navbar yamm navbar-default">

        <!-- begin container -->
        <div class="container">

            <!-- begin navbar-header -->
            <div class="navbar-header">
                <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand brand scrool"><img src="/frontend/images/logo.png" alt="Logo"></a>
            </div>
            <!-- end navbar-header -->

            <!-- begin navbar -->
            <div id="navbar-collapse-02" class="navbar-collapse collapse">

                <!-- begin nav -->
                <ul class="nav navbar-nav text-right">
                    @if(!\Illuminate\Support\Facades\Session::get('login'))
                    <li><a class="" href="/">Home</a></li>
                    <li><a href="/AboutUs">Tentang Kami</a></li>
                    <li><a href="/login" class="purchase scrool">Daftar dan Login</a></li>
                    @else
                    <li><a class="" href="/">Home</a></li>
                    <li class="dropdown"><a href="portfolio-main.html" data-toggle="dropdown" class="dropdown-toggle">Event</a>
                      <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="/home">Semua Acara</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="/eventOrganizer">Event Organizer</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="/kafe">Acara Kafe</a></li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <li><a href="/AboutUs">Tentang Kami</a></li>
                <li><a href="/logout" class="purchase scrool">Sign Out</a></li>
                @endif
                <li class="dropdown hidden-nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle">How to Reach Us</a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="#"><i class="icon icon-call-phone"></i> 1-987-654-3210</a></li>
                        <li><a tabindex="-1" href="#"><i class="icon icon-pin-map"></i> 123, Regal Garden, London, UK</a></li>
                    </ul>
                </li>

            </ul>
            <!-- end nav -->

        </div>
        <!-- end navbar -->

    </div>
    <!-- end container -->

</div>
<!-- end navbar -->

</header>