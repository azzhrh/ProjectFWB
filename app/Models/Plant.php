<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    public function category()
{
    return $this->belongsTo(Category::class);
}

public function transactions()
{
    return $this->hasMany(Transaction::class);
}
    protected $fillable = ['name', 'description', 'price', 'category_id','stock', 'image'];

}
