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
                    <a href="{{ route('posts.show',$post->id) }}">{{ $post->title }}</a>
                  </div>
                </div>
              </div>
            @endforeach



          </div>
        </div>

       >
      </div>
    </div>
  </div>
  {{ $posts->links() }}
  <!-- Main News End-->
@endsection
