<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoluntaryworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntaryworks', function (Blueprint $table) {
            $table->id();
            $table->string('personal_id')->nullable();
            $table->string('nameandaddress')->nullable();
            $table->string('inclusivefrom')->nullable();
            $table->string('inclusiveto')->nullable();
            $table->string('numberofhour')->nullable();
            $table->string('position')->nullable();

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
        Schema::dropIfExists('voluntaryworks');
    }
}
