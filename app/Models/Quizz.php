<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        $this->actif = false;
    }
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
        'image_lot',
        'titre_lot',
        'desc_lot'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function theme()
    {
        return $this->belongsTo('App\Models\Theme');
    }

    public function users()
    {
        return $this->hasManyThrough('App\Models\User','App\Models\Score');
    }

    /**
     * Return a collection of the quizz scores
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores()
    {
        return $this->hasMany('App\Models\Score','quizz_id');
    }

    /**
     * Get this quizz's questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'questions_quizzs',
            'quizz_id', 'question_id');
    }
}