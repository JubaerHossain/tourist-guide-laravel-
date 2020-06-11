<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('back_pic')->nullable();
            $table->string('location')->nullable();
            $table->string('language')->nullable();
            $table->string('nid')->nullable();
            $table->string('bc')->nullable();
            $table->string('pid')->nullable();
            $table->string('verified_at')->default(0);
            $table->string('rate')->default(0);
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
        Schema::dropIfExists('guides');
    }
}
