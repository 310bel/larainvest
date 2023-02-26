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
        Schema::create('pazov', function (Blueprint $table) {
            $table->bigincrements("id");
            $table->integer('id_user')->unsigned();
            $table->string('product');
            $table->decimal('price', $precision = 15, $scale = 2)->nullable();
            $table->decimal('quantity', $precision = 10, $scale = 0)->nullable();
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
        Schema::dropIfExists('pazov');
    }
};
