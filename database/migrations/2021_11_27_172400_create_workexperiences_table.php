<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkexperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workexperiences', function (Blueprint $table) {
            $table->id();
            $table->string('personal_id')->nullable();
            $table->string('inclusive_from')->nullable();
            $table->string('inclusive_to')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->string('monthly_salary')->nullable();
            $table->string('salary_increment')->nullable();
            $table->string('status')->nullable();
            $table->string('govservice')->nullable();
            
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
        Schema::dropIfExists('workexperiences');
    }
}
