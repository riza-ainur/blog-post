@extends('pages.cms')
@section('content')

<form action="{{ url('tags') }}" method="POST">
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
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection