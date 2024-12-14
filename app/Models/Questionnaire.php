<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'shop_name',

        'title',
        'description',
        'image',
        'address',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
