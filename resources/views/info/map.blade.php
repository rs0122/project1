@extends('layouts.front')

@section('content')
<div class="container">
<div class="row">
    <div class="search col-10-md">
        <h1>Search</h1>
        <p>※アイコンをクリックし、画像をクリックすると物件の詳細を確認できます。</p>
    </div>
</div>
<div class="row">
    <div class="search col-10-md">
        <input type="text" id="keyword" value="{{ $keyword }}"><button id="search">検索実行</button>
        <button id="clear">結果クリア</button>
    </div>
</div>
<div id="map"></div>
</div>

<script>

var infoWindow = [];
var condomarker = [];
/*var markerData = [ // マーカーを立てる場所名・緯度・経度
  {
       name: 'ローレルコート西宮北口',
       lat: 34.750529,
        lng: 135.354885,
        image: '<a href="/condo1"><img src ="storage/ローレルコート西宮北口.jpg" style="width: 150px; height: 120px;" class="map-image"></a>'
 }, {
        name: 'ルネグラン西宮北口昭和園',
     lat: 34.746234,
        lng: 135.352181,
        image: '<a href="#"><img src ="storage/ルネグラン西宮北口昭和園.jpg" style="width: 150px; height: 120px;" class="map-image"></a>'
 }, {
        name: 'ジオ・ウェリス西宮北口',
     lat: 34.743775,
      lng: 135.353924,
      image: '<a href="#"><img src ="storage/ジオ・ウェリス西宮北口.jpg" style="width: 150px; height: 120px; class="map-image"></a>'
 }, {
        name: 'ジオ西宮北口クラウンズ',
        lat: 34.746571,
        lng: 135.365352,
        image: '<a href="#"><img src ="storage/ジオ西宮北口クラウンズ.jpg" style="width: 150px; height: 120px; class="map-image"></a>'
 }, {
        name: 'ジオ西宮北口ガーデンズ',
     lat: 34.740184,
     lng: 135.354505,
     image: '<a href="#"><img src ="storage/ジオ西宮北口ガーデンズ.jpg" style="width: 150px; height: 120px; class="map-image"></a>'
 }
];*/

  document.addEventListener('DOMContentLoaded', function(){
      initMap();
      showMap();
  }, false);
function initMap() {
 
  
  document.getElementById('search').addEventListener('click', function() {
   showMap(); 
  });
}
 var map;
function showMap() {
  var target = document.getElementById('map'); //マップを表示する要素を指定
var address = document.getElementById('keyword').value;
    var geocoder = new google.maps.Geocoder();  
  
    geocoder.geocode({ address: address }, function(results, status){
      if (status === 'OK' && results[0]){
  
          map = new google.maps.Map(target, {  
           center: results[0].geometry.location,
           zoom: 17
         });
        var markerD = [];

  // DB情報の取得(ajax)
      $(function(){
        $.ajax({
          type: "GET",
          url: "api/condos",
          dataType: "json",
          success: function(data){
            markerD = data;
            setMarker(markerD);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown){
            alert('Error : ' + errorThrown);
          }
        });
      });
        /* var marker = new google.maps.Marker({
           position: results[0].geometry.location,
           map: map,
           animation: google.maps.Animation.DROP
         });*/
      }else{ 
        //住所が存在しない場合の処理
        alert('住所が正しくないか存在しません。');
        target.style.display='none';
      }
      
     /* for (var i = 0; i < markerData.length; i++) {
        var markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
        condomarker[i] = new google.maps.Marker({ // マーカーの追加
         position: markerLatLng, // マーカーを立てる位置を指定
            map: map, // マーカーを立てる地図を指定
            icon: 'storage/ビルのアイコン素材 その2 (1).png',//マーカー画像URL
       }); 
       
       infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
         content: '<div class="sample">' + markerData[i]['name'] + '</div>' + markerData[i]['image'] // 吹き出しに表示する内容
       });
       
       markerEvent(i);
           } */
           
    });
    
    /*function markerEvent(i) {
    condomarker[i].addListener('click', function() { // マーカーをクリックしたとき
      infoWindow[i].open(map, condomarker[i]); // 吹き出しの表示
  });
}*/


 }
 
var marker = [];
      function setMarker(markerData) {
        // console.log(markerData);
        // console.log(markerData.length);

        //マーカー生成
        var sidebar_html = "";
        var icon;
          console.log(markerData);
        for (var i = 0; i < markerData.length; i++) {
          
          var latNum = parseFloat(markerData[i]['lat']);
          var lngNum = parseFloat(markerData[i]['lng']);
          //console.log(latNum);
          // マーカー位置セット
          var markerLatLng = new google.maps.LatLng({
            lat: latNum,
            lng: lngNum
          });
          // マーカーのセット
          marker[i] = new google.maps.Marker({
            position: markerLatLng,          // マーカーを立てる位置を指定
            map: map,          // マーカーを立てる地図を指定
            icon: '{{ secure_asset("background-image/house-iconS.png") }}',//マーカー画像URL
            animation: google.maps.Animation.DROP
          });
          
          infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
         content: '<div class="sample">' + markerData[i]['condo'] + '</div>' + "<a href='#'><img src=" + markerData[i]['image_path'] + ' class="map-image"></a>'// 吹き出しに表示する内容
          });
          
          // マーカーにクリックイベントを追加
          markerEvent(i);
        }
    }
    
      var openWindow;


      function markerEvent(i) {
        marker[i].addListener('click', function() {
          myclick(i);
        });
      }

      function myclick(i) {
        if(openWindow){
          openWindow.close();
        }
        infoWindow[i].open(map, marker[i]);
        openWindow = infoWindow[i];
      }


</script>

<script src="//maps.google.com/maps/api/js?key=AIzaSyCJzlLTLYrvAyFJOe6htRitJDAUSNlQViw&callback=initMap"></script>

</div>

@endsection

