<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    /**
     * @var string Table Name
     */
    protected $table = 'questions';

    /**
     * @var array Fillable Fields
     */
    protected $fillable = [
        'label',
        'theme_id'
    ];

    /**
     * Get the Theme associated with the question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function theme() {
        return $this->hasOne('App\Theme');
    }

    /**
     * Get the answers for this question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers() {
        return $this->hasMany('App\Answer');
    }

    /**
     * Return the quizz that use this question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function quizzs() {
        return $this->belongsToMany('App\Models\Quizz', 'questions_quizzs',
            'question_id', 'quizz_id');
    }
}