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
        Schema::create('loans', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('id_user')->unsigned();
            $table->integer('id_platform')->unsigned();
            $table->decimal('contribution', $precision = 15, $scale = 2)->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
            $table->foreign("id_user")->references("id")->on("users");
            $table->foreign("id_platform")->references("id")->on("platforms");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
