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
        Schema::create('prize_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('first_prize');
            $table->integer('second_prize');
            $table->integer('thrid_prize');
            $table->integer('consolation_prize_id');
            $table->integer('special_prize');
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
        Schema::dropIfExists('prize_lists');
    }
};
