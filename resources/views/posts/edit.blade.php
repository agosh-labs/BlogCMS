@extends('layouts.app')


@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit post: {{$post->title}}</div>

            <div class="card-body">
            <!-- Add route also enctype -->
                <form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">

                    <!-- CSRF field -->
                    @csrf
                    <!-- Like we did in category -->
                    @method('PUT')
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{$post->title}}" class="form-control">

                    <br>


                    <label for="">Select Category</label>
      

                    <select name="category_id" class="form-control">
                    
                    @foreach ($categories as $cat)

                        <option value="{{$cat->id}}" {{$cat->id == $post->category_id ? 'selected' : '' }}>
                            {{$cat->name}}
                        </option>

                    @endforeach

                    </select>

                    <br>

                    <!--Show image -->
                    <img src="{{url($post->featured)}}" class="mb-3" alt="{{$post->title}}" width="60" height="auto">

                    <br>

                    <label for="">Edited Image</label>
                    <input type="file" name="featured" id="form-control ">
                    
                    <br>

                    <label for="">Content</label>
                    <textarea name="content" id="" class="form-control" rows="10">{{$post->content}}</textarea>

                    <br>

                    <input type="submit" value="Update Post" class="btn btn-success btn-sm">
                </form>
            </div>
        </div>
    </div>
@endsection