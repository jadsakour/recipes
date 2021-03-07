<?php

namespace App\Http\Controllers;
use App\Recipe;
use App\Ingredient;
use App\Recingredient;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('backend.orders.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->save();
        for ($count = 0; $count < count($request->ingredient); $count++) {
            $ingredients = Ingredient::findORFail((int)$request->ingredient[$count]['ingredient_id']);
            $new_rec_ing = new Recingredient();
            $new_rec_ing->recipes_id = $recipe->id;
            $new_rec_ing->ingredients_id = $request->ingredient[$count]['ingredient_id'];
            $new_rec_ing->quantity = $request->ingredient[$count]['quantity'];
            $new_rec_ing->notes = $request->ingredient[$count]['notes'];
            $new_rec_ing->save();
        }
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Recipe::where('id', $id)->exists()) {
            $recipe = Recipe::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            $rec_ing = Recingredient::where('recipes_id', $id)->get();
            $res = response($recipe, 200);
            $ing = response($rec_ing, 200);
        } else
         {
            $res = response()->json([
                "message" => "Ingredient not found"
            ], 404);
        }
      
        $data = json_decode($res->content(), true);
        $idata=json_decode($ing->content(), true);
  
        return view('backend.orders.show')->with('data', $data)->with('rec_ing',$rec_ing);
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe =  Recipe::find($id);
        $recingredients = Recingredient::where('recipes_id', $id)->get();
        $recipe_ingre = Ingredient::all();
      
        return view('backend.orders.edit')->with('recipe',$recipe)->with('recingredients',$recingredients)->with('recipe_ingre',$recipe_ingre);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe =  Recipe::find($id);
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->save();

    //     for ($count = 0; $count < count($request->ingredient); $count++) {
    //   $recingredients = Recingredient::where('recipes_id', $id)->where('ingredients_id',(int)$request->ingredient[$count]['ingredient_id'])->get();
    //   $recingredients->ingredients_id = $request->ingredient[$count]['ingredient_id'];
    //   $recingredients->quantity = $request->ingredient[$count]['quantity'];
    //   $recingredients->notes = $request->ingredient[$count]['notes'];
    //   $recingredients->save();
    //   echo "update success";
     
        
    //     }
  

        for ($count = 0; $count < count($request->ingredient); $count++) {
            $ingredients = Ingredient::findORFail((int)$request->ingredient[$count]['ingredient_id']);
            $new_rec_ing = new Recingredient();
            $new_rec_ing->recipes_id = $recipe->id;
            $new_rec_ing->ingredients_id = $request->ingredient[$count]['ingredient_id'];
            $new_rec_ing->quantity = $request->ingredient[$count]['quantity'];
            $new_rec_ing->notes = $request->ingredient[$count]['notes'];
            $new_rec_ing->save();
        }
        return $this->index();

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
       $rec_ing = Recingredient::find($id);
       $rec_ing->delete();
       return redirect('/');  

    }
}
