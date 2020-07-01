@extends('layouts.app')

@section('content')

<div class="main-image">
    <p>フリーランスエージェントの評判サイト</p>
    <p>フリレビ</p>
</div>
@if (Auth::check())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    
                    {!! Form::open(['route' => 'posts.store']) !!}
                        <div class="form-group">
                            {{Form::select('agent_id', [
                                '1' => 'レバテックフリーランス',
                                '2' => 'ギークスジョブ',
                                '3' => 'Midworks',
                                '4' => 'フューチャリズム',
                                '5' => 'Pe-BANK',
                                '6' => 'DYMテック',
                                '7' => 'tech tree',
                                '8' => 'テクフリ',
                                '9' => 'エンジニアルート',
                                '10' => 'High-Performer ITエンジニア',
                                '11' => 'High-Performer コンサル',
                                '12' => 'BTCエージェントforエンジニア',
                                '13' => 'BTCエージェントforエンジニア',
                                '14' => 'ITプロパートナーズ',
                                '15' => 'ポテパンフリーランス',
                                '16' => 'クラウドテック',
                                '17' => 'エンジニアファクトリー',
                                '18' => '1 on 1 Freelance',
                                '19' => 'フォスターフリーランス',
                                '20' => 'エミリーエンジニア',
                            ])}} の評判
                        </div>
                        <div class="form-group">
                                {!! Form::label('title', 'タイトル') !!}
                                {!! Form::text('title', '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'レビュー') !!}
                            {!! Form::textarea('content', '', ['class' => 'form-control', 'rows' => '3' ]) !!}
                        </div>
                        <div class="form-group">
                            {{Form::select('review', [
                                '5' => '★★★★★',
                                '4' => '★★★★',
                                '3' => '★★★',
                                '2' => '★★',
                                '1' => '★',
                            ])}}
                        </div>
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
@endif

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {!! Form::open([
                    'route' => ['posts.index'],
                    'method' => 'get'
                ]) !!}
                {!! Form::label('area', '地域') !!}
                <div class="form-group">
                    
                    {{Form::select('area', [
                        '選択してください',
                        '北海道',
                        '青森県',
                        '岩手県',
                        '宮城県',
                        '秋田県',
                        '山形県',
                        '福島県',
                        '茨城県',
                        '栃木県',
                        '群馬県',
                        '埼玉県',
                        '千葉県',
                        '東京都',
                        '神奈川',
                        '新潟県',
                        '富山県',
                        '石川県',
                        '福井県',
                        '山梨県',
                        '長野県',
                        '岐阜県',
                        '静岡県',
                        '愛知県',
                        '三重県',
                        '滋賀県',
                        '京都府',
                        '大阪府',
                        '兵庫県',
                        '奈良県',
                        '和歌山',
                        '鳥取県',
                        '島根県',
                        '岡山県',
                        '広島県',
                        '山口県',
                        '徳島県',
                        '香川県',
                        '愛媛県',
                        '高知県',
                        '福岡県',
                        '佐賀県',
                        '長崎県',
                        '熊本県',
                        '大分県',
                        '宮崎県',
                        '鹿児島',
                        '沖縄県',
                    ], $area_id)}}
                </div>
                特徴
                <div class="form-group">
                    
                    {{Form::checkbox('feature[]', 'welfare', (isset($_GET['feature'])) ? in_array('welfare', $_GET['feature']) : false, array('id'=>'welfare'))}}
                    {!! Form::label('welfare', '福利厚生がある') !!}

                    {{Form::checkbox('feature[]', 'remote', (isset($_GET['feature'])) ? in_array('remote', $_GET['feature']) : false, array('id'=>'remote'))}}
                    {!! Form::label('remote', '週3・リモート') !!}
                    
                    {{Form::checkbox('feature[]', 'site', (isset($_GET['feature'])) ? in_array('site', $_GET['feature']) : false, array('id'=>'site'))}}
                    {!! Form::label('site', '支払いサイトが30日以内') !!}
                    
                    {{Form::checkbox('feature[]', 'highprice', (isset($_GET['feature'])) ? in_array('highprice', $_GET['feature']) : false, array('id'=>'highprice'))}}                
                    {!! Form::label('highprice', '高単価') !!}

                    {{Form::checkbox('feature[]', 'margin', (isset($_GET['feature'])) ? in_array('margin', $_GET['feature']) : false, array('id'=>'margin'))}}
                    {!! Form::label('margin', 'マージン公開') !!}
                    
                </div>
                平均単価
                <div class="form-group">
                    {{Form::checkbox('fee[]', '1', (isset($_GET['fee'])) ? in_array(1, $_GET['fee']) : false, array('id'=>'非公開'))}}
                    {!! Form::label('非公開', '非公開') !!}

                    {{Form::checkbox('fee[]', '2', (isset($_GET['fee'])) ? in_array(2, $_GET['fee']) : false, array('id'=>'50'))}}
                    {!! Form::label('50', '～59万') !!}

                    {{Form::checkbox('fee[]', '3', (isset($_GET['fee'])) ? in_array(3, $_GET['fee']) : false, array('id'=>'60'))}}
                    {!! Form::label('60', '60-69万') !!}
                    
                    {{Form::checkbox('fee[]', '4', (isset($_GET['fee'])) ? in_array(4, $_GET['fee']) : false, array('id'=>'70'))}}
                    {!! Form::label('70', '70-79万') !!}
                    
                    {{Form::checkbox('fee[]', '5', (isset($_GET['fee'])) ? in_array(5, $_GET['fee']) : false, array('id'=>'80'))}}                   
                    {!! Form::label('80', '80-89万') !!}

                    {{Form::checkbox('fee[]', '6', (isset($_GET['fee'])) ? in_array(6, $_GET['fee']) : false, array('id'=>'90'))}}
                    {!! Form::label('90', '90-99万') !!}

                    {{Form::checkbox('fee[]', '7', (isset($_GET['fee'])) ? in_array(7, $_GET['fee']) : false, array('id'=>'100'))}}
                    {!! Form::label('100', '100万～') !!}

                </div>
                {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!} 

                {!! Form::open([
                    'route' => ['posts.index'],
                    'method' => 'get'
                ]) !!}
                <div class="form-group sort">
                    {{Form::select('sort', [
                        '評価が高い順',
                        'レビュー数が多い順',
                    ], )}}
                    {!! Form::submit('絞り込む', ['class' => 'btn btn-primary']) !!}
                </div>
                    
                {!! Form::close() !!}                
                <ul class="agent-list">
                    @foreach($agents as $agent)
                        <li>
                            <a href="{{ route('agent.index', ['id' => $agent->id]) }}">
                                <?php $avg = round(collect($posts->where('agent_id', $agent->id))->avg('review'), 1, PHP_ROUND_HALF_UP); ?> 
                                        
                                <p class="agent">{{ $agent->name }}（{{ $posts->where('agent_id', $agent->id)->count() }}）</p>
                                @if($avg == 0)
                                <p class="review">まだ評判がありません。</p>
                                @else
                                <p class="review">
                                @switch($avg)
                                    @case(1 <= $avg && $avg < 2)
                                        ★☆☆☆☆
                                        @break
                                    @case(2 <= $avg && $avg < 3)
                                        ★★☆☆☆
                                        @break
                                    @case(3 <= $avg && $avg < 4)
                                        ★★★☆☆
                                        @break
                                    @case(4 <= $avg && $avg < 5)
                                        ★★★★☆
                                        @break
                                    @case(5)
                                        ★★★★★
                                        @break
                                @endswitch
                                </p>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{-- ページネーションのリンク --}}
            </div>
        </div>

        <ul class="snsbtniti2">
            <li><a href="https://twitter.com/intent/tweet?text=%E5%AF%9D%E8%A8%80%E3%82%92%E6%8A%95%E7%A8%BF%E3%81%99%E3%82%8B%E3%82%B5%E3%82%A4%E3%83%88%E3%80%8C%E3%81%AD%E3%81%94%E3%81%A8%E3%81%AE%E3%83%BC%E3%81%A8%E3%80%8D%0D%0A=https://negoto-note.herokuapp.com/" class="flowbtn12 fl_tw2"
            ><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
            <li><a href="//timeline.line.me/social-plugin/share?url=https://negoto-note.herokuapp.com/" class="flowbtn12 fl_li2"><i class="fab fa-line"></i><span>LINE</span></a></li>
            <li><a href="http://b.hatena.ne.jp/add?mode=confirm&url=https://negoto-note.herokuapp.com/" class="flowbtn12 fl_hb2"><i class="fas fa-bold"></i><span>Hatena</span></a></li>
        </ul>
    </div>
</div>

@endsection