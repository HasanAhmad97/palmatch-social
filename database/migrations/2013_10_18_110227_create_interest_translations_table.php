<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('language');
            $table->unsignedBigInteger('interest_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interest_translations');
    }
}
