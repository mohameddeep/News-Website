@extends('front.layouts.app')


@section('content')
 <!-- Top News Start-->








  <!-- Main News Start-->
  <div class="main-news">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="mn-img">
                  <img src="{{ $post->images->first()->path }}" />
                  <div class="mn-title">
                    <a href="">{{ $post->title }}</a>
                  </div>
                </div>
              </div>
            @endforeach



          </div>
        </div>

        <div class="col-lg-3">
          <div class="mn-list">
            <h2>Catogries</h2>
            <ul>

                @foreach ($catogries as $catogry)
                <li><a href="{{ route('catogries.posts',$catogry->slug) }}">{{ $catogry->name }}</a></li>
                @endforeach


            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main News End-->
@endsection
