<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('key',10)->unique();
            $table->string('title');
            $table->text('body');

            $table->timestamps();
        });

        Schema::create('props', function (Blueprint $table) {
            $table->bigInteger('scene_id')->unsigned();

            $table->bigInteger('prop_id')->unsigned();
            $table->string('prop_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scenes');
        Schema::dropIfExists('props');
    }
}
