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
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=2ZWAM9+4POO1M+2JK4+1TJTPD',
        ]);
        DB::table('agents')->insert([
            'name' => 'ギークスジョブ',
            'fee_id' => '4',
            'welfare' => true,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=2ZWDRA+VK3P6+2OGI+674EP',
        ]);
        DB::table('agents')->insert([
            'name' => 'Midworks',
            'fee_id' => '4',
            'welfare' => true,
            'remote' => true,
            'site' => true,
            'highprice' => false,
            'margin' => true,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=2TRCLG+92V0NU+3TVC+BXYE9',
        ]);
        DB::table('agents')->insert([
            'name' => 'フューチャリズム',
            'fee_id' => '3',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35JY3N+555XRU+3Y9Y+BWVTE',
        ]);
        DB::table('agents')->insert([
            'name' => 'PE-BANK',
            'fee_id' => '3',
            'welfare' => true,
            'remote' => false,
            'site' => false,
            'highprice' => false,
            'margin' => true,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=2TRCLG+9CE1FE+3SLI+60H7M',
        ]);
        DB::table('agents')->insert([
            'name' => 'DYMテック',
            'fee_id' => '1',
            'welfare' => false,
            'remote' => true,
            'site' => false,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35U3WC+679OHM+3EI0+TRVYQ',
        ]);
        DB::table('agents')->insert([
            'name' => 'tech tree',
            'fee_id' => '6',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => true,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35JWJC+9GJZKQ+4B0A+5ZU2A',
        ]);
        DB::table('agents')->insert([
            'name' => 'テクフリ(テックキャリアフリーランス)',
            'fee_id' => '3',
            'welfare' => true,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35JWJC+9GJZKQ+4B0A+5ZU2A',
        ]);
        DB::table('agents')->insert([
            'name' => 'エンジニアルート',
            'fee_id' => '3',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35D2L0+E1H58A+46GE+5YRHE',
        ]);
        DB::table('agents')->insert([
            'name' => 'High-Performer ITエンジニア',
            'fee_id' => '5',
            'welfare' => true,
            'remote' => false,
            'site' => true,
            'highprice' => true,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35JWJC+9GJZKQ+4B0A+5ZU2A',
        ]);
        DB::table('agents')->insert([
            'name' => 'High-Performer コンサル',
            'fee_id' => '7',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => true,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=3B9Q89+691ZAY+3T80+BWVTE',
        ]);
        DB::table('agents')->insert([
            'name' => 'BTCエージェントforエンジニア',
            'fee_id' => '5',
            'welfare' => false,
            'remote' => false,
            'site' => false,
            'highprice' => true,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35F6JW+21TVNE+45VU+BWVTE',
        ]);
        DB::table('agents')->insert([
            'name' => 'BTCエージェントforコンサルタント',
            'fee_id' => '7',
            'welfare' => false,
            'remote' => false,
            'site' => false,
            'highprice' => true,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35O7NK+4EDFJU+45VU+5YJRM',
        ]);
        DB::table('agents')->insert([
            'name' => 'ITプロパートナーズ',
            'fee_id' => '1',
            'welfare' => false,
            'remote' => true,
            'site' => false,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35UO7F+6J6CL6+40EC+60WN6',
        ]);
        DB::table('agents')->insert([
            'name' => 'ポテパンフリーランス',
            'fee_id' => '1',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35UO7F+6J6CL6+40EC+60WN6',
        ]);
        DB::table('agents')->insert([
            'name' => 'クラウドテック',
            'fee_id' => '1',
            'welfare' => true,
            'remote' => true,
            'site' => true,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35UO7F+6J6CL6+40EC+60WN6',
        ]);
        DB::table('agents')->insert([
            'name' => 'エンジニアファクトリー',
            'fee_id' => '4',
            'welfare' => false,
            'remote' => false,
            'site' => false,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35UO7F+6J6CL6+40EC+60WN6',
        ]);
        DB::table('agents')->insert([
            'name' => '1 on 1 Freelance',
            'fee_id' => '4',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => true,
            'avg' => '0.0',
            'link' => 'https://tr.slvrbullet.com/cl/w0000114522/11741/4095/',
        ]);
        DB::table('agents')->insert([
            'name' => 'フォスターフリーランス',
            'fee_id' => '4',
            'welfare' => false,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=2ZVXB2+89OV3U+45OW+5YRHE',
        ]);
        DB::table('agents')->insert([
            'name' => 'エミリーエンジニア',
            'fee_id' => '3',
            'welfare' => true,
            'remote' => false,
            'site' => true,
            'highprice' => false,
            'margin' => false,
            'avg' => '0.0',
            'link' => 'https://px.a8.net/svt/ejp?a8mat=35D2L0+E0VPMI+4754+5YRHE',
        ]);
    }
}
