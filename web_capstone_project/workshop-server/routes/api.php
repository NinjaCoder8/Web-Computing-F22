<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\RestaurantController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\MessageController;

Route::group(["prefix" => "v0.1"], function(){
    //authenticated apis
    Route::group(["middleware" => "admin.auth"], function(){
        Route::group(["prefix" => "user"], function(){
            Route::group(["prefix" => "restaurants"], function(){
                Route::get("test", [RestaurantController::class, "test"])->name("route-login");
                Route::post("add/{id?}", [RestaurantController::class, "addOrUpdateRestaurant"]);
            });
    
            /*Route::group(["prefix" => "products"], function(){
                Route::post("add/{id?}", [ProductController::class, "addOrUpdateProduct"]);
            });
    
            Route::group(["prefix" => "messages"], function(){
                Route::get("{id?}", [MessageController::class, "getMessages"]);
                Route::post("send", [MessageController::class, "sendMessage"]);    
            });*/
        });
    });

   /* Route::group(["prefix" => "user"], function(){
        Route::group(["prefix" => "restaurants"], function(){
            Route::get("search/{keyword}", [RestaurantController::class, "searchRestaurant"]);    
            //Route::get("{id?}", [RestaurantController::class, "getRestaurants"]);
        });

        Route::group(["prefix" => "products"], function(){
            Route::get("{id?}", [ProductController::class, "getProducts"]);
            Route::get("search/{keyword}", [ProductController::class, "searchProduct"]);    
        });
    });*/
});