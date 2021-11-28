<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCivilservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civilservices', function (Blueprint $table) {
            $table->id();
            $table->string('personal_id')->nullable();
            $table->string('career_service')->nullable();
             $table->string('rating')->nullable();
            $table->string('date_of_exam')->nullable();
             $table->string('place_of_exam')->nullable();
            $table->string('number')->nullable();
            $table->string('validity')->nullable();
            
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
        Schema::dropIfExists('civilservices');
    }
}
