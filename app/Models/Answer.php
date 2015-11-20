<?php

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * @var string Table name
     */
    protected $table = 'answers';

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'question_id',
        'label',
        'correct'
    ];

    /**
     * Get the question this answer belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question() {
        return $this->belongsTo('App\Question');
    }

}