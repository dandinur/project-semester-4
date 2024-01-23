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
        Schema::create('kesehatanibu', function(Blueprint $table){
            $table->id();
            $table->foreignId('ibuhamil_id', 20);
            $table->string('lila');
            $table->string('bb');
            $table->string('lingkarperut');
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
        //
    }
};
