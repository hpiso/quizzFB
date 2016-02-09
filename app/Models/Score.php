<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /**
     * @var string Table name
     */
    protected $table = 'scores';

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'fb_id',
        'quizz_id',
        'question_id',
        'answer_id',
        'time',
        'correct'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quizz()
    {
        return $this->belongsTo('App\Models\Quizz');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo('App\Models\Answer');
    }


}