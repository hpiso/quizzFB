<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    /**
     * @var string Table name
     */
    protected $table = 'themes';

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'label',
        'description',
        'color_nav',
        'color_elements',
        'logo'
    ];

    /**
     * The quizz that have this theme
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function quizzs() {
        return $this->belongsToMany('App\Models\Quizz');
    }

    /**
     * The questions that have this theme
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions() {
        return $this->belongsToMany('App\Question');
    }
}