<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banners';

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
    protected $fillable = ['bannername', 'bannerimage', 'category_id'];

    /**
     * Date for SoftDeletes.
     *
     */
    protected $dates = ['deleted_at'];

    // Many to One
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}