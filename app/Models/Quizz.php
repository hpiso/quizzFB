<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Quizz extends Model {

    /**
     * @var string Table Name
     */
    protected $table = 'quizzs';

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'label',
        'description',
        'starting_at',
        'ending_at',
        'actif',
        'max_question',
        'theme_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function theme() {
        return $this->belongsTo('App\Models\Theme');
    }

    /**
     * Get this quizz's questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions() {
        return $this->belongsToMany('App\Models\Question', 'questions_quizzs',
            'quizz_id', 'question_id');
    }
}