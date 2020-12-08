<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileStoragesTable extends Migration
{

    public function up()
    {
        Schema::create('file_storages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename');
            $table->string('detail');
            $table->string('uri');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_storages');
    }
}
