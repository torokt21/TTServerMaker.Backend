<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqQuestion;
use App\Models\FaqTopic;
use App\Models\FaqTopicQuestionConn;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number_of_topics = 5;
        $number_of_questions = 50;

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        FaqTopicQuestionConn::truncate();
        FaqQuestion::truncate();
        FaqTopic::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        // Generating random topics
        for ($i = 0; $i < $number_of_topics; $i++) {
            FaqTopic::create([
                'title' => $faker->sentence,
                'route' => $faker->slug,
                'weight' => $faker->randomNumber,
            ]);
        }

        // Generating random questions
        for ($i = 0; $i < $number_of_questions; $i++) {
            FaqQuestion::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'route' => $faker->slug,
                'weight' => $faker->randomNumber,
                'hidden' => $faker->boolean,
            ]);
        }

        // Assigning the questions to topics (works, since the truncate method reset all id-s to one)
        // Generating random questions
        for ($i = 0; $i < $number_of_questions; $i++) {
            FaqTopicQuestionConn::create([
                'faq_question_id' => rand(1, $number_of_questions),
                'faq_topic_id' => $i,
            ]);
        }
    }
}
