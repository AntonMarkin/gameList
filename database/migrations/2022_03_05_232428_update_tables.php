<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table){
            $table->renameColumn('developer', 'developer_id');
            $table->renameColumn('publisher', 'publisher_id');
            $table->string('image_path');
        });
        Schema::table('genres', function (Blueprint $table){
            $table->dropColumn('games');
        });
        Schema::table('developers', function (Blueprint $table){
            $table->dropColumn('games');
            $table->renameColumn('publishers', 'publisher_id');
        });
        Schema::table('publishers', function (Blueprint $table){
            $table->dropColumn(['developers', 'games']);
        });
        Schema::create('games_genres', function (Blueprint $table){
            $table->integer('game_id');
            $table->integer('genre_id');
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

