<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqTopic extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'route', 'weight'];
}
