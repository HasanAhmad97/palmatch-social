<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->id();
            $table->longText('meet_prople_content')->nullable();
            $table->longText('amazing_feature_content')->nullable();
            $table->longText('stories_content')->nullable();
            $table->longText('membership_content')->nullable();
            $table->longText('register_member_content')->nullable();
            $table->longText('about_us_content')->nullable();
            $table->longText('terms_content')->nullable();
            $table->longText('policy_content')->nullable();
            $table->longText('faqs_content')->nullable();
            $table->string('language');
            $table->unsignedBigInteger('setting_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_translations');
    }
}
