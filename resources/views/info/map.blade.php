@extends('layouts.front')

@section('content')

<div id="header"><b>Google Maps - 場所検索</b></div>
    <div>施設名称検索 （例：マチュピチュ、万里の長城）</div>
    <input type="text" id="keyword"><button id="search">検索実行</button>
    <button id="clear">結果クリア</button>
    <div id="target"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCJzlLTLYrvAyFJOe6htRitJDAUSNlQViw&callback=initMap" async defer></script>
    <script type="text/javascript">

      var map;
      var marker;
      var infoWindow;

      function initMap() {

        //マップ初期表示の位置設定
        var target = document.getElementById('target');
        var centerp = {lat: 37.67229496806523, lng: 137.88838989062504};

        //マップ表示
        map = new google.maps.Map(target, {
          center: centerp,
          zoom: 2,
        });
        
        marker = new google.maps.Marker({
          position: centerp,
          map: map
        });
        
        var geocoder = new google.maps.Geocoder();
        
      }
    </script>

@endsection