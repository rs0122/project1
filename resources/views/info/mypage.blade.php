@extends('layouts.front')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
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
        <div class="gallery flex border mb-4 p-2">
          @foreach ($user->join_likes_condos() as $condo)
          <div class="fcondo border mb-4 p-2">
            <a href="/condo/{{ $condo->id }}">
              <div class="img_cover">
                <img src="{{ asset('storage/image/' . $condo->image_path) }}" />
              </div>
            </a>
            <div class="flex space-between bottom-imginfo">
              <div>
                <a href="{{ route('condo.like', ['id' => $condo->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $condo->likes->count() }}</span></a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
</div>
<hr color="#c0c0c0">
<div class="row">
    <div class="fav-column col-md-12 mx-auto">
        <h2>favorite column</h2>
    </div>
</div>
@endsection