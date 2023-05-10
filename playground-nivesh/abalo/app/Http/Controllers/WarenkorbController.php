<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use function MongoDB\BSON\toJSON;

class WarenkorbController extends Controller
{
    //
    function cartAction(Request $request)
    {

        $article = $request->post('article');
        $action = $request->post('action');

        $article_obj = DB::table('ab_article')->get()->where('ab_name', '=', $article)->toArray();

        $article_id = null;
        foreach ($article_obj as $article_id)
            $article_id = $article_id->id;

        if($action == 'add') $this->addToCart($article_id);
        else $this->removeFromCart($article_id);

    }

    function addToCart($article_id)
    {
        $warenkorb_arr = DB::table('ab_shoppingcart')->get()->
        where('ab_creator_id', '=', '1')->toArray(); //user id

        if(sizeof($warenkorb_arr) == 0)
        {
            DB::table('ab_shoppingcart')->insert(
                [
                    'ab_creator_id' => 1,
                    'ab_createdate' => now()
                ]);

            $warenkorb_arr = DB::table('ab_shoppingcart')->get()->
            where('ab_creator_id', '=', '1')->toArray();
        }

        $sp_id = null;
        foreach ($warenkorb_arr as $warenkorb)
            $sp_id = $warenkorb->id;



        DB::table('ab_shoppingcart_item')->insert(
            [
                'ab_shoppingcart_id' => $sp_id,
                'ab_article_id' => $article_id,
                'ab_createdate' => now()
            ]);

        return response()->json(['message' => 'added']);
    }

    function removeFromCart($article_id)
    {
        DB::table('ab_shoppingcart_item')->where('ab_article_id', '=', $article_id)->delete();

        $count = DB::table('ab_shoppingcart_item')->get()->toArray();

        if(sizeof($count) == 0)
            DB::table('ab_shoppingcart')->where('ab_creator_id', '=', 1)->delete();

        return response()->json(['message' => 'removed']);

    }
}
