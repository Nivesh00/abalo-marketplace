<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewArticleController extends Controller
{
    //
    function verify(Request $request)
    {
        //$name = $request->input('name');
        //$price = $request->input('price');

        /*
        if($request->ajax()) dd($request->all());
        $name = $request->post('name');
        $price = $request->post('price');
        $description = $request->get('description');
        if(strlen($description) <= 0) $description = 'no description';
        */

        $data = $request->all();
        $name = $data['name'];
        $price = $data['price'];
        $description = $data['description'] ;

        if($description === null) $description = 'keine Beschreibung';

        $ok = 0;
        if(strlen($name) > 0 && $price > 0)
            $ok = 1;

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

            return response()->json(['myMessage', 'ok!!']);
        }

        return response()->json(['myMessage', 'not_ok!!']);

    }
}
