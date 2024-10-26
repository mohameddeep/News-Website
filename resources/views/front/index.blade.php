@extends('front.layouts.app')


@section('content')
 <!-- Top News Start-->
 @php
 $lastPosts=$posts->take(3);
@endphp
 <div class="top-news">
    <div class="container">
      <div class="row">
        <div class="col-md-6 tn-left">
          <div class="row tn-slider">
            @foreach ($lastPosts as $post)
            <div class="col-md-6">
                <div class="tn-img">
                  <img src="{{ $post->images->first()->path }}" />
                  <div class="tn-title">
                    <a href="">{{ $post->title }}</a>
                  </div>
                </div>
              </div>
            @endforeach


          </div>
        </div>
        <div class="col-md-6 tn-right">
          <div class="row">

           @foreach ($lastPosts as $post)
            <div class="col-md-6">
                <div class="tn-img">
                  <img src="{{ $post->images->first()->path }}" />
                  <div class="tn-title">
                    <a href="">{{ $post->title }}</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Top News End-->

  <!-- Category News Start-->
  <div class="cat-news">
    <div class="container">
      <div class="row">
        @foreach ($catogries as $catogry)
        <div class="col-md-6">
            <h2>{{ $catogry->name }}</h2>
            <div class="row cn-slider">
                @foreach ($catogry->posts as $post)
                <div class="col-md-6">
                    <div class="cn-img">
                      <img src="{{ $post->images->first()->path }}" />
                      <div class="cn-title">
                        <a href="">{{ $post->title }}</a>
                      </div>
                    </div>
                  </div>
                @endforeach


            </div>
          </div>
        @endforeach


      </div>
    </div>
  </div>
  <!-- Category News End-->



  <!-- Tab News Start-->
  <div class="tab-news">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#featured"
                >oldest News</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#popular"
                >Popular News</a
              >
            </li>

          </ul>

          <div class="tab-content">
            <div id="featured" class="container tab-pane active">
                @foreach ($oldestPost as $old)
                <div class="tn-news">
                    <div class="tn-img">
                      <img src="{{ $old->images->first()->path }}" />
                    </div>
                    <div class="tn-title">
                      <a href="">{{ $old->title }}</a>
                    </div>
                  </div>
                @endforeach


            </div>
            <div id="popular" class="container tab-pane fade">
                @foreach ($popularPost as $post)
                <div class="tn-news">
                    <div class="tn-img">
                        <img src="{{ $post->images->first()->path }}" />
                    </div>
                    <div class="tn-title">
                        <a href="">{{ $post->title }} ({{ $post->comments->count() }})</a>
                    </div>
                  </div>
                @endforeach


            </div>

          </div>
        </div>

        <div class="col-md-6">
          <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#m-viewed"
                >Most Viewed</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#m-read"
                >Most Read</a
              >
            </li>

          </ul>

          <div class="tab-content">
            <div id="m-viewed" class="container tab-pane active">
                @foreach ($lastPosts as $post)
              <div class="tn-news">
                <div class="tn-img">
                    <img src="{{ $post->images->first()->path }}" />
                  </div>
                  <div class="tn-title">
                    <a href="">{{ $post->title }}</a>
                  </div>
              </div>
              @endforeach

            </div>
            <div id="m-read" class="container tab-pane fade">
                @foreach ($mostReadPost as $readPost)
              <div class="tn-news">
                <div class="tn-img">
                    <img src="{{ $readPost->images->first()->path }}" />
                  </div>
                  <div class="tn-title">
                    <a href="">{{ $readPost->title }} ({{ $readPost->read_numbers }})</a>
                  </div>
              </div>
              @endforeach

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Tab News Start-->

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
                    <a href="{{ route('posts.show',$post->id) }}">{{ $post->title }}</a>
                  </div>
                </div>
              </div>
            @endforeach



          </div>
        </div>

        <div class="col-lg-3">
          <div class="mn-list">
            <h2>Read More</h2>
            <ul>

                @foreach ($readPosts as $post)
                <li><a href="">{{ $post->title }}</a></li>
                @endforeach


            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{ $posts->links() }}
  <!-- Main News End-->
@endsection
