<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Date for SoftDeletes.
     *
     */
    protected $dates = ['deleted_at'];


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_name', 'product_description', 'price'];

    // Many to Many
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // One to Many
    public function images() {
        return $this->hasMany('App\Product_image');
    }

    // One to Many
    public function parameters() {
        return $this->hasMany('App\Product_parameter');
    }
}
