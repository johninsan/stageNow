{{-- @if(\Illuminate\Support\Facades\Session::has('sweet-alert'))
    {!! \Illuminate\Support\Facades\Session::get('sweet-alert') !!}
@endif --}}
@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
  @endforeach
@endif

@if (session()->has('message'))
	<p class="alert alert-success">{{ session('message') }}</p>
@endif