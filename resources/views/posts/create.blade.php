@extends('layouts.app')


@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Adauga o postare noua</div>

            <div class="card-body">
            <!-- Add route also enctype -->
                <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">

                    <!-- CSRF field -->
                    @csrf

                    <label for="">Title</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control">

                    <br>

                    <!-- After fresh migration no categories are available to add here 
                        So Lets check in controller and redirect if no category exist -->
                    <label for="">Select Category</label>
                    <!-- We need to get categories here-->
                    <!-- We just need to store category_id -->
                    <!-- Lets check each id with the old category_id to select appropiate category after validation errors -->

                    
                    <select name="category_id" class="form-control">
                    
                    @foreach ($categories as $cat)

                        <option value="{{$cat->id}}" {{old('category_id') == $cat->id ? 'selected': ''}}>
                            {{$cat->name}}
                        </option>

                    @endforeach

                    </select>

                    <br>

                    <label for="">Image</label>
                    <input type="file" name="featured" id="form-control ">
                    
                    <br>

                    <label for="">Content</label>
                    <textarea name="content" id="" class="form-control" rows="10">{{old('content')}}</textarea>

                    <br>

                    <input type="submit" value="Create Post" class="btn btn-success btn-sm">
                </form>
            </div>
        </div>
    </div>
@endsection