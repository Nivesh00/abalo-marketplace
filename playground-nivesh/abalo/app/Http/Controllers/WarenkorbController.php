<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use function MongoDB\BSON\toJSON;
use function PHPUnit\Framework\isEmpty;

class WarenkorbController extends Controller
{

    function getCart_api($id)
    {
        $id = DB::table('ab_shoppingcart')->get()->where('ab_creator_id', '=', $id)->toArray();

        if(!count($id))
            return response()->json(['message_empty' => 'no cart']);


        $articles = DB::table('ab_shoppingcart_item')
            ->where('ab_shoppingcart_id', '=', $id[0]->id)
            ->join('ab_article', 'ab_shoppingcart_item.ab_article_id', '=', 'ab_article.id')
            ->select('ab_shoppingcart_item.ab_shoppingcart_id', 'ab_article.ab_name', 'ab_article.id')
            ->get()->toArray();

        return response()->json($articles);

    }

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

    function addToCart_api(Request $request)
    {
        $article_id = $request->post('id');

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

        return response()->json(
            [
                'message' => 'added',
                'ab_shoppingcart_id' => $sp_id
            ]);
    }

    function removeFromCart_api($user_id, $article_id)
    {
        DB::table('ab_shoppingcart_item')->where('ab_article_id', '=', $article_id)->delete();

        $count = DB::table('ab_shoppingcart_item')->get()->toArray();

        if(!count($count))
            DB::table('ab_shoppingcart')->where('ab_creator_id', '=', $user_id)->delete();

        return response()->json(['message' => 'removed', 'cnt' => $count]);

    }
}
