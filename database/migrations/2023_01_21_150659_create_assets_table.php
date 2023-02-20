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
        Schema::create('assets', function (Blueprint $table) {
            $table->bigincrements("id");
            $table->integer('id_user')->unsigned();
            $table->string('product');
            $table->decimal('price', $precision = 15, $scale = 2)->nullable(); // цена закупки
            $table->decimal('rate', $precision = 15, $scale = 2)->nullable(); //расход
            $table->decimal('selling_price', $precision = 15, $scale = 2)->nullable(); //цена продажи
            $table->decimal('profit', $precision = 15, $scale = 2)->nullable(); //прибыль
            $table->string('information');
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
        Schema::dropIfExists('assets');
    }
};
