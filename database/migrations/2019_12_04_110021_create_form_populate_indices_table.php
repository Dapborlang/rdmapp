<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormPopulateIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_populate_indices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('form_populate_id');
            $table->text("exclude")->nullable();
            $table->text("notes")->nullable();
            $table->text("script")->nullable();
            $table->text("master_keys")->nullable();
            $table->text("foreign_keys")->nullable();
            $table->text("class")->nullable();
            $table->text("attribute")->nullable();
            $table->text("type")->nullable();
            $table->text("cnotes")->nullable();
            $table->foreign('form_populate_id')->references('id')->on('form_populates');
            $table->timestamps();
        });

        DB::table('form_populate_indices')->insert(
            array(
                ['form_populate_id' =>'1',
                'exclude' => '["id","updated_at","created_at"]',
                'notes' => '[""]',
                'foreign_keys'=> null,
                'cnotes' => '[""]'],

                ['form_populate_id' =>'2',
                'exclude' => '["id","updated_at","created_at"]',
                'notes' => '[""]',
                'foreign_keys'=>'{
                    "User": [
                        "user_id",
                        "id",
                        "email"
                    ],
                    "RoleName": [
                        "role",
                        "role",
                        "detail"
                    ]
                }',
                'cnotes' => '[""]']
            )
            // {
            //     "User": [
            //         "user_id",
            //         "id",
            //         "email"
            //     ],
            //     "RoleName": [
            //         "role",
            //         "role",
            //         "detail"
            //     ]
            // }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_populate_indices');
    }
}
