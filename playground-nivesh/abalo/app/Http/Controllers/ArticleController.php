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

        //$JSON_response = toJSON($myResult);

        return response()->json($myResult);
    }
}
