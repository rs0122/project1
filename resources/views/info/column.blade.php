@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        <div class="column col-md-12 mx-auto">
            <h1>～Column～</h1>
        </div>
    </div>
    <div class="row">
        <div class="pickup-contents-box col-md-12">
            <div class="row">
                <div class="pickup-image col-md-3">
                    <a href="#">
                        <img src="storage/house.jpg"　width="269"　height="151">
                        <div class="pickup-title">不動産購入・売却<br>のポイント</div>
                    </a>
                </div>
                <div class="pickup-image col-md-3"　width="269"　height="151">
                    <a href="#">
                        <img src="storage/money.jpg">
                        <div class="pickup-title">【みんなが知りたい】<br>住宅ローン・税金情報</div>
                    </a>
                </div>
                <div class="pickup-image col-md-3"　width="269"　height="151">
                    <a href="#">
                        <img src="storage/contract.jpg">
                        <div class="pickup-title">契約上での注意点</div>
                    </a>
                </div>
                <div class="pickup-image col-md-3">
                    <a href="#">
                        <img src="storage/others.jpg"　width="269"　height="151">
                        <div class="pickup-title">購入後のおすすめコラム</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if (!is_null($headline))
    <div class="row">
        <div class="column-top col-md-12 mx-auto">
            <img src="storage/Newアイコン.png" class="new-icon">
            <p>{{ $headline->updated_at->format('Y年m月d日') }}</p>
            <h2>{{ str_limit($headline->title, 70) }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="column-list col-md-10 mx-auto">
            <img src="{{ $headline->image_path }}">
            <p>{!! nl2br(e($headline->body)) !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
          @if($headline->is_liked_by_auth_user())
            <a href="{{ route('info.unlike', ['id' => $headline->id]) }}" class="btn btn-success btn-sm">お気に入り<span class="badge">{{ $headline->likes->count() }}</span></a>
          @else
            <a href="{{ route('info.like', ['id' => $headline->id]) }}" class="btn btn-secondary btn-sm">お気に入り<span class="badge">{{ $headline->likes->count() }}</span></a>
          @endif
        </div>
    </div>
    <hr color="#c0c0c0">
    @endif
    @foreach($posts as $post)
    <div class="row">
        <div class="column-top col-md-12 mx-auto">
            <p>{{ $post->updated_at->format('Y年m月d日') }}</p>
            <h2>{{ str_limit($post->title, 70) }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="column-list col-md-10 mx-auto">
            <img src="{{ $post->image_path }}">
            <p>{!! nl2br(e($post->body)) !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
          @if($post->is_liked_by_auth_user())
            <a href="{{ route('info.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">お気に入り<span class="badge">{{ $post->likes->count() }}</span></a>
          @else
            <a href="{{ route('info.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">お気に入り<span class="badge">{{ $post->likes->count() }}</span></a>
          @endif
        </div>
    </div>
    <hr color="#c0c0c0">
    @endforeach
</div>


@endsection