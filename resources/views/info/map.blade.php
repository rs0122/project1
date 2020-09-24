@extends('layouts.front')

@section('content')
<div class="row">
  <div id="header"><b>Google Maps - 場所検索</b></div>
    <div>施設名称検索 （例：マチュピチュ、万里の長城）</div>
    <input type="text" id="keyword"><button id="search">検索実行</button>
    <button id="clear">結果クリア</button>
    <div id="target"></div>
    <div class="col-md-12 mx-auto">
        <div id="map" style="height: 500px; width: 80%; margin: 2rem auto 0;"></div>


        <!-- jqueryの読み込む -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- google map api -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJzlLTLYrvAyFJOe6htRitJDAUSNlQViw"></script>
        <!-- js -->
        <script type="text/javascript">
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
            lat: -34.397, //緯度を設定
            lng: 150.644 //経度を設定
            },
            zoom: 8 //地図のズームを設定
        });
        
        document.getElementById('search').addEventListener('click', function() {

          var place = document.getElementById('keyword').value;
          var geocoder = new google.maps.Geocoder();      // geocoderのコンストラクタ

          geocoder.geocode({
            address: place
          }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {

              var bounds = new google.maps.LatLngBounds();

              for (var i in results) {
                if (results[0].geometry) {
                  // 緯度経度を取得
                  var latlng = results[0].geometry.location;
                  // 住所を取得
                  var address = results[0].formatted_address;
                  // 検索結果地が含まれるように範囲を拡大
                  bounds.extend(latlng);
                  // マーカーのセット
                  setMarker(latlng);
                  // マーカーへの吹き出しの追加
                  setInfoW(place, latlng, address);
                  // マーカーにクリックイベントを追加
                  markerEvent();
                }
              }
            } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
              alert("見つかりません");
            } else {
              console.log(status);
              alert("エラー発生");
            }
          });

        });
        
        </script>
    </div>
</div>

@endsection