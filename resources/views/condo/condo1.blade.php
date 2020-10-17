@extends('layouts.front')

@section('content')
<div class="row">
     <div class="col-md-12 mx-auto">
        <h1 class="condo-name">{{ $condo->condo }}</h1>
    </div>
</div>
<div class="row">
    <div class="condo-images col-md-6">
        <ul class="slider">
            <li><a href="{{ url('/condo1') }}"><img src="{{ asset('storage/image/' . $condo->image_path) }}" alt="image01"></a></li>
            <li><a href="#"><img src="{{ asset('storage/image/' . $condo->image_path) }}" alt="image02"></a></li>
            <li><a href="#"><img src="{{ asset('storage/image/' . $condo->image_path) }}" alt="image03"></a></li>
            <li><a href="#"><img src="{{ asset('storage/image/' . $condo->image_path) }}" alt="image04"></a></li>
            <li><a href="#"><img src="{{ asset('storage/image/' . $condo->image_path) }}" alt="image05"></a></li>
        </ul>
        <ul class="thumb">
            <li><a href="#"><img src="{{ asset('storage/image/' . $condo->image_path) }}" alt="image01"></a></li>
            <li><a href="#"><img src="{{ asset('storage/image/' . $condo->image_path) }}" alt="image02"></a></li>
            <li><a href="#"><img src="{{ asset('storage/image/' . $condo->image_path) }}" alt="image03"></a></li>
            <li><a href="#"><img src="{{ asset('storage/image/' . $condo->image_path) }}" alt="image04"></a></li>
            <li><a href="#"><img src="{{ asset('storage/image/' . $condo->image_path) }}" alt="image05"></a></li>
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
    <div class="condo-description col-md-6">
        <h2>～マンション概要～</h2>
        <p class="comment">{{ $condo->description }}</p>
    </div>
</div>

@endsection