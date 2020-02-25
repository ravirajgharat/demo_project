<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\OrderPlaced;
use App\Events\OrderStatusChanged;

class Order extends Model
{
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
    protected $fillable = ['user_id', 'order_status', 'coupon', 'discount'];

    // One to Many
    public function details() {
        return $this->hasMany('App\Order_detail');
    }

    // Many to One
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => OrderPlaced::class,
        'updated' => OrderStatusChanged::class,
    ];

}