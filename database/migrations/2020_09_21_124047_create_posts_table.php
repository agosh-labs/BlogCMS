<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            //We make sure there is this field 
            //We need a column with a category id to relate to category table
            $table->integer('category_id');

            //Add some columns
            $table->string('title');
            $table->string('slug');
            $table->text('content');

            //For featured image
            $table->string('featured');
            //Laravel provides this feature by setting up some setting
            //This will create a new field in the table 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
