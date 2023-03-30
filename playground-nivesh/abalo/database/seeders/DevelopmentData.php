<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopmentData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ab_user_FilePath = public_path('/storage/file_data/user.csv');
        $file = fopen($ab_user_FilePath, "r");
        $header = NULL;
        $data = array();

        while(!feof($file))
        {
            if(!$header)
                $header = fgetcsv($file, 1000, ';');

            $data[] = fgetcsv($file, 1000, ';');

        }
        foreach ($data as $row)
        {
            if(is_bool($row)) break;

            DB::table('ab_user')->insert([

                $header[1] => $row[1],
                $header[2] => $row[2],
                $header[3] => $row[3],
            ]);
        }
        fclose($file);

        $ab_articles_FilePath = public_path('/storage/file_data/articles.csv');
        $file = fopen($ab_articles_FilePath, "r");
        $header = NULL;
        $data = array();

        while(!feof($file))
        {
            if(!$header)
                $header = fgetcsv($file, 1000, ';');

            $data[] = fgetcsv($file, 1000, ';');

        }
        foreach ($data as $row)
        {
            if(is_bool($row)) break;

            $row[2] = str_replace('.', '', $row[2]);

            DB::table('ab_article')->insert([

                $header[1] => $row[1],
                $header[2] => $row[2],
                $header[3] => $row[3],
                $header[4] => $row[4],
                $header[5] => date("Y-m-d H:i:s")
            ]);
        }
        fclose($file);


        $ab_articlecategory_FilePath = public_path('/storage/file_data/articlecategory.csv');
        $file = fopen($ab_articlecategory_FilePath, "r");
        $header = NULL;
        $data = array();

        while(!feof($file))
        {
            if(!$header)
                $header = fgetcsv($file, 1000, ';');

            $data[] = fgetcsv($file, 1000, ';');

        }
        foreach ($data as $row)
        {
            if(is_bool($row)) break;

            if(strtolower($row[2]) == 'null')
                $row[2] = NULL;

            DB::table('ab_articlecategory')->insert([

                $header[1] => $row[1],
                $header[2] => $row[2]
            ]);
        }
        fclose($file);
    }
}
