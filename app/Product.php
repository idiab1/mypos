<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model
{
    use Translatable;

    protected $guarded = ['id'];
    public $translatedAttributes = ['name', 'description'];
    protected $appends = ['image_path', 'profit_percent'];


    // Get image path attribute
    public function getImagePathAttribute()
    {
        return asset('uploads/products/' . $this->image);
    }

    public function getProfitPercentAttribute()
    {
        $profit = $this->sale_price - $this->purchase_price;
        $profit_percent = ($profit * 100) / $this->purchase_price;
        return number_format($profit_percent, 2);
    }

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class, "product_order");
    }
}
