"use strict";
// =====================================
//  MAP表示処理
// =====================================
const key = "fa8da5f4fd78f601ad834cfc47e3c750"; //自分のKEY
const lat = "34.60582914367615"; // 自宅の経度
const lon = "135.5654496010349"; // 自宅の経度
const icon = "http://openweathermap.org/img/wn/"; //ICONにアクセスするURL

// =====================================
//  OpenweaherAPI (天気情報を取得) 5day/3hour
// =====================================
const url = "https://api.openweathermap.org/data/2.5/forecast?lat=" + lat + "&lon=" + lon + "&appid=" + key + "&lang=ja";

$.ajax({
  url: url,
  type: "get",
  cache: false,
  dataType: "json",
}).done(function (data) {
  //   console.log(data.list[0].dt_txt); // オブジェクト変数を確認
  console.log(data); // オブジェクト変数を確認]
  let html = "";
  for (let i = 0; i < data.list.length; i++) {
    html += `
        <div>
            <div>時刻：${data.list[i].dt_txt}</div>
            <div>風速：${data.list[i].wind.speed}</div>
            <div>気圧：${data.list[i].main.pressure}hPa</div>
            <div>天気：${data.list[i].weather[0].description}</div>
            <div><img src="${icon + data.list[i].weather[0].icon}@2x.png"></div>
        </div>
    `;
  }
  $("#view").append(html);
  //場所
  $("#area").html(data.city.name);
});
