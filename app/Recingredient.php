<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Recingredient extends Model
{
    protected $table = 'recingredients';
    protected $fillable = [
        'recipes_id', 'ingredients_id', 'quantity', 'notes'
    ];
    public function ingredients()
    {
        return $this->belongsTo(Ingredient::class);
    }
    public function recipes()
    {
        return $this->belongsTo(Recipe::class);
    }

}
