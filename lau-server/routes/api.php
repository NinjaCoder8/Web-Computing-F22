<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;

Route::group(["prefix" => "v0.1"], function(){
    Route::group(["prefix" => "admin"], function(){
        Route::get("remove_user", [TestController::class, "removeUser"]);
    });
    Route::get("articles", [TestController::class, "getArticles"]);
    Route::post("add_article/{id?}", [TestController::class, "addorUpdateArticle"]);

    Route::post("signup", [TestController::class, "signup"]);
    Route::post("login", [TestController::class, "login"]);
    Route::get("all_students", [TestController::class, "getAllStudents"]);
    Route::get("block_student/{id}", [TestController::class, "blockStudent"]);


});

Route::group(["prefix" => "v0.2"], function(){
    Route::get("test_api/{var}/{var2}", [TestController::class, "getArticlesV2"]);
});



