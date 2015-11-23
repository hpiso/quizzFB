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
        'id_theme',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function theme() {
        return $this->belongsTo('App\Models\Theme','id_theme');
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