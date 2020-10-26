@extends('layouts.front')

@section('content')
<div class="container">
<div class="row">
     <div class="col-md-12 mx-auto">
        <h1 class="condo-name">{{ $condo->condo }}</h1>
    </div>
</div>
<div class="row">
    <div class="condo-images col-md-6">
        <ul class="slider">
            <li><a href="{{ url('/condo1') }}"><img src="{{ $condo->image_path }}" alt="image01"></a></li>
            <li><a href="#"><img src="{{ $condo->image_path }}" alt="image02"></a></li>
            <li><a href="#"><img src="{{ $condo->image_path }}" alt="image03"></a></li>
            <li><a href="#"><img src="{{ $condo->image_path }}" alt="image04"></a></li>
            <li><a href="#"><img src="{{ $condo->image_path }}" alt="image05"></a></li>
        </ul>
        <ul class="thumb">
            <li><a href="#"><img src="{{ $condo->image_path }}" alt="image01"></a></li>
            <li><a href="#"><img src="{{ $condo->image_path }}" alt="image02"></a></li>
            <li><a href="#"><img src="{{ $condo->image_path }}" alt="image03"></a></li>
            <li><a href="#"><img src="{{ $condo->image_path }}" alt="image04"></a></li>
            <li><a href="#"><img src="{{ $condo->image_path }}" alt="image05"></a></li>
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
<hr color="#dcdcdc">
<div class="row">
    <div class="sales col-md-12 mx-auto">
        <h3>販売物件</h3>
    </div>
</div>
<div class="row">
    <div class="box8 col-lg-10 mx-auto border mb-4 p-2">
        <div class="row">
            <div class="sale-image col-md-4">
                <img src="{{ $condo->image_path }}">
            </div>
            <div class="salespoint col-md-8">
                <table class="table condo-table table-borderless">
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
                      <td>{{ str_limit($condo->place, 80) }}</td>
                    </tr>
                    <tr>
                      <th scope="row" class="table-active">専有面積</th>
                      <td>{{ str_limit($condo->area, 30) }}</td>
                    </tr>
                    <tr>
                      <th scope="row" class="table-active">間取り</th>
                      <td>{{ str_limit($condo->plan, 80) }}</td>
                    </tr>
                    <tr>
                      <th scope="row" class="table-active">築年数</th>
                      <td>{{ str_limit($condo->old, 80) }}</td>
                    </tr>
                    <tr>
                      <th scope="row" class="table-active">階数</th>
                      <td>{{ str_limit($condo->floor, 80) }}</td>
                    </tr>
                    <tr>
                      <th scope="row" class="table-active">向き</th>
                      <td>{{ str_limit($condo->direction, 80) }}</td>
                    </tr>
                    <tr>
                      <th scope="row" class="table-active">管理費</th>
                      <td>{{ str_limit($condo->expense, 80) }}</td>
                    </tr>
                    <tr>
                      <th scope="row" class="table-active">修繕積立金</th>
                      <td>{{ str_limit($condo->fix, 80) }}</td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
