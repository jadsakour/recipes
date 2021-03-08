<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use App\Order;
use App\OrderDetail;
use App\Recingredient;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Break_;

class OrderController extends Controller
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
        $date = Carbon::now();
        $t1 = Carbon::parse(strtotime($request->date)); // Format Date 2022-03-06 21:00
        if ($t1 >= Carbon::today()->subDays(2)) {

            $neworder = new Order();
            $neworder->status = $request->status; // defualt value is 0 ( not delivery)
            $neworder->delivery_date = $t1;
            $neworder->save();
            for ($count = 0; $count < count($request->recipes); $count++) {
                if ($count == 4) {
                    break;
                } else {
                    $recipe = Recipe::findORFail((int)$request->recipes[$count]['recipes_id']);
                    $new_order_details = new OrderDetail();
                    $new_order_details->recipes_id = $recipe->id;
                    $new_order_details->orders_id = $neworder->id;
                    $new_order_details->notes = $request->recipes[$count]['notes'];
                    $new_order_details->save();
                }
            }
            return   response()->json([
                $neworder, "message" => "The receipt of the request"
            ], 200);
        } else {
            return  response()->json([
                "message" => "Delivery date denied"
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
        //
    }
    public function GetQuantity(Request $request)
    {
    
        $date = Carbon::parse($request->date);// Format Date 2022-03-06 21:00
        $dates = Carbon::parse($request->date);
        $daysToAdd = 7;
        $dates = $dates->addDays($daysToAdd);
        $orders = Order::select("*")
            ->whereBetween('delivery_date', [$date, $dates])
            ->get();
        $counter = 0;
        for ($i = 0; $i < count($orders); $i++) {
            $ord_arr[$i] = OrderDetail::select("*")->where('orders_id', '=', $orders[$i]->id)->get();

            if (count($ord_arr[$i]) != 0) {
                for ($j = 0; $j < count($ord_arr[$i]); $j++) {
                    $o_arr[$i][$j] = $ord_arr[$i][$j]['id'];
                    $rec_arr[$counter] = $ord_arr[$i][$j]['recipes_id'];
                    $counter++;
                }
            }
        }
        $allingradiants = Ingredient::all();
        $ingradiants_arr = ["id" => [], "name" => [], "qu" => [],];
        for ($c = 0; $c < count($allingradiants); $c++) {

            $ingradiants_arr[$c]['id'] = $allingradiants[$c]['id'];
            $ingradiants_arr[$c]['name'] = $allingradiants[$c]['name'];
            $ingradiants_arr[$c]['name'] = $allingradiants[$c]['measure'];
            $ingradiants_arr[$c]['qu'] = 0;
        }
        $recdetials = Recingredient::all();
        for ($k = 0; $k < count($rec_arr); $k++) {
            for ($ck = 0; $ck < count($recdetials); $ck++) {
                if ($rec_arr[$k] == $recdetials[$ck]['recipes_id']) {
                    for ($f = 0; $f < count($ingradiants_arr) / 4; $f++) {
                        if ($ingradiants_arr[$f]['id'] == $recdetials[$ck]['ingredients_id']) {
                            $ingradiants_arr[$f]['qu'] += $recdetials[$ck]['quantity'];
                        }
                    }
                }
            }
        }
        return   response()->json([
            $ingradiants_arr, "message" => "Quantities required within the seven days"
        ], 200);
    }
}
