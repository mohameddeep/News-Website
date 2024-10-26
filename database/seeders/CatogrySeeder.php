<?php

namespace Database\Seeders;

use App\Models\Catogry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CatogrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catogries=["sport catogry","fashion catogry","technolgy catogry"];

        foreach($catogries as $catogry){
            Catogry::create([
                "name" =>$catogry,
                "slug" =>Str::slug($catogry),
                "status" =>1,
            ]);
        }
    }
}
