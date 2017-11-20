<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicDocument extends Model {

    // MASS ASSIGNMENT 
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('title', 'content', 'user_id');

    // LINK THIS MODEL TO OUR DATABASE TABLE
    protected $table = 'public-documents';

    // DEFINE RELATIONSHIPS 
    public function user() {
        return $this->belongsToMany('User', 'users_public-documents', 'public-document_id', 'user_id');
    }

}