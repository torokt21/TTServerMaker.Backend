<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_topics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('route')->unique();
            $table->unsignedInteger('weight')->default(500);
            $table->timestamps();
        });

        Schema::create('faq_questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longtext('body');
            $table->string('route')->unique();
            $table->unsignedInteger('weight')->default(500);
            $table->boolean('hidden')->default(false);
            $table->timestamps();
        });

        // Connecting table
        Schema::create('faq_topic_question_conns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_topic_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('faq_question_id')
                ->constrained()
                ->onDelete('cascade');
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
        Schema::dropIfExists('faq');
        Schema::dropIfExists('faq_topic');
        Schema::dropIfExists('faq_topic_answer_conn');
    }
}
