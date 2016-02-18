<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    protected
        $table = 'users';

    protected $primaryKey = 'id';

    /**
     * @var array Fillable fields
     */
    protected
        $fillable = ['id', 'token', 'email', 'admin', 'first_name', 'last_name', 'avatar', 'avatar_original', 'gender', 'age', 'city', 'country'];

    protected $hidden = ['token', 'avatar', 'avatar_original', 'admin'];

    /**
     * Return a collection of the user's scores
     * Utilisation : $user->scores !
     * SANS PARENTHESES
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores()
    {
        return $this->hasMany('App\Models\Score');
    }

    /**
     * Renvoie une collection des quizzs auxquels l'utilisateur à participé
     *
     * @return mixed
     */
    public function quizzs()
    {
        return $this->scores->map(function ($item, $key)
        {
            return $item->quizz;
        });
    }

    public function isAdmin()
    {
        return ($this->admin === 1 || $this->admin === true);
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function quizzFilter($id)
    {

    }

    public function scopeQuizz($query, $quizzId)
    {

    }

    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}