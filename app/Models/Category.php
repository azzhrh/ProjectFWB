<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function plants()
{
    return $this->hasMany(Plant::class);
}

}
