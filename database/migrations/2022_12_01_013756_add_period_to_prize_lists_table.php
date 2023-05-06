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
        Schema::table('prize_lists', function (Blueprint $table) {
            $table->integer('period');
            $table->date('set_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prize_lists', function (Blueprint $table) {
            $table->dropColumn('period');
            $table->dropColumn('set_date');
        });
    }
};
