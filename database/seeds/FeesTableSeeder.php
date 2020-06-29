<?php

use Illuminate\Database\Seeder;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees')->insert([
            'content' => '～59万',
        ]);
        DB::table('fees')->insert([
            'content' => '60万～',
        ]);
        DB::table('fees')->insert([
            'content' => '70万～',
        ]);
        DB::table('fees')->insert([
            'content' => '80万～',
        ]);
        DB::table('fees')->insert([
            'content' => '90万～',
        ]);
        DB::table('fees')->insert([
            'content' => '100万～',
        ]);
        DB::table('fees')->insert([
            'content' => '非公開',
        ]);
    }
}
