<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwitchStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switch_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('i_p_s_id');
            $table->string('detail');
            $table->string('port');
            $table->string('pin');
            $table->string('status');
            $table->string('flag');
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
        Schema::dropIfExists('switch_statuses');
    }
}
