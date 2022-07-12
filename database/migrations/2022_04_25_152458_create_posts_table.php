<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
         $table->foreignId('category_id')->constrained('categories');
         $table->string('title');
         $table->longtext('content');
         $table->string('author')->nullable();
         $table->string('featured')->nullable();
         //$table->string('slug');
         $table->timestamps();
            // $table-> unsignedBigInteger('category_id');
            //$table->foreign('category_id')->references('id')->categories();
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
