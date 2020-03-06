<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Date for SoftDeletes.
     *
     */
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}