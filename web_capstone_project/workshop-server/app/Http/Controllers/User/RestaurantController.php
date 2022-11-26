<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Validator;

class RestaurantController extends Controller{
    
    function getRestaurants($id = null){
        if(!$id){
            $response = Restaurant::all();
        }else{
            $response = Restaurant::find($id);
        }

        return response()->json([
            "status" => "success",
            "results" => $response
        ], 200);
    }

    function addOrUpdateRestaurant(Request $request, $id = null){
        if(!$id){
            $validate = Validator::make($request->all(), [
                'name' => 'required|min:5',
                'category_id' => 'required',
                'branch' => 'required',
                'phone_number' => 'required',
            ]);
    
            if($validate->fails()){
                return response()->json([
                    "status" => "failed",
                    "results" => []
                ], 400);
            }
            $restaurant = new Restaurant;
        }else{
            $restaurant = Restaurant::find($id);
            if(!$restaurant){
                return response()->json([
                    "status" => "not found",
                    "results" => []
                ], 400);
            }
        }

        $restaurant->name = $request->name ? $request->name : $restaurant->name;
        $restaurant->category_id = $request->category_id ? $request->category_id : $restaurant->category_id;
        $restaurant->branch = $request->branch ? $request->branch : $restaurant->branch;
        $restaurant->phone_number = $request->phone_number ? $request->phone_number : $restaurant->phone_number;

        /*if($request->name){
            $restaurant->name = $request->name;
        }else{
            $restaurant->name = $restaurant->name
        }*/

        return response()->json([
            "status" => "success",
            "results" => []
        ], 200);

    }

}
