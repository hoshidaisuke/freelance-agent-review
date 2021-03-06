@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <ul class="breadcrumb">
            <li>
                <a href="/">トップ</a>
            </li>
            <li><span class="material-icons">keyboard_arrow_right</span></li>
            <li>{{ $agent->name }}の評判</li>
        </ul>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h2>{{ $agent->name }}の詳細情報</h2>
                <table class="agent-table">
                    <tr>
                        <th>平均単価</th>
                        <td>@switch($agent->fee_id)
                                @case(1)
                                    非公開
                                    @break
                                @case(2)
                                    ～59万
                                    
                                    @break
                                @case(3)
                                    60万～69万
                                    @break
                                @case(4)
                                    70万～79万
                                    
                                    @break
                                @case(5)
                                    80万～89万
                                    
                                    @break
                                @case(6)
                                    90万～99万
                                    @break
                                @case(7)
                                    100万～
                                    @break
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>対応地域</th>
                        <td>
                        
                            @foreach ($areas as $area)
                                
                                {{ $Area::findOrFail($area->id)->area }}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>特徴</th>
                        <td>
                            <ul class="tag-list">
                                
                                    @if ($agent->welfare)
                                        <li><span>福利厚生</span></li> 
                                    @endif
                                   
                                
                                    @if ($agent->remote)
                                        <li><span>週3・リモート</span></li>
                                    @endif
                                   
                               
                                    @if ($agent->highprice)
                                        <li><span>高単価</span></li> 
                                    @endif
                                   
                                
                                    @if ($agent->site)
                                        <li><span>支払い単価30日以内</span></li>
                                    @endif
                                
                                
                                    @if ($agent->margin)
                                        <li><span>マージン公開</span></li>
                                    @endif
                                
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>支払いサイト<br>（支払日）</th>
                        <td>
                            {{ $agent->siteday }}
                        </td>
                    </tr>
                    <tr>
                        <th>評判</th>
                        <td>
                            <?php $avg = round(collect($posts->where('agent_id', $agent->id))->avg('review'), 1, PHP_ROUND_HALF_UP); ?> 
                            @if($avg == 0)
                                まだ評判がありません。
                            @else
                                {{ $avg }}
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>{{ $agent->name }}の評判</h2>
                

                    <ul class="review-list">

                    @if($avg !== 0.0)
                    @foreach ($posts as $post)
                    <li>
                        <h3>{{ $post->title }}</h3>     
                        <p>{!! nl2br(e($post->content)) !!}</p>     
                        <p class="review">
                            @switch($post->review)
                                @case(1)
                                    <span>★☆☆☆☆</span>
                                    @break
                                @case(2)
                                    <span>★★☆☆☆</span>
                                    @break
                                @case(3)
                                    <span>★★★☆☆</span>
                                    @break
                                @case(4)
                                    <span>★★★★☆</span>
                                    @break
                                @case(5)
                                    <span>★★★★★</span>
                                    @break
                            @endswitch
                            {{ $post->review }}
                            
                        </p>
                        <!--<p>{{ $user::findOrFail($post->user_id)->name }}</p>-->

                    </li>
                    @endforeach
                    @else
                    <li>               
                        <p>まだ評判がありません。</p>
                    </li>
                    @endif
                </ul>            

                <p>{{ $posts->links() }}</p>
               <p class="center"><a href="{{ $agent->link }}" class="btn btn-primary">【公式】{{ $agent->name }}の無料登録はこちら</a></p>
            </div>

        </div>
 

        @if (Auth::check())
            <div class="card">
                <div class="card-body">
                    
                    {!! Form::open(['route' => 'posts.store']) !!}
                        <div class="form-group">
                            {{Form::hidden('agent_id', $agent->id)}}
                            
                            {{ $agent->name }} の評判
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
        <ul class="snsbtniti2">
            <li><a href="{{ 'https://twitter.com/intent/tweet?text=%E3%83%95%E3%83%AA%E3%83%BC%E3%83%A9%E3%83%B3%E3%82%B9%E3%82%A8%E3%83%BC%E3%82%B8%E3%82%A7%E3%83%B3%E3%83%88%E3%81%AE%E8%A9%95%E5%88%A4%E3%82%B5%E3%82%A4%E3%83%88%E3%80%8C%E3%83%95%E3%83%AA%E3%83%AC%E3%83%93%E3%80%8D%0D%0A' . $agent->name . 'の評判はこちら' .' &url=' . request()->fullUrl() }}" target="_blank" class="flowbtn12 fl_tw2 }}"
            href="{{ 'https://twitter.com/intent/tweet?text=%E5%AF%9D%E8%A8%80%E3%82%92%E6%8A%95%E7%A8%BF%E3%81%97%E3%81%9F%E3%82%88%0D%0A%23%E3%81%AD%E3%81%94%E3%81%A8%E3%81%AE%E3%83%BC%E3%81%A8%0D%0A' .' &url=' . request()->fullUrl() }}"
            ><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
            <li><a href="//timeline.line.me/social-plugin/share?url=https://furi-rebi.com" class="flowbtn12 fl_li2"><i class="fab fa-line"></i><span>LINE</span></a></li>
            <li><a href="http://b.hatena.ne.jp/add?mode=confirm&url=https://furi-rebi.com" class="flowbtn12 fl_hb2"><i class="fas fa-bold"></i><span>Hatena</span></a></li>
        </ul>
    </div>
</div>


<div class="row justify-content-center">
    
    <div class="col-md-8 back-link">
        @if ($agent::where('id', $agent->id + 1)->exists())
        <p><a href="/agent/{{ $agent->id + 1 }}"><span class="material-icons">keyboard_arrow_right</span>{{ $agent::findOrFail($agent->id + 1)->name }}の評判はこちら</a></p>
        @else
        <p><a href="/agent/1"><span class="material-icons">keyboard_arrow_right</span>{{ $agent::findOrFail(1)->name }}の評判はこちら</a></p>
        @endif
        <p><a href="/"><span class="material-icons">keyboard_arrow_right</span>TOPに戻る</a></p>
    </div>
</div>

@endsection