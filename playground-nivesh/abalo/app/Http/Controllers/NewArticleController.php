<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewArticleController extends Controller
{
    //
    function verify(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        if(strlen($description) <= 0) $description = 'no description';


        $ok = 0;
        if(strlen($name) > 0 && $price > 0)
            $ok = 1;

        /*
        $rslt = DB::table('ab_article')->select()->where('ab_name', '=', $name)
            ->get()->toArray();

        if(!sizeof($rslt))
            $ok = 1;
        */

        if($ok)
        {
            DB::table('ab_article')->insert(
                [
                    'ab_name' => $name,
                    'ab_price' => $price,
                    'ab_description' => $description,
                    'ab_creator_id' => 1,//session()->get('user_id'),
                    'ab_createdate' => now()
                ]);

            return view('M02.newarticle',
            [
                'status' => true
            ]);
        }

        return view('M02.newarticle',
            [
                'status' => false
            ]);
    }
}
