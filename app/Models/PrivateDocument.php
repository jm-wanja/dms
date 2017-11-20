<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateDocument extends Model {

    // MASS ASSIGNMENT
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('title', 'content', 'user_id');

    
    protected $table = 'private-documents';

    // DEFINE RELATIONSHIPS
    public function user() {
        return $this->belongsTo('User');
    }

}