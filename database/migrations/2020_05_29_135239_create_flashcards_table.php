<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateFlashcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flashcards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('language');
            $table->string('phonetic_symbol')->nullable();
            $table->string('parts_of_speech');
            $table->string('meaning');
            $table->string('image_path')->nullable();
            $table->string('sound_path')->nullable();
            // 登録者のID
            $table->integer('user_id');
            $table->string('flashcard_title')->nullable();
            $table->integer('coefficient')->default(2);
            $table->timestamp('next_day')->default(Carbon::today());
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
        Schema::dropIfExists('flashcards');
    }
}
