
@include('front.layouts.header')

<div class="breadcrumb-wrap">
    <div class="container">
      <ul class="breadcrumb">
        @section('breadcrumb')
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        @show

      </ul>
    </div>
  </div>
   @yield('content')

   @include('front.layouts.footer')
