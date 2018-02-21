@extends('pages.cms')
@section('content')


<form action="{{ url('posts') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h4>Create New Post</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" placeholder="Enter content"></textarea>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" name="photo">
            <em><small>Not more than 1 MB and format only Jpg, Jpeg, and Png</small></em>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection