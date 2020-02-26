<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
    protected $fillable = ['categoryname', 'category_id'];

    /**
     * Date for SoftDeletes.
     *
     */
    protected $dates = ['deleted_at'];


    //One Level Child Categories
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    //Multi level Child Categories
    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    //One Level Parent Category
    public function parent()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    
    //Multi level Parent Categories
    // public function parentCategories()
    // {
    //     return $this->belongsToMany(Category::class)->with('parent');
    // }

    // One to Many
    public function products() {
        return $this->hasMany('App\Product');
    }
    
}
