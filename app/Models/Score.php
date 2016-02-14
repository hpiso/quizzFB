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
        'score',
    ];

    /**
     * Return the quizz associated with this score
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quizz()
    {
        return $this->belongsTo('App\Models\Quizz');
    }

    /**
     * Return the score associated with this score
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}