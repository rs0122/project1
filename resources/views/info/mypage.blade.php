@extends('layouts.front')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h1>My Page</h1>
    </div>
    <div class="recommend">
        <!--営業マンからの新着情報欄-->
    </div>
    <div class="favorite">
        <h2>My favorite</h2>
        <div class="gallery flex border mb-4 p-2">
          @foreach ($condos as $condo)
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
              <!--<div>
                <form method="POST" action="{{ action('CondoController@destroy_redirect', ['photo_id' => $photo->id]) }}">
                  @csrf
                  @if ($page_kind === 'mypage')
                  <button type="button" class="btn btn-primary btn-sm">編集</button>
                  @endif
                  <button type="submit" class="btn btn-danger btn-sm">
                    @if ($page_kind === 'favorite')
                    解除
                    @else
                    削除
                    @endif
                  </button>
                </form>
              </div>-->
            </div>
          </div>
          @endforeach
        </div>
    </div>
    <div class="fav-column">
        <h2>favorite column</h2>
    </div>
</div>

@endsection