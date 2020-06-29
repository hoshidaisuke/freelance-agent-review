@extends('layouts.app')

@section('content')

<div class="main-image">
    <p>フリーランスの評判サイト</p>
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
                    ], )}}
                </div>
                特徴
                <div class="form-group">
                    {!! Form::label('welfare', '福利厚生がある') !!}
                    {{Form::checkbox('welfare', '1')}}
                    
                    {!! Form::label('remote', '週3・リモート') !!}
                    {{Form::checkbox('remote', '2')}}
                    
                    {!! Form::label('site', '支払いサイトが30日以内') !!}
                    {{Form::checkbox('site', '3')}}
                    
                    {!! Form::label('highprice', '高単価') !!}
                    {{Form::checkbox('highprice', '4')}}                    

                    {!! Form::label('margin', 'マージン公開') !!}
                    {{Form::checkbox('margin', '5')}}
                    
                </div>
                平均単価
                <div class="form-group">
                    
                    {!! Form::label('remote', '～59万') !!}
                    {{Form::checkbox('remote', '2')}}

                    {!! Form::label('site', '60-69万') !!}
                    {{Form::checkbox('site', '3')}}
                    
                    {!! Form::label('site', '70-79万') !!}
                    {{Form::checkbox('site', '3')}}
                    
                    {!! Form::label('highprice', '80-89万') !!}
                    {{Form::checkbox('highprice', '4')}}                    

                    {!! Form::label('margin', '90-99万') !!}
                    {{Form::checkbox('margin', '5')}}

                    {!! Form::label('margin', '100万～') !!}
                    {{Form::checkbox('margin', '5')}}

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
                <ul class="post-list">
                    @foreach($agents as $agent)
                        <li>
                            <a href="{{ route('agent.index', ['id' => $agent->id]) }}">
                                
                                {{ $agent->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{-- ページネーションのリンク --}}
                {{ $posts->links() }}
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