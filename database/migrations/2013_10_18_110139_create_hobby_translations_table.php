<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHobbyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobby_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('language');
            $table->unsignedBigInteger('hobby_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('hobby_id')->references('id')->on('hobbies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobby_translations');
    }
}
