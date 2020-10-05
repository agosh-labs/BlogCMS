<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //If we want to add own name of table we can do like this 
    //protected $table = "tbl_posts";


    //This is default naming convention in terms of model name 
    protected $table = "posts";

    //this will enable to use this feature 
    use SoftDeletes;

    
    //Lets add similar in User model's syntax
    //We made only these fields fillable 

    protected $fillable = [

        'title', 'content', 'category_id', 'featured', 'slug'
    ];

    //Since new timestamp field is added we can add to protected $dates
    protected $dates = ['deleted_at'];

    //Posts belogsTo one Category
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
