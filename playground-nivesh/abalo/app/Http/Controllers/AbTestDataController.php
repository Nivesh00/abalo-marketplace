<?php

namespace App\Http\Controllers;

use App\Models\AbTestData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbTestDataController extends Controller
{
    public function getAllEquipment(){


        //$all_equipment = DB::table('ab_testdata')->select()->get();

        $all_equipment = DB::select('SELECT * FROM abalo.ab_testdata');

        return view('AbTestData', [ 'all_equipment' => $all_equipment ]);
    }
}
