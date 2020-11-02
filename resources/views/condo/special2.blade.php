@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="special-image col-md-12 mx-auto">
            <img src="{{ secure_asset('background-image/parkhouse-concept.jpg') }}">
        </div>
    </div>
    <div class="row">
        <div class="special-message col-md-12 mx-auto">
            <h1>～マンションブランド【ザ・パークハウス】について～</h1>
            <p>ザ・パークハウス―それは、決して流行に左右されるものではありません。<br>土地の風土や歴史と調和し、時を経るごとに深みを増していくこと。<br>そうすることで、街にも、住む人にも誇りを感じていただきたい。<br>私たちは「一生もの」にふさわしい価値を、お届けしていきます。</p>
        </div>
    </div>
</div>

@endsection