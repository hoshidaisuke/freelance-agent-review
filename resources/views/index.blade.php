@extends('layouts.app')

@section('content')

<div class="main-image">
    <img src="./img/main_image_black.jpg" alt="フリーランスエージェントの評判サイト「フリレビ」">
</div>

<div class="row justify-content-center">

    <div class="col-md-8">
        @if (Auth::check())
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
                            {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'とても親切でした！']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', 'レビュー') !!}
                        {!! Form::textarea('content', '', ['class' => 'form-control', 'rows' => '5', 'placeholder' => '良かったところ・改善点など' ]) !!}
                    </div>
                    <div class="form-group">
                        <div>{!! Form::label('review', '評価') !!}</div>
                        {{Form::select('review', [
                            '0' => '選択してください',
                            '5' => '★★★★★',
                            '4' => '★★★★',
                            '3' => '★★★',
                            '2' => '★★',
                            '1' => '★',
                        ])}}
                    </div>
                    <div class="form-group center">
                    {!! Form::submit('投稿', ['class' => 'btn btn-primary w-50']) !!}
                    </div>
                {!! Form::close() !!}
                
            </div>
        </div>

        @endif
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
                    {!! Form::label('area', '地域', ['class' => 'label']) !!}
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
                    <p class="label">特徴</p>
                    <div class="form-group">
                        <span class="form-group-parts">
                            {{Form::checkbox('feature[]', 'welfare', (isset($_GET['feature'])) ? in_array('welfare', $_GET['feature']) : false, array('id'=>'welfare'))}}
                            {!! Form::label('welfare', '福利厚生がある') !!}
                        </span>
                        <span class="form-group-parts">
                            {{Form::checkbox('feature[]', 'remote', (isset($_GET['feature'])) ? in_array('remote', $_GET['feature']) : false, array('id'=>'remote'))}}
                            {!! Form::label('remote', '週3・リモート') !!}
                        </span>
                        <span class="form-group-parts">
                            {{Form::checkbox('feature[]', 'site', (isset($_GET['feature'])) ? in_array('site', $_GET['feature']) : false, array('id'=>'site'))}}
                            {!! Form::label('site', '支払いサイトが30日以内') !!}
                        </span>
                        <span class="form-group-parts">
                            {{Form::checkbox('feature[]', 'highprice', (isset($_GET['feature'])) ? in_array('highprice', $_GET['feature']) : false, array('id'=>'highprice'))}}                
                            {!! Form::label('highprice', '高単価') !!}
                        </span>
                        <span class="form-group-parts">
                            {{Form::checkbox('feature[]', 'margin', (isset($_GET['feature'])) ? in_array('margin', $_GET['feature']) : false, array('id'=>'margin'))}}
                            {!! Form::label('margin', 'マージン公開') !!}
                        </span>
                    </div>
                    <p class="label">平均単価</p>
                    <div class="form-group">
                        <span class="form-group-parts">
                        {{Form::checkbox('fee[]', '1', (isset($_GET['fee'])) ? in_array(1, $_GET['fee']) : false, array('id'=>'非公開'))}}
                        {!! Form::label('非公開', '非公開') !!}
                        </span>
                        <span class="form-group-parts">
                        {{Form::checkbox('fee[]', '2', (isset($_GET['fee'])) ? in_array(2, $_GET['fee']) : false, array('id'=>'50'))}}
                        {!! Form::label('50', '～59万') !!}
                        </span>
                        <span class="form-group-parts">
                        {{Form::checkbox('fee[]', '3', (isset($_GET['fee'])) ? in_array(3, $_GET['fee']) : false, array('id'=>'60'))}}
                        {!! Form::label('60', '60-69万') !!}
                        </span>
                        <span class="form-group-parts">
                        {{Form::checkbox('fee[]', '4', (isset($_GET['fee'])) ? in_array(4, $_GET['fee']) : false, array('id'=>'70'))}}
                        {!! Form::label('70', '70-79万') !!}
                        </span>
                        <span class="form-group-parts">
                        {{Form::checkbox('fee[]', '5', (isset($_GET['fee'])) ? in_array(5, $_GET['fee']) : false, array('id'=>'80'))}}                   
                        {!! Form::label('80', '80-89万') !!}
                        </span>
                        <span class="form-group-parts">
                        {{Form::checkbox('fee[]', '6', (isset($_GET['fee'])) ? in_array(6, $_GET['fee']) : false, array('id'=>'90'))}}
                        {!! Form::label('90', '90-99万') !!}
                        </span>
                        <span class="form-group-parts">
                        {{Form::checkbox('fee[]', '7', (isset($_GET['fee'])) ? in_array(7, $_GET['fee']) : false, array('id'=>'100'))}}
                        {!! Form::label('100', '100万～') !!}
                        </span>
                    </div>
                    <p class="label">並べ替え</p>
                    <div class="form-group">
                        {{Form::select('sort', [
                            1 => '評価が高い順',
                            2 => 'レビュー数が多い順',
                        ], $sort)}}
                    </div>
                    <div class="form-group center">
                        {!! Form::submit('検索', ['class' => 'btn btn-primary w-50']) !!}
                    </div>
                {!! Form::close() !!} 
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                @if(isset($area_id) && $area_id !== '0' || isset($_GET['feature']) || isset($_GET['fee']) || isset($_GET['sort']))
                    <h2 class="top">フリーランスエージェントランキング</h2>
                    <p class="result">検索結果【
                        @if(isset($area_id) && $area_id !== '0')
                            @foreach($areas as $area)
                                @if ($loop->first)
                                    {{ $area->where('id', $area_id)->get()[0]->area }}
                                @endif
                            @endforeach
                        @endif
                    
                        @if(isset($_GET['feature']))
                            @if (in_array('welfare', $_GET['feature']))
                                福利厚生
                            @endif
                            @if (in_array('remote', $_GET['feature']))
                                週3・リモート
                            @endif   
                            @if (in_array('site', $_GET['feature']))
                                支払いサイトが30日以内
                            @endif             
                            @if (in_array('highprice', $_GET['feature']))
                                高単価
                            @endif
                            @if (in_array('margin', $_GET['feature']))
                                マージン公開
                            @endif
                        @endif
                    
                        @if(isset($_GET['fee']))
                            @if (in_array(1, $_GET['fee']))
                                非公開
                            @endif
                            @if (in_array(2, $_GET['fee']))
                                ～59
                            @endif   
                            @if (in_array(3, $_GET['fee']))
                                60-69万
                            @endif             
                            @if (in_array(4, $_GET['fee']))
                                70-79万
                            @endif
                            @if (in_array(5, $_GET['fee']))
                                80-89万
                            @endif
                            @if (in_array(6, $_GET['fee']))
                                90-99万
                            @endif
                            @if (in_array(7, $_GET['fee']))
                                100万～
                            @endif
                        @endif
                        @if(isset($_GET['sort']))
                            @if($sort === '1')
                            評価が高い順
                            @else
                            レビュー数が多い順
                            @endif
                        @endif
                        】</p>
                    @else
                        <h2 class="top">フリーランスエージェントランキング</h2>            
                    @endif
                </p>

                <ol class="agent-list">
                    @foreach($agents as $index => $agent)
                        <li>
                            <a href="{{ route('agent.index', ['id' => $agent->id]) }}">
                                <?php $avg = round(collect($posts->where('agent_id', $agent->id))->avg('review'), 1, PHP_ROUND_HALF_UP); ?> 
                                        
                                <p class="agent">{{ $index + 1 }}位.{{ $agent->name }}</p>
                                @if ($agent->welfare || $agent->remote || $agent->highprice || $agent->site || $agent->margin)
                                    <div class="quantity">
                                        <span>特徴：</span>
                                        <ul>
                                        
                                            @if ($agent->welfare)
                                                <li><span class="material-icons check">done_outline</span>福利厚生</li> 
                                            @endif
                                           
                                        
                                            @if ($agent->remote)
                                                <li><span class="material-icons check">done_outline</span>週3・リモート</li>
                                            @endif
                                           
                                       
                                            @if ($agent->highprice)
                                                <li><span class="material-icons check">done_outline</span>高単価</li> 
                                            @endif
                                           
                                        
                                            @if ($agent->site)
                                                <li><span class="material-icons check">done_outline</span>支払い単価30日以内</li>
                                            @endif
                                        
                                        
                                            @if ($agent->margin)
                                                <li><span class="material-icons check">done_outline</span>マージン公開</li>
                                            @endif
                                        
                                        </ul>
                                    </div>
                                @endif
                                <!--<p class="quantity">レビュー数：{{ $posts->where('agent_id', $agent->id)->count() }}-->
                                @if($avg == 0)
                                <p class="review no-review">まだ評判がありません。</p>
                                @else
                                <p class="review">
                                @switch($avg)
                                    @case(1 <= $avg && $avg < 2)
                                        評判：<span>★☆☆☆☆</span>
                                        @break
                                    @case(2 <= $avg && $avg < 3)
                                        評判：<span>★★☆☆☆</span>
                                        @break
                                    @case(3 <= $avg && $avg < 4)
                                        評判：<span>★★★☆☆</span>
                                        @break
                                    @case(4 <= $avg && $avg < 5)
                                        評判：<span>★★★★☆</span>
                                        @break
                                    @case(5)
                                        評判：<span>★★★★★</span>
                                        @break
                                @endswitch
                                </p>
                                @endif
                                <p class="more"><span class="material-icons">keyboard_arrow_right</span>{{ $agent->name }}の評判を見る</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{-- ページネーションのリンク --}}
            </div>
        </div>

        <ul class="snsbtniti2">
            <li><a href="https://twitter.com/intent/tweet?text=%E3%83%95%E3%83%AA%E3%83%BC%E3%83%A9%E3%83%B3%E3%82%B9%E3%82%A8%E3%83%BC%E3%82%B8%E3%82%A7%E3%83%B3%E3%83%88%E3%81%AE%E8%A9%95%E5%88%A4%E3%82%B5%E3%82%A4%E3%83%88%E3%80%8C%E3%83%95%E3%83%AA%E3%83%AC%E3%83%93%E3%80%8D%0D%0Ahttps%3A%2F%2Ffuri-rebi.com" target="_blank" class="flowbtn12 fl_tw2"
            ><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
            <li><a href="//timeline.line.me/social-plugin/share?url=https://furi-rebi.com" class="flowbtn12 fl_li2"><i class="fab fa-line"></i><span>LINE</span></a></li>
            <li><a href="http://b.hatena.ne.jp/add?mode=confirm&url=https://furi-rebi.com" class="flowbtn12 fl_hb2"><i class="fas fa-bold"></i><span>Hatena</span></a></li>
        </ul>
    </div>
</div>

@endsection