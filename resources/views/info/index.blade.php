@extends('layouts.front')

@section('content')
        <div class="row">
            <div class="mainVidulal col-md-12">
                <video id="mainVideo" src="storage/sample1.mp4" loop autoplay muted></video>
                  
            </div>
                <h1 class="top-message">Let's start your new Life!</h1>
        </div>
        <div class="row">
            <div class="contents col-md-11 mx-auto">
                        <img src="storage/ジオ.jpg" class="item col-md-3">
                        <img src="storage/パークハウス.jpg" class="item col-md-3">
                        <img src="storage/ブランズ.jpg" class="item col-md-3">
                        <img src="storage/プラウド.jpg" class="item col-md-3">
            </div>
        </div>
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h2>{{ str_limit($headline->title, 70) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
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
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection