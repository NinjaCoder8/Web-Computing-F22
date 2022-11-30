<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;


class AdminMiddleware{

    public function handle(Request $request, Closure $next){

        $user = Auth::user();
        if($user->user_type_id == 2){
            return next($request);
        }else{
            return response()->json([
                "status" => "false"
            ], 401);
        }


        
    }
}
