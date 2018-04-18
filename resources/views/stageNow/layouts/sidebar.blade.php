<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ \Illuminate\Support\Facades\Session::get('name') }}</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li class="active treeview">
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('stageNow.home') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="{{ route('acara.index') }}"><i class="fa fa-calendar-o"></i> Acara</a></li>
            <li class="active"><a href="#"><i class="fa fa-envelope"></i> Pesan</a></li>
            <li class="active"><a href="{{ route('stageNow.musisi') }}"><i class="fa fa-user"></i> Musisi</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>