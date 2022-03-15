<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_name');
            $table->string('genre');//удалить
            $table->date('releaseDate');
            $table->string('developer');
            $table->string('publisher');
            $table->float('rating');
            $table->text('description');
            $table->timestamps();
        });
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('genre_name');
            $table->string('games');//удалить
            $table->timestamps();
        });
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('developer_name');
            $table->string('publishers');
            $table->string('games');//удалить
            $table->timestamps();
        });
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('publisher_name');
            $table->string('developers');//надо удалить
            $table->string('games');//удалить
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
        Schema::dropIfExists('games');
    }
}
