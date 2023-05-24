<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class article_has_articlecategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if($file = fopen(storage_path('file_data/article_has_articlecategory.csv'), 'r')){

            fgetcsv($file, 100, ';');

            while($data = fgetcsv($file, 100, ';')){
                DB::table('ab_article_has_articlecategory')
                    ->insert([
                        'ab_articlecategory_id' => $data[0],
                        'ab_article_id' => $data[1]
                    ]);
            }

            fclose($file);
        }
    }
}
