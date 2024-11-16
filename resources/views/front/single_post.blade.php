@extends('front.layouts.app')

@section('content')

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">News</a></li>
        <li class="breadcrumb-item active">News details</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb End -->

  <!-- Single News Start-->
  <div class="single-news">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <!-- Carousel -->
            <div id="newsCarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#newsCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#newsCarousel" data-slide-to="1"></li>
                <li data-target="#newsCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">

                @foreach ($post->images as $image)


                <div class="carousel-item @if($loop->index == 0) active @endif">
                    <img src="{{ $image->path }}" class="d-block w-100" alt="First Slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Lorem ipsum dolor sit amet</h5>
                      <p>
                        laoreet. Aliquam vel felis felis. Proin sed sapien erat. Etiam a quam et metus tempor rutrum.
                      </p>
                    </div>
                  </div>
                  @endforeach
                <!-- Add more carousel-item blocks for additional slides -->
              </div>
              <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <div class="sn-content">

                {{ $post->descr }}
                        </div>

            <!-- Comment Section -->
            <div class="comment-section">
              <!-- Comment Input -->
              <form id="addComment">
                @csrf
              <div class="comment-input">
                <input type="text" placeholder="Add a comment..." name="comment" id="commentInput" />
                <input type="hidden" name="user_id" value="1">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button id="addCommentBtn" type="submit">Post</button>
              </div>
            </form>
              <!-- Display Comments -->

              <div style="display: none" class="alert alert-danger" id="showerror">

              </div>
              <div class="comments">
                @foreach ($post->comments as $comment)
                <div class="comment">
                    <img src="{{ $comment->user->image }}" alt="User Image" class="comment-img" />
                    <div class="comment-content">
                      <span class="username">{{ $comment->user->name }}</span>
                      <p class="comment-text">{{ $comment->comment }}</p>
                    </div>
                  </div>
                @endforeach


                <!-- Add more comments here for demonstration -->
              </div>

              <!-- Show More Button -->
              <button id="showMoreBtn" class="show-more-btn">Show more</button>
            </div>

            <!-- Related News -->
            <div class="sn-related">
              <h2>Related News</h2>
              <div class="row sn-slider">
                @foreach ($realtedPosts as $post)
                <div class="col-md-4">
                    <div class="sn-img">
                      <img src="{{ $post->images()->first()->path }}" class="img-fluid" alt="Related News 1" />
                      <div class="sn-title">
                        <a href="#">{{ $post->title }}</a>
                      </div>
                    </div>
                  </div>
                @endforeach


              </div>
            </div>
          </div>

        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-widget">
              <h2 class="sw-title">In This Category</h2>
              <div class="news-list">

                @foreach ($catogries as $catogry)
                <div class="nl-item">

                    <div class="nl-title">
                      <a href=""
                        >{{ $catogry->name }}</a
                      >
                    </div>
                  </div>
                @endforeach

              </div>
            </div>



            <div class="sidebar-widget">
              <div class="tab-news">
                <ul class="nav nav-pills nav-justified">
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#popular"
                      >Popular</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#latest"
                      >Latest</a
                    >
                  </li>
                </ul>

                <div class="tab-content">
                  <div id="popular" class="container tab-pane active">
                    @foreach ( $greatestPosts as $post)
                    <div class="tn-news">
                        <div class="tn-img">
                          <img src="{{ $post->images()->first()->path }}" />
                        </div>
                        <div class="tn-title">
                          <a href=""
                            >{{ $post->title }}</a
                          >
                        </div>
                      </div>
                    @endforeach

                  </div>

                  <div id="latest" class="container tab-pane fade">
                    @foreach ($latestPosts as $post)
                    <<div class="tn-news">
                        <div class="tn-img">
                          <img src="{{ $post->images()->first()->path }}" />
                        </div>
                        <div class="tn-title">
                          <a href=""
                            >{{ $post->title }}</a
                          >
                        </div>
                      </div>
                    @endforeach

                  </div>
                </div>
              </div>
            </div>



            <div class="sidebar-widget">
              <h2 class="sw-title">News Category</h2>
              <div class="category">
                <ul>
                    @foreach ($catogries as $catogry)
                    <li><a href="">{{ $catogry->name }}</a><span>{{ $catogry->posts()->count()}}</span></li>
                    @endforeach

                </ul>
              </div>
            </div>



            <div class="sidebar-widget">
              <h2 class="sw-title">Tags Cloud</h2>
              <div class="tags">
                <a href="">National</a>
                <a href="">International</a>
                <a href="">Economics</a>
                <a href="">Politics</a>
                <a href="">Lifestyle</a>
                <a href="">Technology</a>
                <a href="">Trades</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Single News End-->
@endsection
@push('js')
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> --}}
<script>

$(document).on('click','#showMoreBtn',function(e){
    e.preventDefault()
   $.ajax({
    url:"{{ route('posts.comments.show',$post->id)}}",
    type: "GET",
    success:function(data){
$('.comments').empty();
$.each(data,function(key,comment){

    $('.comments').append(`
    <div class="comment">
                    <img src="${ comment.user.image }" alt="User Image" class="comment-img" />
                    <div class="comment-content">
                      <span class="username">${ comment.user.name }</span>
                      <p class="comment-text">${ comment.comment }S</p>
                    </div>
                  </div>

    `)

})

$('#showMoreBtn').hide();
    },
    error:function(data){

    }
   })
})
$(document).on('submit',"#addComment",function(e){
    e.preventDefault()
   var form=new FormData($(this)[0])

   $("#commentInput").val('')

   $.ajax({
    url: "{{ route('posts.comments.store') }}",
    type: "post",
    data: form,
    processData:false,
    contentType:false,

    success: function(data){
        $("#showerror").hide()

        $(".comments").prepend(`
         <div class="comment">
                    <img src="${data.comment.user.image }" alt="User Image" class="comment-img" />
                    <div class="comment-content">
                      <span class="username">${data.comment.user.name }</span>
                      <p class="comment-text">${data.comment.comment }</p>
                    </div>
                  </div>

        `)

    },
    error: function(data){
        var response=$.parseJSON(data.responseText)
        $("#showerror").text(response.errors.comment).show()

    }


   })
})

</script>

@endpush
