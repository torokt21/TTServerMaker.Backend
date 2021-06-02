<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqTopic;

class FaqTopicController extends Controller
{
    public function index()
    {
        return FaqTopic::select('title', 'route')->orderBy('weight', 'asc')->get();
    }
}
