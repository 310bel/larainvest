<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('id_user')->unsigned();
            $table->string('name')->nullable();
            $table->double('balance')->nullable();
            $table->date('date_start')->nullable();
            $table->double('percentage_of_a_year')->nullable();
            $table->string('bankrupt')->nullable();
            $table->timestamps();
            $table->foreign("id_user")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platforms');
    }
};
