<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learnings', function (Blueprint $table) {
            $table->id();
            $table->string('personal_id')->nullable();
            $table->string('titleoflearning')->nullable();
            $table->string('inclusivefrom')->nullable();
            $table->string('inclusiveto')->nullable();
            $table->string('numberofhour')->nullable();
            $table->string('typeofld')->nullable();
            $table->string('conducteby')->nullable();
            
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
        Schema::dropIfExists('learnings');
    }
}
