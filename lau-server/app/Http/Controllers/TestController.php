<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class TestController extends Controller{
   
    function getArticles(){
        $articles = Article::all();
        /*$article = Article::find(5);
        $articles = Article::where("title", "Row2")
                        ->where("count_views", 5)
                        ->get();
        $articles = Article::whereIn("id", [1, 5])->get();*/

        return response()->json([
            "results" => $articles
        ]);
    }


    function addorUpdateArticle(Request $request, $id = null ){
        if($id){
            $article = Article::find($id);
            $article->count_views = $article->count_views + 1;
        }else{
            $article = new Article;
            $article->count_views = 0;
        }
        
        $article->title = $request->title;
        $article->author = $request->author;
        
        if($article->save()){
            return response()->json([
                "result" => true 
            ]);
        }

    }

    function signUp(Request $request){

        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()){
            return response()->json([
                "result" => true 
            ]);
        }
    }

    function login(Request $request){

        $user = User::where("email", $request->email)
                        ->where("password", bcryprt($request->password))
                        ->get();

        if($user){
            return response()->json([
                "id" => $user->id 
            ]);
        }else{
            return response()->json([
                "id" => -1 
            ]);
        }
    }

    function block($id){

        $user = User::find($id);
        $user->is_blocked = 1;
        $user->save();

        return response()->json([
            "result" => true 
        ]);
    }

    function getAllStudents(){

        $users = User::where("is_blocked", 0)
                            ->sortBy("created_at", "ASC")
                            ->get();

        return response()->json([
            "result" => $users 
        ]);
    }
}
