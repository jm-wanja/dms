<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('role');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each role has many users
    public function user() {
        return $this->hasMany('User');
    }

}