<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReligionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('religion_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('language');
            $table->unsignedBigInteger('religion_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('religion_translations');
    }
}
