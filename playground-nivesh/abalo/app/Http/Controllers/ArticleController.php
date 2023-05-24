<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class ArticleController extends Controller
{
    //

    function articlesfound(Request $request)
    {
        $search = $request->query('search');

        $myResult = DB::table('ab_article')->select()
            ->where('ab_name', 'ilike', '%' . $search . '%' )
            ->get()->toArray();

        return view(
            'article',
            [
                'myResult' => $myResult
            ]);
    }

    function getArticles_api($name)
    {
        if ($name == '*') $name = '';


        $myResult = DB::table('ab_article')->select()
            ->where('ab_name', 'ilike', '%' . $name . '%' )
            ->get()->toArray();

        /*
        $myResult = DB::table('ab_article')
            ->join('ab_article_has_articlecategory',
        'ab_article.id', '=', 'ab_article_has_articlecategory.ab_article_id')
            ->join('ab_articlecategory', 'ab_article_has_articlecategory.ab_articlecategory_id',
                '=', 'ab_articlecategory.id')
            ->where('ab_article.ab_name', 'ilike', '%' . $name . '%' )
            ->get([
                'ab_article.ab_name as article_name',
                'ab_articlecategory.ab_name as article_category'
            ])
            ->toArray();
        */
        //$JSON_response = toJSON($myResult);

        return response()->json($myResult);
    }

    function getNameCategory_api($name, $cat){
        if ($name == '*') $name = '';
        if($cat == '*') $cat = '';

        $myResult = DB::table('ab_article')
            ->join('ab_article_has_articlecategory',
                'ab_article.id', '=', 'ab_article_has_articlecategory.ab_article_id')
            ->join('ab_articlecategory', 'ab_article_has_articlecategory.ab_articlecategory_id',
                '=', 'ab_articlecategory.id')
            ->where('ab_article.ab_name', 'ilike', $name . '%' )
            ->where('ab_articlecategory.ab_name', 'ilike', $cat . '%')
            ->get([
                'ab_article.ab_name as article_name',
                'ab_articlecategory.ab_name as article_category'
            ])
            ->toArray();

        //$JSON_response = toJSON($myResult);

        return response()->json($myResult);
    }

    function getCategory_api($name){

        if($name === '*') $name = '';

        $myResult = DB::table('ab_articlecategory')->select()
            ->where('ab_name', 'ilike', '%' . $name . '%' )
            ->get()->toArray();

        return response()->json($myResult);
    }
}
