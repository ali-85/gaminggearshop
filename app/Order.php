<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['name','address','cart','payment_id','status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
