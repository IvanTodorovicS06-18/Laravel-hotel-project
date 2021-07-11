<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZaposleniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zaposleni', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ime');
            $table->string('prezime');
            $table->string('telefon');
            $table->string('adresa');
            $table->date('datumrodjenja');
            $table->date('datumistekaugovora');
            $table->date('datumistekasanitarneknjizice');
            $table->integer('radnisati')->default(0);
            $table->enum('radio',['dosao','nijedosao'])->default('dosao');
            $table->enum('smena',['prva','druga'])->default('prva');
            $table->string('pozicija');


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
        Schema::dropIfExists('zaposleni');
    }
}
