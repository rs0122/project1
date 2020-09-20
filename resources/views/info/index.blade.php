@extends('layouts.front')

@section('content')
        <div class="row">
            <div class="mainVidulal">
                <video id="mainVideo" src="storage/sample1.mp4" loop autoplay muted></video>
            </div>
                <h1 class="top-message">Let's start your new Life!</h1>
                <form action="forms/notify.php" method="post" role="form" class="php-email-form">
                    <div class="row no-gutters">
                      <div class="col-md-6 form-group mx-auto">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Search:place" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                        <div class="text-center">
                            <button type="button" class="btn-dark">Search!</button>
                        </div>
                      </div>
                    </div>
                </form>
        </div>
        <div class="row">
            <div class="contents col-md-12 mx-auto">
                <p class="pp">Special feature</p>
                <p class="ppp">～人気マンション特集～</p>
                <div class="row">
                <div class="item col-md-3">
                    <a href="#"><img src="storage/ジオ.jpg"></a>
                    <div class="logo">
                        <img src="storage/ジオロゴ.jpg">
                    </div>
                </div>
                <div class="item col-md-3">
                    <a href="#"><img src="storage/パークハウス.jpg"></a>
                    <div class="logo">
                        <img src="storage/パークハウスロゴ.jpg">
                    </div>
                </div>
                <div class="item col-md-3">
                  <a href="#"><img src="storage/ブランズ.jpg"></a>
                  <div class="logo">
                        <img src="storage/ブランズロゴ.jpg">
                    </div>
                 </div>
                 <div class="item col-md-3">
                    <a href="#"><img src="storage/プラウド.jpg"></a>
                    <div class="logo">
                        <img src="storage/プラウドロゴ.jpg">
                    </div>
                </div>
                </div>
            </div>
        </div>
        <h2 class="text-center">Column</h2>
        <p class="text-center">～コラム～</p>
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h3>{{ str_limit($headline->title, 70) }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
        <div class="row">
            <div id="map"></div>
 
<script src="https://maps.googleapis.com/maps/api/js?key={AIzaSyCJzlLTLYrvAyFJOe6htRitJDAUSNlQViw}"></script>
<script>
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

        // 検索実行ボタンが押下されたとき
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

        // 結果クリアーボタン押下時
        document.getElementById('clear').addEventListener('click', function() {
          deleteMakers();
        });

      }

      // マーカーのセットを実施する
      function setMarker(setplace) {
        // 既にあるマーカーを削除
        deleteMakers();

        var iconUrl = 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png';
          marker = new google.maps.Marker({
            position: setplace,
            map: map,
            icon: iconUrl
          });
        }

        //マーカーを削除する
        function deleteMakers() {
          if(marker != null){
            marker.setMap(null);
          }
          marker = null;
        }

        // マーカーへの吹き出しの追加
        function setInfoW(place, latlng, address) {
          infoWindow = new google.maps.InfoWindow({
          content: "<a href='http://www.google.com/search?q=" + place + "' target='_blank'>" + place + "</a><br><br>" + latlng + "<br><br>" + address + "<br><br><a href='http://www.google.com/search?q=" + place + "&tbm=isch' target='_blank'>画像検索 by google</a>"
        });
      }

      // クリックイベント
      function markerEvent() {
        marker.addListener('click', function() {
          infoWindow.open(map, marker);
        });
      }
</script>
        </div>
@endsection