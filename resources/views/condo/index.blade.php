@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="top-wrapper col-md-12 mx-auto">
                <h1>For Sale!</h1>
            </div>
        </div>
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="new-condo col-md-12 mx-auto">
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
                        <div class="new-info col-md-6">
                            <h3>Information</h3>
                            <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <th scope="col" class="table-active">物件名</th>
                                  <td>{{ str_limit($headline->condo, 50) }}</td>
                                </tr>
                                <tr>
                                  <th scope="row" class="table-active">販売価格</th>
                                  <td>{{ str_limit($headline->price, 50) }}</td>
                                </tr>
                                <tr>
                                  <th scope="row" class="table-active">アクセス</th>
                                  <td>{{ str_limit($headline->place, 50) }}</td>
                                </tr>
                                <tr>
                                  <th scope="row" class="table-active">専有面積</th>
                                  <td>{{ str_limit($headline->area, 50) }}</td>
                                </tr>
                                <tr>
                                  <th scope="row" class="table-active">間取り</th>
                                  <td>{{ str_limit($headline->plan, 50) }}</td>
                                </tr>
                                <tr>
                                  <th scope="row" class="table-active">築年数</th>
                                  <td>{{ str_limit($headline->old, 50) }}</td>
                                </tr>
                              </tbody>
                            </table>
                            <div>
                            　@if($headline->is_liked_by_auth_user())
                                <a href="{{ route('condo.unlike', ['id' => $headline->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $headline->likes->count() }}</span></a>
                              @else
                                <a href="{{ route('condo.like', ['id' => $headline->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $headline->likes->count() }}</span></a>
                              @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
          @foreach($posts as $post)
            <div class="col-md-3 mt-3">
              <div class="card">
                @if ($post->image_path)
                    <img class="card-img-top" src="{{ asset('storage/image/' . $post->image_path) }}" alt="Card image cap">
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ str_limit($post->condo, 50) }}</h5>
                  <table class="table condo-table table-borderless table-sm">
                              <tbody>
                                <tr>
                                  <th scope="col" class="table-active">物件名</th>
                                  <td>{{ str_limit($post->condo, 30) }}</td>
                                </tr>
                                <tr>
                                  <th scope="row" class="table-active">販売価格</th>
                                  <td>{{ str_limit($post->price, 10) }}</td>
                                </tr>
                                <tr>
                                  <th scope="row" class="table-active">アクセス</th>
                                  <td>{{ str_limit($post->place, 30) }}</td>
                                </tr>
                              </tbody>
                   </table>
                </div>
                <div class="card-footer">
                  <a class="btn btn-primary " href="#" role="button">物件詳細</a>
                　@if($post->is_liked_by_auth_user())
                    <a href="{{ route('condo.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                  @else
                    <a href="{{ route('condo.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                  @endif
                </div>
              </div>
                </div>
              @endforeach
              </div>
            </div>
        </div>
    </div>
@endsection