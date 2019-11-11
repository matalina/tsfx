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
            $table->integer('order');
            $table->string('title');
            $table->text('body');
            $table->string('scene_change'); // trigger

            $table->timestamps();
        });

        Schema::create('props', function (Blueprint $table) {
            $table->bigInteger('scene_id')->unsigned();

            $table->bigInteger('prop_id')->unsigned();
            $table->string('prop_type');
        });

        Schema::create('triggers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('human');
            $table->string('type'); // success, fail, clock, timer
            $table->string('command');
            $table->string('args');
            $table->json('trigger');
            $table->text('body');

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
        Schema::dropIfExists('scenes');
        Schema::dropIfExists('props');
    }
}
