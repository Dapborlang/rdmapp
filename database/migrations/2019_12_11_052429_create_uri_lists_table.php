<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUriListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uri_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('uri_id');
            $table->string('label');
            $table->string('uri');
            $table->foreign('uri_id')->references('id')->on('uris');
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
        Schema::dropIfExists('uri_lists');
    }
}
