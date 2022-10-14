<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->String('medici_one')->nullable();
            $table->String('indica_one', 255)->nullable();

            $table->String('medici_two')->nullable();
            $table->String('indica_two', 255)->nullable();

            $table->String('medici_three')->nullable();
            $table->String('indica_three', 255)->nullable();

            $table->String('medici_four')->nullable();
            $table->String('indica_four', 255)->nullable();

            $table->String('medici_five')->nullable();
            $table->String('indica_five', 255)->nullable();

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
        Schema::dropIfExists('recetas');
    }
}
