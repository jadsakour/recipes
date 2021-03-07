<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';
    protected $fillable = [
        'name', 'measure', 'description', 'supplier_name'
    ];
    public function recingredients()
    {
        return $this->hasMany(Recingredient::class);
    }

}
