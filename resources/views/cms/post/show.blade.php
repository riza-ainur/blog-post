@extends('pages.cms')
@section('content')

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">{{$post->title}}</h1>
        </div>
    </div>

    <div class="blog-post">
      <h2 class="blog-post-title asd">{{$post->title}}</h2>
      <p class="blog-post-meta">{{\Carbon\Carbon::parse($post->published_at)->toFormattedDateString()}}</p>
      <p>{{$post->content}}</p>
    </div>

@endsection

<script src="{{ asset("js/jquery.js") }}"></script>
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function() {
        $(document).on('click', '.continue', function(e) {
            $('.blog-post').find('.asd');
        });
    });
</script>