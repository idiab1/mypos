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
    protected $appends = ['image_path'];


    // Get image path attribute
    public function getImagePathAttribute()
    {
        return asset('uploads/products/' . $this->image);
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
}
