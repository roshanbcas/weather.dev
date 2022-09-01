<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::truncate();
  
        $csvFile = fopen(base_path("database/data/cities_list.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                location::create([
                    "city" => $data['0'],
                    "lon" => $data['1'],
                    "lat" => $data['2'],
                    "country" => $data['3']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}