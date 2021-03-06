@extends('layouts.front')

@section('content')
        <div class="row">
            <div class="mainVidulal col-md-12">
                <video id="mainVideo" src="{{ secure_asset('background-image/sample1.mp4') }}" loop autoplay muted></video>
            </div>
                <h1 class="top-message">Let's start your new Life!</h1>
                <form action="{{ action('InfoController@map') }}" method="post" enctype="multipart/form-data" class="php-email-form" role="search">
                    @csrf
                    <div class="row no-gutters">
                      <div class="col-md-6 form-group mx-auto">
                        <input type="text" name="keyword" class="form-control" id="keyword" placeholder="Search:place（例：西宮北口駅）" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                        <div class="text-center">
                            <input type="submit" class="btn-dark" id="search" value="Search!">
                        </div>
                      </div>
                    </div>
                </form>
        </div>
        <div class="row">
            <div class="contents col-md-12 mx-auto">
                <p class="pp">Special feature</p>
                <p class="ppp">～人気マンション特集～</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="item col-md-3">
                        <a href="/special1"><img src="{{ secure_asset('background-image/geo.jpg') }}"></a>
                        <div class="logo">
                            <img src="{{ secure_asset('background-image/geo-logo.jpg') }}">
                        </div>
                    </div>
                    <div class="item col-md-3">
                        <a href="/special2"><img src="{{ secure_asset('background-image/parkhouse.jpg') }}"></a>
                        <div class="logo">
                            <img src="{{ secure_asset('background-image/parkhouse-logo.jpg') }}">
                        </div>
                    </div>
                    <div class="item col-md-3">
                        <a href="/special3"><img src="{{ secure_asset('background-image/branz.jpg') }}"></a>
                        <div class="logo">
                            <img src="{{ secure_asset('background-image/branz-logo.jpg') }}">
                        </div>
                    </div>
                    <div class="item col-md-3">
                        <a href="/special4"><img src="{{ secure_asset('background-image/proud.jpg') }}"></a>
                        <div class="logo">
                            <img src="{{ secure_asset('background-image/proud-logo.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center">Column</h2>
        <p class="text-center">～コラム～</p>
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ $headline->image_path }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h3>{{ str_limit($headline->title, 70) }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->body, 300) }}...<a href="{{ action('InfoController@column') }}">コラム一覧を見る</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 700) }}...<a href="{{ action('InfoController@column') }}">コラム一覧を見る</a>
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ $post->image_path }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
@endsection