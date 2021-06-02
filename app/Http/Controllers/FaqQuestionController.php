<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqQuestion;

class FaqQuestionController extends Controller
{
    public function index($topic_slug = null)
    {
        $query = FaqQuestion::select('faq_questions.title', 'faq_questions.route', 'faq_topics.title as topic')
            ->join('faq_topic_question_conns', 'faq_topic_question_conns.faq_question_id', '=', 'faq_questions.id')
            ->join('faq_topics', 'faq_topics.id', '=', 'faq_topic_question_conns.faq_topic_id')
            ->where('faq_questions.hidden', false)->orderBy('faq_questions.weight', 'asc');
        if ($topic_slug !== null) {

            $query = $query->where('faq_topics.route', $topic_slug);
        }

        return $query->get();
    }

    public function show($slug)
    {
        return FaqQuestion::where('route', $slug)->first();
    }
}
