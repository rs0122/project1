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
  <hr color="#c0c0c0">
  <div class="row">
      <div class="favorite col-md-12 mx-auto">
        <h2>My favorite</h2>
      </div>
      @foreach ($user->join_likes_condos() as $condo)
      <div class="col-md-3 mt-3">
        <div class="card">
        @if ($condo->image_path)
          <a href="{{ action('CondoController@condo1', ['id' => $condo->id]) }}"><img class="card-img-top" src="{{ asset('storage/image/' . $condo->image_path) }}" alt="Card image cap"></a>
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
</div>
@endsection