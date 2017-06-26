<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // primary key
            $table->string('name'); // full name of the user (permenant)
            $table->string('email')->unique(); // email of the user (permenant)
            $table->longText('summary')->nullable();  // description of the user 
            $table->bigInteger('number')->nullable(); // phone number
            $table->boolean('admin'); // is this a super user
            $table->string('password'); // password
            $table->rememberToken(); 
            $table->timestamps(); // created_at & update_at
            $table->engine = "InnoDB";
        });
        DB::table('users')->insert(
            array(
                "name" => "admin",
                "email"=>"machine_learning_guc@yahoo.com",
                "summary" => "The admin account. This amdin account allows members to add other members and gives the user elevated privallages",
                "number" => "16482",
                "admin" => true,
                "password" => Hash::make("~n72>Q+q!:3q-+`kvE.qP7DdWms3RRUJX'%(~hK["),
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
                )

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
