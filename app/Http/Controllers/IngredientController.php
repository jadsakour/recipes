<?php

namespace App\Http\Controllers;
use App\Ingredient;
use App\Recingredient;
use Illuminate\Http\Request;


class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $new_ing = new Ingredient();
        $new_ing->name = $request->name;
        $new_ing->measure = $request->measure;
        $new_ing->supplier_name = $request->supplier_name;
        $new_ing->description = $$request->description;
        $new_ing->save();
        if ($new_ing == null)
         {
            return   response()->json([
                $new_ing, "message" => "Added New Ingrediant"
            ], 200);
        }
         else 
         {
            return  response()->json([
                "message" => "No Things Add"
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recingredients = Recingredient::find($id);

     
        $recingredients->delete();

        return redirect('/');  
    }
}
