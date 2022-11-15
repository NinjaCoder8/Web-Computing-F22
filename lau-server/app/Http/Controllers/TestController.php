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

}
