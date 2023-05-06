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
        Schema::create('consolation_prizes', function (Blueprint $table) {
            $table->id();
            $table->integer('first_digit');
            $table->integer('second_digit');
            $table->integer('thrid_digit');
            $table->integer('fourth_digit');
            $table->integer('fifth_digit');
            $table->integer('six_digit');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('consolation_prizes');
    }
};
