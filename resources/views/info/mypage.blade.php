@extends('layouts.front')

@section('content')
<div class="container">
  <div class="row">
      <div class="top-wrapper col-md-12 mx-auto">
          <h1>My Page</h1>
      </div>
  </div>
  <hr color="#c0c0c0">
  <div class="row">
      <div class="recommend col-md-12 mx-auto">
          <h2>recommend</h2>
          <!--営業マンからの新着情報欄-->
      </div>
  </div>
  <div class="row">
    @foreach($user->condoFromAdmin() as $post)
      <div class="col-md-3 mt-3">
        <div class="card">
          @if ($post->image_path)
              <img class="card-img-top" src="{{ $post->image_path }}" alt="Card image cap">
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
            <a class="btn btn-primary" href="{{ action('CondoController@condo1', ['id' => $post->id]) }}" role="button">物件詳細</a>
          　@if($post->is_liked_by_auth_user())
              <a href="{{ route('condo.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">お気に入り<span class="badge">{{ $post->likes->count() }}</span></a>
            @else
              <a href="{{ route('condo.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">お気に入り<span class="badge">{{ $post->likes->count() }}</span></a>
            @endif
          </div>
        </div>
        <!--<div>
          <p>{{ $post->from_user_id }}さんからのおすすめ物件です！</p>
        </div>-->
      </div>
    @endforeach
  </div>
  <hr color="#c0c0c0">
  <div class="row">
      <div class="favorite col-md-12 mx-auto">
        <h2>My favorite</h2>
      </div>
      @foreach ($user->join_likes_condos() as $condo)
      <div class="col-md-3 mt-3">
        <div class="card">
        @if ($condo->image_path)
          <a href="{{ action('CondoController@condo1', ['id' => $condo->id]) }}"><img class="card-img-top" src="{{ $condo->image_path }}" alt="Card image cap"></a>
        @endif
          <div class="card-body">
            <h5 class="card-title">{{ str_limit($condo->condo, 50) }}</h5>
            <table class="table condo-table table-borderless table-sm">
              <tbody>
                <tr>
                  <th scope="col" class="table-active">物件名</th>
                  <td>{{ str_limit($condo->condo, 30) }}</td>
                </tr>
                <tr>
                  <th scope="row" class="table-active">販売価格</th>
                  <td>{{ str_limit($condo->price, 10) }}</td>
                </tr>
                <tr>
                  <th scope="row" class="table-active">アクセス</th>
                  <td>{{ str_limit($condo->place, 30) }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <a class="btn btn-primary" href="{{ action('CondoController@condo1', ['id' => $condo->id]) }}" role="button">物件詳細</a>
          　@if($condo->is_liked_by_auth_user())
            <a href="{{ route('condo.unlike', ['id' => $condo->id]) }}" class="btn btn-success btn-sm">お気に入り<span class="badge">{{ $condo->likes->count() }}</span></a>
            @else
            <a href="{{ route('condo.like', ['id' => $condo->id]) }}" class="btn btn-secondary btn-sm">お気に入り<span class="badge">{{ $condo->likes->count() }}</span></a>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <hr color="#c0c0c0">
  <div class="row">
      <div class="fav-column col-md-12 mx-auto">
          <h2>favorite column</h2>
      </div>
  </div>
  @foreach ($user->join_likes_posts() as $post)
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