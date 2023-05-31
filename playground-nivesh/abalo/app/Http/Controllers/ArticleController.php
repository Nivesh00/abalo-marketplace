<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ArticleController extends Controller
{
    //

    function articlesfound(Request $request)
    {
        $search = $request->query('search');
        $page = intval($request->get('page'));

        $pages = ceil((DB::table('ab_article')
                ->select()
                ->where('ab_name', 'ilike', '%' . $search . '%' )
                ->count())/20);


        if($page < 1) $page = 1;
        elseif ($page > $pages) $page = $pages;


        $myResult = DB::table('ab_article')->select()
            ->where('ab_name', 'ilike', '%' . $search . '%' )
            ->skip(($page - 1) * 20)->take(20)
            ->get()->toArray();

        $pagerange[] = $page;
        $pos = 1;

        while(sizeof($pagerange) < 5 && $pos < 5)
        {
            if($page - $pos > 0) $pagerange[] = $page - $pos;
            if($page + $pos <= $pages) $pagerange[] = $page + $pos;
            $pos++;
        }
        sort($pagerange);

        return view(
            'article',
            [
                'myResult' => $myResult,
                'search' =>$search,
                'page' => $page,
                'pages' => $pages,
                'pagerange' => $pagerange
            ]);
    }

    function getArticles_api($name)
    {

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
        //if ($name == '*') $name = '';
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
            ->where('ab_parent', 'IS NOT', DB::raw('null'))
            ->get()->toArray();

        return response()->json($myResult);
    }
}
