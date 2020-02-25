<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kodeine\Acl\Traits\HasRole;
use App\User;
use App\Events\UserRegistered;

class User extends Authenticatable
{
    use SoftDeletes;
    
    use Notifiable, HasRole;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Date for SoftDeletes.
     *
     */
    protected $dates = ['deleted_at'];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    // One to Many
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    // One to Many
    public function orders()
    {
        return $this->hasMany('App\Order');
    }



    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => UserRegistered::class,
    ];

}
