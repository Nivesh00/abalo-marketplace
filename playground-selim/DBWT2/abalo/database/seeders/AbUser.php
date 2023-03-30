<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AbUser extends Seeder
{

    public function run(): void
    {
        //
        $file_path = __DIR__ . '/../../storage/data/user.csv';

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
                $name = $values[1];
                $username = $values[2];
                $email = $values[3];

                DB::table('ab_user')->insert([
                    "id" => $id,
                    "ab_name" => $name,
                    "password" => $username,
                    "ab_mail" => $email,
                ]);

            }
        }
        fclose($file);
    }
}
