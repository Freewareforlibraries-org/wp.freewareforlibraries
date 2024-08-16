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
        Schema::create('wp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('patron');
            $table->text('phone');
            $table->text('email');
            $table->text('copies');
            $table->text('location');
            $table->text('libnumber');
            $table->char('file', 255);             
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
        Schema::dropIfExists('wp');
    }
};