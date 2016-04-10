<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->unsignedInteger('user_id');
            $table->string('title', 200)->default('Untitled');
            $table->text('message');
            $table->unsignedInteger('type')->default(0);
            $table->unsignedInteger('forum_access_count')->default(0);
            $table->boolean('locked')->default(false);
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
        Schema::drop('forum_posts');
    }
}
