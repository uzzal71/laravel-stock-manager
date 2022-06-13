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
        Schema::create('check_out_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('check_out_id');
            $table->unsignedBigInteger('item_id');
            $table->Integer('quantity');
            $table->timestamps();

            $table->foreign('check_out_id')->references('id')->on('check_outs');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_out_details');
    }
};
