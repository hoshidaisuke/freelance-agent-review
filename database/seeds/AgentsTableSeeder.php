<?php

use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents')->insert([
            'name' => 'レバテックフリーランス',
            'fee_id' => '3',
            'welfare' => true,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'ギークスジョブ',
            'fee_id' => '4',
            'welfare' => true,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'Midworks',
            'fee_id' => '4',
            'welfare' => true,
            'remote' => true,
            'site' => true,
            'highprice' => false,
            'margin' => true,
        ]);
        DB::table('agents')->insert([
            'name' => 'フューチャリズム',
            'fee_id' => '3',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'PE-BANK',
            'fee_id' => '3',
            'welfare' => true,
            'remote' => false,
            'site' => false,
            'highprice' => false,
            'margin' => true,
        ]);
        DB::table('agents')->insert([
            'name' => 'DYMテック',
            'fee_id' => '1',
            'welfare' => false,
            'remote' => true,
            'site' => false,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'tech tree',
            'fee_id' => '6',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => true,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'テクフリ(テックキャリアフリーランス)',
            'fee_id' => '3',
            'welfare' => true,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'エンジニアルート',
            'fee_id' => '3',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'High-Performer ITエンジニア',
            'fee_id' => '5',
            'welfare' => true,
            'remote' => false,
            'site' => true,
            'highprice' => true,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'High-Performer コンサル',
            'fee_id' => '7',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => true,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'BTCエージェントforエンジニア',
            'fee_id' => '5',
            'welfare' => false,
            'remote' => false,
            'site' => false,
            'highprice' => true,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'BTCエージェントforコンサルタント',
            'fee_id' => '7',
            'welfare' => false,
            'remote' => false,
            'site' => false,
            'highprice' => true,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'ITプロパートナーズ',
            'fee_id' => '1',
            'welfare' => false,
            'remote' => true,
            'site' => false,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'ポテパンフリーランス',
            'fee_id' => '1',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'クラウドテック',
            'fee_id' => '1',
            'welfare' => true,
            'remote' => true,
            'site' => true,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'エンジニアファクトリー',
            'fee_id' => '4',
            'welfare' => false,
            'remote' => false,
            'site' => false,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => '1 on 1 Freelance',
            'fee_id' => '4',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => true,
        ]);
        DB::table('agents')->insert([
            'name' => 'フォスターフリーランス',
            'fee_id' => '4',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
        ]);
        DB::table('agents')->insert([
            'name' => 'エミリーエンジニア',
            'fee_id' => '3',
            'welfare' => true,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
        ]);
    }
}
