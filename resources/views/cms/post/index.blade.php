@extends('pages.cms')
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="row mb-2">
        @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">Design</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">{{$post->title}}</a>
                        </h3>

                    <div class="mb-1 text-muted">
                        {{\Carbon\Carbon::parse($post->published_at)->diffForHumans()}}
                    </div>

                    <p class="card-text mb-auto">
                        {{$post->content}}
                    </p>
                    <a href="{{url('posts/'.$post->slug)}}">Continue reading</a>
                </div>
                <br>
                <img class="card-img-right flex-auto d-none d-md-block" src="{{ URL::asset('uploads/'.$post->photo)}}" alt="Card image cap">
            </div>
        </div>
        @endforeach
        @else
        <div class="col-md-6">
        </div>
        @endif
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">

          </h3>



        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">My Blog, <em>Blog test</p>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Total Tags ({{$total_tags}})</h4>
            <ol class="list-unstyled mb-0">
                @foreach($tags as $tag)
                    <li><a href="#">{{$tag->name}}</a> ({{$tag->posts()->count()}})</li>
                @endforeach()
            </ol>
          </div>
        </aside>

      </div>

    </main>

@endsection

<script src="{{ asset("js/jquery.js") }}"></script>
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function() {

    });
</script>