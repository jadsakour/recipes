<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';
    protected $fillable = [
        'name', 'description'
    ];
    public function recingredients()
    {
        return $this->hasMany(Recingredient::class);
    }
}
