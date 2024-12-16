<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'questionnaire_id',
        'question',
        'question_type',
        'options',
        'order',
        'required',
        'description',
        'image',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class)
            ->where('user_id', auth()->user()->id)
            ->withDefault();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
