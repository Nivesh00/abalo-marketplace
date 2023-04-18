<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
