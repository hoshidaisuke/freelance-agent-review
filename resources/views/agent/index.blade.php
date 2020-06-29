@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <ul class="breadcrumb">
            <li>
                <a href="/">トップ</a>
            </li>
            <li><span class="material-icons">keyboard_arrow_right</span></li>
            <li>詳細ページ</li>
        </ul>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h2>{{ $agent->name }}の評判</h2>
                <table>
                    <tr>
                        <th>平均単価</th>
                        <td>@switch($agent->fee_id)
                                @case(1)
                                    ～59万
                                    @break
                                @case(2)
                                    60万～
                                    @break
                                @case(3)
                                    70万～
                                    @break
                                @case(4)
                                    80万～
                                    @break
                                @case(5)
                                    90万
                                    @break
                                @case(6)
                                    100万～
                                    @break
                                @case(7)
                                    非公開
                                    @break
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>対応地域</th>
                        <td>東京・埼玉</td>
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
                        <td>5</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
        
                <ul class="review-list">
                    @foreach ($posts as $post)
                    <li>
                        <h3>{{ $post->title }}</h3>     
                        <p>{{ nl2br(e($post->content)) }}</p>     
                        <p>
                            @switch($post->review)
                                @case(1)
                                    ★☆☆☆☆
                                    @break
                                @case(2)
                                    ★★☆☆☆
                                    @break
                                @case(3)
                                    ★★★☆☆
                                    @break
                                @case(4)
                                    ★★★★☆
                                    @break
                                @case(5)
                                    ★★★★★
                                    @break
                            @endswitch

                        </p>
                        <p>{{ $post->review }}</p>
                        {{ $user::findOrFail($post->user_id)->name }}
                    </li>
                    @endforeach
                </ul>
                <p class="center"><a href="" class="btn btn-primary">【公式】{{ $agent->name }}の無料登録はこちら</a></p>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-md-8 back-link">
        <a href="/"><span class="material-icons">keyboard_arrow_right</span>TOPに戻る</a>
    </div>
</div>

@endsection