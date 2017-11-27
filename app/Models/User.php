<?php

namespace App\Models;

// use Illuminate\Auth\Authenticatable;
// use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Support\Facades\Hash;
// use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model 
// implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    // use Authenticatable, Authorizable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','id','created_at', 'updated_at'
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    // /**
    //  * Get the identifier that will be stored in the subject claim of the JWT.
    //  *
    //  * @return mixed
    //  */
    //  public function getJWTIdentifier()
    //  {
    //       return $this->getKey();
    //  }
    //  /**
    //   * Return a key value array, containing any custom claims to be added to the JWT.
    //   *
    //   * @return array
    //   */
    //  public function getJWTCustomClaims()
    //  {
    //       return [];
    //  }

    // DEFINE RELATIONSHIPS
    // each user HAS one private document
    public function privateDocument() {
        return $this->hasOne('PrivateDocument');
    }

    public function role() {
        return $this->belongsTo('Role');
    }

    // each user BELONGS to many public documents
    // define our pivot table also
    public function publicDocument() {
        return $this->belongsToMany('PublicDocument', 'user_public-document', 'user_id', 'public-document_id');
    }
}