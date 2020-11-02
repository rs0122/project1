@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="special-image col-md-12 mx-auto">
            <img src="{{ secure_asset('background-image/geo-concept.jpg') }}">
        </div>
    </div>
    <div class="row">
        <div class="special-message col-md-12 mx-auto">
            <h1>～マンションブランド【ジオ】について～</h1>
            <p>デベロッパー阪急阪神不動産が展開するもので、「ジオ」「ジオタワー」「ジオグランデ」があります。<br>関西では圧倒的な存在感があり、近年は首都圏での供給も増えています。（現在累計約1万5000戸を供給）グッドデザイン賞6年連続受賞。<br>阪急阪神不動産は、企画・設計・工事計画・工事・竣工までの5つのステップを取り組んでいるという点で他社とは異なるところです。<br>また、阪急グループの組織力を生かした豪華なアフターケアが魅力のひとつです。</p>
        </div>
    </div>
</div>

@endsection