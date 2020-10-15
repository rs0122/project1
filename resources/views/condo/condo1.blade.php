@extends('layouts.front')

@section('content')
<div class="row">
     <div class="col-md-12 mx-auto">
        <h1 class="condo-name"></h1>
    </div>
</div>
<div class="row">
    <div class="condo-images col-md-6">
        <ul class="slider">
            <li><a href="{{ url('/condo1') }}"><img src="storage/ローレルコート西宮北口.jpg" alt="image01"></a></li>
            <li><a href="#"><img src="storage/ルネグラン西宮北口昭和園.jpg" alt="image02"></a></li>
            <li><a href="#"><img src="storage/ジオ・ウェリス西宮北口.jpg" alt="image03"></a></li>
            <li><a href="#"><img src="storage/ジオ西宮北口クラウンズ.jpg" alt="image04"></a></li>
            <li><a href="#"><img src="storage/ジオ西宮北口ガーデンズ.jpg" alt="image05"></a></li>
        </ul>
        <ul class="thumb">
            <li><a href="#"><img src="storage/ローレルコート西宮北口.jpg" alt="image01"></a></li>
            <li><a href="#"><img src="storage/ルネグラン西宮北口昭和園.jpg" alt="image02"></a></li>
            <li><a href="#"><img src="storage/ジオ・ウェリス西宮北口.jpg" alt="image03"></a></li>
            <li><a href="#"><img src="storage/ジオ西宮北口クラウンズ.jpg" alt="image04"></a></li>
            <li><a href="#"><img src="storage/ジオ西宮北口ガーデンズ.jpg" alt="image05"></a></li>
        </ul>
        <script type="text/javascript">
            $('.slider').slick({
                arrows:false,
                asNavFor:'.thumb',
            });
            $('.thumb').slick({
                asNavFor:'.slider',
                focusOnSelect: true,
                slidesToShow:4,
                slidesToScroll:1
            });
        </script>
    </div>
</div>

@endsection