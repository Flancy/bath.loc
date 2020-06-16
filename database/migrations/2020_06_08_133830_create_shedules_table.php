<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shedules', function (Blueprint $table) {
            $table->id();
            $table->longText('days');
            $table->string('pay');

            $table->unsignedBigInteger('children_id');

            $table->foreign('children_id')->references('id')
                ->on('childrens')
                ->onDelete('cascade');

            $table->unsignedBigInteger('trainer_id');

            $table->foreign('trainer_id')->references('id')
                ->on('trainers')
                ->onDelete('cascade');

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
        Schema::dropIfExists('shedules');
    }
}
