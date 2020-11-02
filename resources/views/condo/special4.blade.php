@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="special-image col-md-12 mx-auto">
            <img src="{{ secure_asset('background-image/proud-concept.jpg') }}">
        </div>
    </div>
    <div class="row">
        <div class="special-message col-md-12 mx-auto">
            <h1>～マンションブランド【プラウド】について～</h1>
            <p>野村不動産が手掛けるプラウドシリーズは、大規模マンションから一戸建住宅まで多種多様に展開されています。<br>マンションも低層タイプから超高層タイプまで幅広く、地域も閑静な住宅街や駅直結型、商業施設を併設するものなど様々。<br>中でもマンションブランドとしてのプラウドは、TVCMなど広告発信も盛んなことから認知度が高く、高級マンションとしてのブランド力を確立しています。<br>企画から施工、アフターサービスまで一貫して自社グループで完結しているのもブランドとしての強み。<br>メンテナンスや売却、賃貸サービスといった住宅購入後の運用についても、野村不動産カスタマークラブにてサポートを受けることができます。</p>
        </div>
    </div>
</div>

@endsection