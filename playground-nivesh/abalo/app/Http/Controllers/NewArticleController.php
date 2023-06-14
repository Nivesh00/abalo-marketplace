<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

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

            return response()->json(['myMessage' => 'ok!!']);
        }

        return response()->json(['myMessage' => 'not_ok!!']);

    }

    function addArticle_api(Request $request)
    {


        $name = trim($request->post('name'));
        $price = trim($request->post('price'));
        $description = trim($request->post('description'));


        /*
         * If curl in Terminal used

        if(file_get_contents("php://input") != null)
        {

            $curl_arr = file_get_contents("php://input");
            $curl_arr = str_replace('{', '', $curl_arr);
            $curl_arr = str_replace('}', '', $curl_arr);
            $curl_arr = explode(',', $curl_arr);

            for ($i = 0; $i < sizeof($curl_arr); $i++) {
                $curl_arr[$i] = explode(":", $curl_arr[$i]);
            }

            $curl_data = array();
            foreach ($curl_arr as $row) {
                $curl_data[$row[0]] = $row[1];
            }

            $name = trim($curl_data['name']);
            $price = trim($curl_data['price']);
            if ($curl_data['description']) $description = trim($curl_data['description']);
        }
        */
        if(!isset($description)) $description = 'Keine Beschreibung';
        if(!isset($name) || !isset($price) || $price <= 0)
        {
            return response()->json(
                [
                   'message' => 'Fehler, Artikel nicht gueltig!',
                    'name' => $name,
                    'price' => $price,
                    'description' => $description,
                    'tst' => file_get_contents("php://input")
                ]);
        }

        DB::table('ab_article')->insert(
            [
                'ab_name' => $name,
                'ab_price' => $price,
                'ab_description' => $description,
                'ab_creator_id' => 1,
                'ab_createdate' => now()
            ]
        );

        $id = DB::table('ab_article')->get('id')->last();

        return response()->json(
            [
                'id' => $id
            ]
        );

    }
}
