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
        $fillable = ['id', 'token', 'email', 'admin', 'first_name', 'last_name', 'avatar', 'avatar_original', 'gender'];


    public function isAdmin()
    {
        return ($this->admin === 1 || $this->admin === true);
    }

    public function getAuthIdentifier()
    {
        return $this->id;
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