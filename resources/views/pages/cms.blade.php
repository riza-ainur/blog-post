<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>BLOG TEST</title>
    <link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.min.css") }}">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/blog.css") }}">
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="text-muted" href="{{url('posts')}}">Home</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="javascript:void(0)">BLOG TEST</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                  </a>
                  <a class="btn btn-sm btn-outline-secondary" href="{{url('posts/create')}}">Posts</a>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-outline-secondary" href="{{url('tags/create')}}">Tags</a>
              </div>
            </div>
        </header>
        <br>

        @yield("content")

        <br>
    </div>

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
</p>
</footer>
    <script src="{{ asset("js/jquery.js") }}"></script>
    <script>window.jQuery || document.write('<script src="{{ asset("js/jquery-slim.min.js") }}"><\/script>')</script>
    <script src="{{ asset("js/popper.min.js") }}"></script>
    <script src="{{ asset("bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/holder.min.js") }}"></script>
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
    </script>

</body>
</html>
