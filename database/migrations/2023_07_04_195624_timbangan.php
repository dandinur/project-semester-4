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
        Schema::create('timbangan', function(Blueprint $table){
            $table->id();
            $table->foreignId('balita_id', 20);
            $table->string('bb');
            $table->string('lingkarkepala');
            $table->string('tb');
            $table->string('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timbangan');
    }
};
