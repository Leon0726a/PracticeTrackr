<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime; 

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communities')->insert([
            'name' => '吹奏楽',
            'explanation' => '吹奏楽について話す場所', 
            'url' => 'https://res.cloudinary.com/dudymuktn/image/upload/v1701316310/suisougaku_i6n2w1.png', 
            'created_at' => new DateTime(), 
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('communities')->insert([
            'name' => 'ピアノ',
            'explanation' => 'ピアノ奏者のためのコミュニティ', 
            'url' => 'https://res.cloudinary.com/dudymuktn/image/upload/v1701316311/pexels-george-becker-112989_vfdcc2.jpg', 
            'created_at' => new DateTime(), 
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('communities')->insert([
            'name' => 'jazz',
            'explanation' => 'ジャズ愛好家のためのコミュニティ', 
            'url' => 'https://res.cloudinary.com/dudymuktn/image/upload/v1701316660/dolo-iglesias-z9z6u1rn7sY-unsplash_hp6qgi.jpg', 
            'created_at' => new DateTime(), 
            'updated_at' => new DateTime(),
        ]);
    }
}
