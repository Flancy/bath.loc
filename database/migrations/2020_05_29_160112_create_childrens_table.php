<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreateChildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->id();
            $table->date('recording_date')->default (Carbon::now());
            $table->string('full_name');
            $table->date('birth_date');
            $table->integer('age');
            $table->date('certificate_date');
            $table->string('full_name_parents');
            $table->string('phone_number_parents');
            $table->mediumText('address');

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
        Schema::dropIfExists('childrens');
    }
}
