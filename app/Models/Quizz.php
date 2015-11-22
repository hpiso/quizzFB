<?php

namespace App\Models;

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
     * Get the Theme associated with the quizz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function theme() {
        return $this->hasOne('App\Theme');
    }

    /**
     * Get this quizz's questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions() {
        return $this->hasMany('App\Question');
    }
}