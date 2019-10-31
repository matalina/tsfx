<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if (!Schema::hasTable('rooms')) {
            Schema::create('rooms', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('title');
                $table->string('name'); // lower case no spaces
                $table->text('description');

                $table->timestamps();
            });
        }
        
        if (!Schema::hasTable('items')) {
            Schema::create('items', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('title');
                $table->string('name'); // lower case no spaces
                $table->text('description');

                // Where is the item?
                $table->bigInteger('storable_id')->unsigned();
                $table->string('storable_type'); // room, person, or item

                $table->timestamps();
            });
        }
        
        if (!Schema::hasTable('people')) {
            Schema::create('people', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('full_name');
                $table->string('name'); // lower case no spaces
                $table->text('description');

                $table->boolean('is_self')->default(0);

                $table->bigInteger('always_on_person')->unsigned()->nullable();
                $table->foreign('always_on_person')->references('id')->on('items');

                $table->bigInteger('location')->unsigned();
                $table->foreign('location')->references('id')->on('rooms');

                $table->timestamps();
            });
        }
        
         if (!Schema::hasTable('doors')) {
            Schema::create('doors', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('direction');
                $table->boolean('is_locked')->default(0);

                $table->bigInteger('key')->unsigned()->nullable();
                $table->foreign('key')->references('id')->on('items');

                $table->string('password')->nullable();


                $table->bigInteger('room_a')->unsigned();
                $table->foreign('room_a')->references('id')->on('rooms');
                $table->bigInteger('room_b')->unsigned();
                $table->foreign('room_b')->references('id')->on('rooms');


                $table->timestamps();
            });
        }
        
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('doors');
        Schema::dropIfExists('items');
        Schema::dropIfExists('people');
    }
}
