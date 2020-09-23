@extends('layouts.app')


@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Categorii</div>

            <div class="card-body">
                <div class="row">
                <!-- This can be repeated in other forms as well so lets make seperate template and include here--> 
                <div class="col-md-12">
                    @include('layouts.errors')
                </div>
               
                    <div class="col-md-6">
                    <!-- We created table to view categories-->
                    <!-- Lets Get count of posts for each category-->
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <th width="30">S.N.</th>
                                <th>Nume: </th>
                                <th>Posts count:</th>
                                <th>Actions</th>
                                <!-- -->
                            </thead>
                            <tbody>
                            <!-- Get all categories -->
                            @foreach($categories as $cat)
                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>
                                        {{$cat->posts->count()}}
                                    </td>
                                    <td>
                                        <!-- Added a link to edit to route  -->
                                        <a href="{{route('categories.edit', $cat->id)}}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <!-- Form for Category  -->
                        <!--  Route to categories.store-->
                        <form action="{{route('categories.store')}}" method="post">
                        <!-- We need to add a method to prevent csrf attack -->
                            @csrf
                            <label for="Cat"><strong>Adauga Categorie</strong></label>
                            <input type="text" value="{{old('name')}}" name="name" class="form-control">

                            <br>

                            <input type="submit" value="Create" class="btn btn-primary btn-sm">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection