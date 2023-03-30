<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class articlecategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $file_path = __DIR__ . '/../../storage/data/articlecategory.csv';

        $file = fopen($file_path, "r");

        $first_line = fgets($file);
        //$header = explode(';',$first_line); //speichere spalten namen


        while (!feof($file))
        {
            $line = fgets($file);
            if (!empty($line))
            {
                $values = explode(';', $line);
                $id = $values[0];
                $ab_name = $values[1];
                $ab_parent = $values[2];
                if($ab_parent != "NULL")
                    $ab_parent = intval($ab_parent);
                else
                    $ab_parent = null;

                DB::table('ab_articlecategory')->insert([
                    "id" => $id,
                    "ab_name" => $ab_name,
                    "ab_description" => null,
                    "ab_parent" => $ab_parent,
                ]);

            }
        }
        fclose($file);
    }
}
