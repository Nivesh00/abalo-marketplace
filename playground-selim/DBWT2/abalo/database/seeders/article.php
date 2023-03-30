<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class article extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $file_path = __DIR__ . '/../../storage/data/articles.csv';

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
                $ab_price = $values[2];
                $ab_price = str_replace('.', '', $ab_price);
                $ab_price = intval($ab_price);
                $ab_description = $values[3];
                $ab_creator_id = $values[4];
                $ab_createdate = $values[5];

                DB::table('ab_article')->insert([
                    "id" => $id,
                    "ab_name" => $ab_name,
                    "ab_price" => $ab_price,
                    "ab_description" => $ab_description,
                    "ab_creator_id" => $ab_creator_id,
                    "ab_createdate" => $ab_createdate,
                ]);

            }
        }
        fclose($file);
    }
}
