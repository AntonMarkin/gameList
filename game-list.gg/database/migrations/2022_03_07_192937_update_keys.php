<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('developer_id');
            $table->dropColumn('publisher_id');
            $table->dropColumn('genre');
            $table->dropColumn('releaseDate');
            $table->date('release_date');
        });
        Schema::table('developers', function (Blueprint $table) {
            $table->dropColumn('publisher_id');
        });
        Schema::table('games_genres', function (Blueprint $table) {
            $table->dropColumn(['game_id','genre_id']);
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
}
