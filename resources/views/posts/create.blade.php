@extends('layouts.app')


@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Adauga o postare noua</div>

            <div class="card-body">
                <form action="" method="post">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">

                    <br>


                    <label for="">Select Category</label>
                    <!-- We need to get categories here-->

                    <br>

                    <label for="">Image</label>
                    <input type="file" name="featured" id="form-control ">
                    
                    <br>

                    <label for="">Content</label>
                    <textarea name="content" id="" class="form-control" rows="10"></textarea>

                    <br>

                    <input type="submit" value="Create Post" class="btn btn-success btn-sm">
                </form>
            </div>
        </div>
    </div>
@endsection