<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('type');
            $table->float('coordinate_x');
            $table->float('coordinate_y');
            $table->string('highest_floor_id');
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
        Schema::table('stairs', function (Blueprint $table) {
            //
        });
    }
}
