<?php

namespace App\Http\Controllers;

use App\Models\ab_article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Ratchet\Client\WebSocket;
use function MongoDB\BSON\toJSON;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;
use function Ratchet\Client\connect;

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
                ->count())/5);


        if($page < 1) $page = 1;
        elseif ($page > $pages) $page = $pages;


        $myResult = DB::table('ab_article')->select()
            ->where('ab_name', 'ilike', '%' . $search . '%' )
            ->skip(($page - 1) * 5)->take(5)
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

    function getNSArticles_api($name, $cat, $page)
    {

        if($name === '*') $name = '';
        if($cat === 'Kategorie') $cat = '';

        $myResult = DB::table('ab_article')
            ->join('ab_article_has_articlecategory',
                'ab_article.id', '=', 'ab_article_has_articlecategory.ab_article_id')
            ->join('ab_articlecategory', 'ab_article_has_articlecategory.ab_articlecategory_id',
                '=', 'ab_articlecategory.id')
            ->where('ab_article.ab_name', 'ilike', $name . '%' )
            ->where('ab_articlecategory.ab_name', 'ilike', $cat . '%')
            ->get([
                'ab_article.id as id',
                'ab_article.ab_name as name',
                'ab_articlecategory.ab_name as cat',
                'ab_article.ab_description as descr',
                'ab_article.ab_price as price'
            ])
            ->skip(($page -1) * 10)
            ->take(10)
            ->toArray();

        $i = (($page - 1) * 10) + 1;
        foreach ($myResult as $result)
        {
            $result->num = $i++;
        }

        return $myResult;
    }

    function sold_api($id)
    {
        $data = DB::table('ab_article')->get()->where('id', '=', $id)->toArray()[0];

        //$msg = "Großartig! Ihr Artikel" . $data['ab_name'] . "wurde erfolgreich verkauf!";


        //require '../../../vendor/autoload.php';

        \Ratchet\Client\connect('ws://localhost:8085/sold/user=' . $data->ab_creator_id)
            ->then(function($conn) use ($data) {
                $conn->send("Großartig! Ihr Artikel " . $data->ab_name . " wurde erfolgreich verkauf!");
                $conn->close();
            }, function ($e) {
                echo "Could not connect: {$e->getMessage()}\n";
            });

        return response()->json($data);

    }


    public function getmyarticles(){

        $data = DB::table('ab_article')->get()
            ->where('ab_creator_id', '=', 5)->toArray();

        return view('deal', ['data' => $data]);
    }

    public function deal_api($id){
        $data = DB::table('ab_article')->get()
            ->where('id', '=', $id)->toArray()[$id - 1];

        \Ratchet\Client\connect('ws://localhost:8085/deal')
            ->then(function($conn) use ($id, $data) {
                $conn->send('Der Artikel ' . $data->ab_name .
                    ' wird nun günstiger angeboten! Greifen Sie schnell zu');
                $conn->send('id is ' . $id);

                $conn->close();
            }, function ($e) {
                echo "Could not connect: {$e->getMessage()}\n";
            });
    }

}
