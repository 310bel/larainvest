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
        Schema::create('lvoviches', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('id_user')->unsigned();
            $table->string('comment')->unsigned();
            $table->decimal('action', $precision = 15, $scale = 2)->nullable();
            $table->string('information')->unsigned();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('lvoviches');
    }
};
