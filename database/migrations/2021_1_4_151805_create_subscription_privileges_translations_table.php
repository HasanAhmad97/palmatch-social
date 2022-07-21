<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPrivilegesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_privileges_translations', function (Blueprint $table) {
            $table->id();
            $table->string('text')->nullable();
            $table->string('language');
            $table->unsignedBigInteger('privilege_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('privilege_id')->references('id')->on('subscription_privileges')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_privileges_translations');
    }
}
