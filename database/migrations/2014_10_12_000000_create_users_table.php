<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\File;

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
            $table->increments('id');
            $table->string('username');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('directory')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('timezone')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $users = \Magnus\User::all();

        foreach($users as $user) {
            $user->deleteAvatarFile();
            \Magnus\Helpers\Helpers::deleteDirectories($user->username);
        }

        //File::cleanDirectory(public_path('art'));
        Schema::drop('users');
    }
}
