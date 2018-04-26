<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('url',191)->unique();
            $table->string('title',250);
            $table->string('description',500)->nullable();
            $table->text('content')->nullable();
            $table->string('template',100);
            $table->boolean('is_hidden');
            $table->boolean('is_show_in_menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages', function (Blueprint $table) {
            //
        });
    }
}
