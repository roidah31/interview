<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returneds', function (Blueprint $table) {
            $table->id();
			  $table->string('id_rent');
            $table->string('id_car');
            $table->string('id_user');
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('nopol');
            $table->integer('total_day');
            $table->integer('total_price');
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
        Schema::dropIfExists('returneds');
    }
}
