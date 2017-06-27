<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('projects', function (Blueprint $table) {
            $table->increments('id'); // id of the project
            $table->integer('user_id')->unsigned(); // id of the uploader
            $table->string('title'); // title of the project or the research
            $table->longText('description');
            $table->string('url'); // the url of the stored file
            $table->timestamps(); // created_at &updated_at
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->engine = "InnoDB";
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
