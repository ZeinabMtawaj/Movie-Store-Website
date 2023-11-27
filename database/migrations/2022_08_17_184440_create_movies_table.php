<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('vote_count');
            $table->string('original_title');
            // $table->json('spoken_language');
            $table->string('poster_path')->nullable();
            $table->longText('overview');
        
            $table->json('genres')->nullable();
            $table->json('similar_content')->nullable();
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
        Schema::dropIfExists('movies');
    }
}
