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
                <h2>{{ $agent->name }}</h2>
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
                                    70万～69万
                                    
                                    @break
                                @case(5)
                                    80万～69万
                                    
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
                                        <li>福利厚生</li> 
                                    @endif
                                   
                                
                                    @if ($agent->remote)
                                        <li>週3・リモート</li>
                                    @endif
                                   
                               
                                    @if ($agent->highprice)
                                        <li>高単価</li> 
                                    @endif
                                   
                                
                                    @if ($agent->site)
                                        <li>支払い単価30日以内</li>
                                    @endif
                                
                                
                                    @if ($agent->margin)
                                        <li>マージン公開</li>
                                    @endif
                                
                            </ul>
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
                        <p>{{ $user::findOrFail($post->user_id)->name }}</p>

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