<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //If we want to add own name of table we can do like this 
    //protected $table = "tbl_posts";


    //This is default naming convention in terms of model name 
    protected $table = "posts";
}
