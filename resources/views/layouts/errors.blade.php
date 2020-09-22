<!-- Lets display validation errors here -->
<!-- Check errors -->
@if(count($errors) > 0)
<ul class="alert alert-warning">                    
    <!--Loop through all errors  -->
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
@endif