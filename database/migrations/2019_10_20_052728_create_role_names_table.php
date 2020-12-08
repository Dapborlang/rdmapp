<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role');
            $table->string('detail');
            $table->timestamps();
        });

        DB::table('role_names')->insert(
            array(
                'role' => 'ADM',
                'detail' => 'ADMIN'
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
        Schema::dropIfExists('role_names');
    }
}
