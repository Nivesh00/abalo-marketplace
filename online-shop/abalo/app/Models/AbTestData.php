<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AbTestData extends Model
{
    use HasFactory;

   /*

    public static function AllEquipment(){

        return DB::select('SELECT `ab_testname` FROM ab_testdata');
    }

    public static function CountEquipment($name){

        return DB::select('SELECT count("id") FROM ab_testdata WHERE ab_testname = ?', array($name));
    }

   */

    protected $table = 'ab_testdata';
    public $primaryKey = 'id';
    public $timestamps = false;
}
