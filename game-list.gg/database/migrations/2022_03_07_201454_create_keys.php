<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->foreignId('developer_id')->constrained('developers');
            $table->foreignId('publisher_id')->constrained('publishers');
        });
        Schema::table('developers', function (Blueprint $table) {
            $table->foreignId('publisher_id')->constrained('publishers');
        });
        Schema::table('games_genres', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained('games');
            $table->foreignId('genre_id')->constrained('genres');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keys');
    }
}
