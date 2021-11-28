<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('personal_id');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_lname')->nullable();
            $table->string('spouse_middlename')->nullable();
            $table->string('spouse_nameextension')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_businessname')->nullable();
            $table->string('spouse_telephone')->nullable();
            $table->string('father_surname')->nullable();
            $table->string('father_firstname')->nullable();
            $table->string('father_middlename')->nullable();
            $table->string('father_nameextension')->nullable();
            $table->string('mother_lastname')->nullable();
            $table->string('mother_firstname')->nullable();
            $table->string('mother_middlename')->nullable();
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
        Schema::dropIfExists('families');
    }
}
