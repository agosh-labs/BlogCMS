<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //If we want to add own name of table we can do like this 
    //protected $table = "tbl_posts";


    //This is default naming convention in terms of model name 
    protected $table = "posts";

    //Lets add similar in User model's syntax
    //We made only these fields fillable 

    protected $fillable = [

        'title', 'content', 'category_id', 'featured'
    ];


    //Posts belogsTo one Category
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
