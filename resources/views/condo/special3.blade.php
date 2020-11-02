@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="special-image col-md-12 mx-auto">
            <img src="{{ secure_asset('background-image/branz-concept.jpg') }}">
        </div>
    </div>
    <div class="row">
        <div class="special-message col-md-12 mx-auto">
            <h1>～マンションブランド【ブランズ】について～</h1>
            <p>「感性を花開くデザイン」「革新を志す品質」「個性と共生を輝かせるサポート」をキャッチコピーとしたマンションブランドです。<br>タワーマンションも含む大規模マンションが多いブランドで、都心を始め全国的に展開されています。<br>首都圏では東急電鉄の駅近くという立地も多い一方、東急の鉄道網から離れた地域でも、交通の利便性の高さを保っていることが多いという点も特長です。<br>物件の外観も多様ですが、スタイリッシュで高級感のあるデザインセンスは共通するところ。<br>大規模マンションのスケールメリットを活かした共用サービスや施設も充実したマンションブランドです。</p>
        </div>
    </div>
</div>

@endsection