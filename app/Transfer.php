<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table = 'transfers';
    protected $fillable = ['name','address','cart','image','status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
