<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSobaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soba', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('broj_sobe')->unique();
            $table->integer('broj_kreveta');
            $table->decimal('cena_sobe')->default('1000');
            $table->enum('zauzeta',['jeste','nije'])->default('nije');
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
        Schema::dropIfExists('soba');
    }
}
