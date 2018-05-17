<div class="col-sm-8">
  <!--begin blog-item -->
  <div class="blog-item">
    <!--begin popup image -->
    @foreach($user as $x)
    <div class="popup-wrapper">
      <div class="popup-gallery">
        <a href="blog-single.html"><img src="{{ url('uploads/foto') }}/{{ $x->foto }}" class="width-100" alt="pic"><span class="eye-wrapper2"><i class="icon icon-link eye-icon"></i></span></a>
      </div>
    </div>
    <!--begin popup image -->

    <!--begin blog-item_inner -->
    <div class="blog-item-inner margin-top-10" style="width: 100%;">
      <h3 class="blog-title"><a href="{{url('acara/'.base64_encode($x->id))}}">{{ $x->judul }}</a></h3>
      <p class="blog-icons" style="font-color:#191010; font-size: 11pt">Rp. {{number_format($x->salary , "2", ",", ".") }}</p>

      {{ $x->tanggal_mulai }} - {{ $x->tanggal_berakhir }} 

      <p>{{ $x->deskripsi }}</p>

    </div>
    @endforeach
    <hr>
    <ul class="pager">
      <li class="next">
        {{ $user->links() }}
      </li>
    </ul>
    <!--end blog-item-inner -->
  </div>
</div>