<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

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
