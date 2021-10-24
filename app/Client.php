<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    protected $casts = [

        'phone' => 'array'

    ];

    protected $fillable = [
        'name', 'phone', 'address'
    ];

    public function orders(){

        return $this->hasMany(Order::class);

    }
}
