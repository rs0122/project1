@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="top-wrapper col-md-12 mx-auto">
                <h1>販売物件一覧</h1>
            </div>
        </div>
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-12 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <h2>New!</h2>
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="condo p-2">
                                    <p>{{ str_limit($headline->condo, 50) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="place mx-auto">{{ str_limit($headline->place, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="card-group col-md-10 mx-auto">
             @foreach($posts as $post)
              <div class="card">
                @if ($post->image_path)
                    <img class="card-img-top" src="{{ asset('storage/image/' . $post->image_path) }}" alt="Card image cap">
                @endif
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                  <a class="btn btn-primary" href="#" role="button">Link</a>
                </div>
              </div>
             @endforeach
            </div>
            <!--<div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->condo, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->place, 1500) }}
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
            </div>-->
        </div>
    </div>
@endsection