<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
    use SoftDeletes;

    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }
    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }
    
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
    protected $fillable = ['product_name', 'product_description', 'price', 'quantity'];

    // Many to Many
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // One to Many
    public function images()
    {
        return $this->hasMany('App\Product_image');
    }

    // One to Many
    public function parameters()
    {
        return $this->hasMany('App\Product_parameter');
    }
}