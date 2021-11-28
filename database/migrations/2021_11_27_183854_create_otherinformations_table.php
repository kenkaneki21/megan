<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otherinformations', function (Blueprint $table) {
            $table->id();
            $table->string('personal_id')->nullable();
            $table->string('specialskill')->nullable();
            $table->string('nonacademic')->nullable();
            $table->string('membership')->nullable();
            
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
        Schema::dropIfExists('otherinformations');
    }
}
