<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NightclubsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nightclubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('salsa');
            $table->string('bachata');
            $table->string('kizomba');
            $table->string('price');
            $table->string('address');
            $table->string('parking');
            $table->string('details');
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
        Schema::dropIfExists('nightclubs');
    }
}
