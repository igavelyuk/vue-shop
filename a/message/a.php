<?php
$data = json_decode(file_get_contents('php://input'), true);
// if (isset($data["."])) {
//   echo "OK999";
//   print_r("OK999");
//   send_mail($data);
// }
// $body.= '<p>'.$data['event'].' </p>';
// $asdf = $data['sender'];
// $body.= '<p>'.$asdf['id'].' </p>';
// $asdf = $data['user'];
// $body.= '<p>---------'.$asdf['id'].' </p>';
if(isset($data['.'])&&$data['.']=='.'){
  if(!isset($data['event'])){
    send_mail($data);
    viberMessage($data);
  }
  die();
}
die();
// foreach ($data["products"]as $subnode) {
//   foreach ($subnode as $key => $value) {
//     echo "{$key} => {$value} ";
//     print_r($arr);
//   }
// }

function send_mail($data){
  $slogan = "Панда Біла Церква";
  $to_email = "order@pizzapandabc.com.ua";
  $now = new DateTime();
  $formatted = $now->format('Y-m-d H:i:s');    // MySQL datetime format
  $timestamp = $now->getTimestamp();           // Unix Timestamp -- Since PHP 5.3
  $location_message = get_ip();
  $subject = "Pizza нове замовлення ".$formatted;
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  // Create email headers
  $headers .= "From: order@pizzapandabc.com.ua"."\r\n".
  'Reply-To: '.$from."\r\n" .
  'X-Mailer: PHP/' . phpversion();
      // Compose a simple HTML email message
      $body='<html><body><meta http-equiv="Content-Type" content="text/html charset=UTF-8" /><table style="font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px" width="100%" cellspacing="0" cellpadding="10" bgcolor="#ffe0e0 ">
      <tbody>
      <tr>
      <td valign="top" align="center">
      <table style="padding:20px" width="80%" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
      <tbody>
      <tr>
      <td>
      <table style="border-bottom:1px solid #8B293B" width="100%" cellspacing="0" cellpadding="0">
      <tbody>
      <tr>
      <td style="padding:5px 10px" width="40%" valign="middle" align="left">
      <a href="https://pizzapandabc.com.ua" style="text-decoration:none; border-radius:75px;" target="_blank" data-saferedirecturl="https://pizzapandabc.com.ua/">
      <div>
      <div style="height:100px;width:100px; background:#8B293B; color:white; border-radius:75px;">
      <div style="height:45px;">
      </div>
      <div style="width:100%; text-align:center;background:white;font-family:Arial; color:black;">
      Pizza Panda
      </div>
      </div>
      </div>
      </a>
      </td>
      <td style="padding:5px 10px" width="60%" valign="middle" align="right">
      <h1 style="font-size:20px;color:#3b6e93;margin-top:0px;font-weight:normal">Pizza Панда Біла Церква</h1>
      <div style="color:#666;font-size:11px">Автоматизований сервіс доставки їжі</div>
      </td>
      </tr>
      </tbody>
      </table>';
      $currentprice='Вартість';
      $lastprice='Вартicть без знижки';
      $description='Опис';
      $icon='Значок';
      $id='id';
      $name='Назва';
      $picture='картина';
      $promo='Акційний';
      $quantity='Кількість';
      $size='Розмір';
      $date='Дата та время додатку у кошик';
      $finalprice="Ціна з урахуванням кількості, без акціі";
      // $body.= '<div style="padding:5px;margin:10px;font-size:2em">Деталі замовлення - '.$formatted.'</div>';
      foreach ($data["products"]as $subnode) {
        // $body.= '<p>'.$subnode.'</p>';
        // $body.= '<div style="font-size:1em">';
        $body.= '<div>';
        $body.= '<span> <img src = "'.$subnode['icon'].'" height="50px" width="50px">';
        $body.= '<b>'.$subnode['name'].': '.$subnode['currentprice'].'грн x '.$subnode['quantity'].'шт = '.$subnode['finalprice'].'грн | розмір'.$subnode['size'].'</b> </span>';
        $body.= '</div>';
        // $body.= '</div>';
      }
      // pickup: this.isDelivery,
      // address: this.address,
      // housenum: this.housenum,
      // yourname: this.yourname,
      // yourtell: this.yourtell,
      // additionalinfo: this.additionalinfo
      $subnode = $data['delivery'];
      $body.= '<br><p>Доставка: Біла Церква </p>';
      $body.= '<p><b>'.$subnode['address'].': '.$subnode['housenum'].'</b> , додаткова інформація '.$subnode['additionalinfo'].' </p>';
      $body.= '<p>'.$subnode['yourname'].', тел:'.$subnode['yourtell'].'</p>';
      $body.= '<div>'.$location_message.'</div>';

//       {
//    "event":"conversation_started",
//    "timestamp":1457764197627,
//    "message_token":4912661846655238145,
//    "type":"open",
//    "context":"context information",
//    "user":{
//       "id":"01234567890A=",
//       "name":"John McClane",
//       "avatar":"http://avatar.example.com",
//       "country":"UK",
//       "language":"en",
//       "api_version":1
//    },
//    "subscribed":false
// }
// $body.= '<p>'.$data['event'].' </p>';
// $asdf = $data['sender'];
// $body.= '<p>'.$asdf['id'].' </p>';
// $asdf = $data['user'];
// $body.= '<p>----------'.$asdf['id'].' </p>';
      // $body.= '<div style="padding:5px;margin:10px;text-align:right;font-size:1.5em"> Загальна сума: '.'грн</div><hr>';
      // // if($selfvinos=="true"){
      // //   $body.= '<div style="padding:5px;margin:10px;text-align:right;font-size:1.5em"> Кліент бажае забрати сам </div><hr>';
      // // }else{
      // //   $body.= '<div style="padding:5px;margin:10px;text-align:right;font-size:1.5em"> Адреса '.'</div><hr>';
      // // }
      // $body.= '<div style="padding:5px;margin:10px;text-align:right;font-size:1.5em"> Телефон заказчика: +38 '.'</div><hr>';
      // $body.= '<div style="padding:5px;margin:10px;text-align:center;">'.' .</div><hr>';
      // $body.= '<div style="padding:5px;margin:10px;text-align:center;color:green;">Місцезнаходження, оределенно як: '.$location_message.'</div><hr>';
      //main part
      // $body.= '<hr style="border:0;color:#ccc;background-color:#ccc;height:1px;width:100%;text-align:left">
      // <div style="color:#666;font-size:11px;padding:20px 10px 10px">
      // З повагою, служба доставки їжі "Панда Біла Церква".<br>
      // Даний лист сформовано автоматично, прохання не відповідати на нього по електронній пошті.<br>
      // горяча ліния: Kiyvstar (096)41-41-096 и Life Cell (063)41-41-096 <br>
      // Також якщо відбулися технічні проблеми напишіть лист <a href="mailto:support@pizzapandabc.com.ua" target="_blank" data-saferedirecturl="pizzapandabc.com.ua">support@pizzapandabc.com.ua</a><br>
      // </div>
      // </td>
      // </tr>
      // </tbody>
      // </table>
      // <div style="text-align:center;color:#666;font-size:11px;padding:20px 50px 10px 50px">
      // Copyright © 2006—2019
      // <a href="pizzapandabc.com.ua" target="_blank" data-saferedirecturl="pizzapandabc.com.ua">
      // "'.$slogan.'"</a>
      // </div>
      // </td>
      // </tr>
      // </tbody>
      // </table></body></html>';
      mail($to_email, $subject, $body, $headers);
}
function get_ip(){
  function get_client_ip_env() {
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
      else
      if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
          $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
      else
          $ipaddress = 'UNKNOWN';
      return $ipaddress;
  }
  $ip = get_client_ip_env();
  $access_key = '5a9d245a0d7a8992f1dd9e953c4cd7d5';
  $ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $json = curl_exec($ch);
  curl_close($ch);
  $api_result = json_decode($json, true);
  return $api_result["city"].'Геокоордінати на <a href="https://www.latlong.net/c/?lat='.$api_result["latitude"].'&long='.$api_result["longitude"].'">Перейти</a>';
}

function viberMessage($data){
  $now = new DateTime();
  $formatted = $now->format('Y-m-d H:i:s');
  $url = "https://chatapi.viber.com/pa/broadcast_message";
  $ch = curl_init($url);
  $body = '{"auth_token":"4aaf0fa9fc67d6b6-b94b6c7e6ff45df6-59e9dc7ae9aa80c1",
   "receiver": "7HxXhTO85Ws/8c8W/L3T1g==",
   "min_api_version":1,
   "sender":{
      "name":"Піцца Панда",
      "avatar":"https://pizzapandabc.com.ua/img/icons/favicon-32x32.png"
   },
   "broadcast_list":[
     "TCCxdJo6rbUtJUEp5ms0ow==",
     "7HxXhTO85Ws/8c8W/L3T1g==",
     "DLE2ERqX8BKFFBCVGwsM7A=="
   ],
   "tracking_data":"tracking data",
   "type":"text","text":"';

   foreach ($data["products"]as $subnode) {
     // $body.= '<p>'.$subnode.'</p>';
     // $body.= '<div style="font-size:1em">';
    $promodescription=$subnode['activedailypromo'];
     $body.= ''.$subnode['name'].': '.$subnode['currentprice'].'грн x '.$subnode['quantity'].'шт = '.$subnode['finalprice'].'грн | розмір='.$subnode['size'].' | '.$promodescription.'($)';
     // $body.= '</div>';
   }
   $subnode = $data['delivery'];
   $body.= 'Доставка: Біла Церква';
   $body.= ''.$subnode['address'].': '.$subnode['housenum'].' , додаткова інформація '.$subnode['additionalinfo'];
   $body.= ''.$subnode['yourname'].', тел:'.$subnode['yourtell'].'';
   $body.= ''.$location_message.'"}';

  // curl_setopt($ch, CURLOPT_URL, $url);
  //$jsonData = json_encode($data);
  curl_setopt($ch, CURLOPT_POST,1);
  //edited
  curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
  curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
  curl_exec($ch);
}

function viberServiceMessage($data){
  $now = new DateTime();
  $formatted = $now->format('Y-m-d H:i:s');
  $url = "https://chatapi.viber.com/pa/broadcast_message";
  $ch = curl_init($url);
  $body = '{"auth_token":"4aaf0fa9fc67d6b6-b94b6c7e6ff45df6-59e9dc7ae9aa80c1",
   "receiver": "7HxXhTO85Ws/8c8W/L3T1g==",
   "min_api_version":1,
   "sender":{
      "name":"Піцца Панда",
      "avatar":"https://pizzapandabc.com.ua/img/icons/favicon-32x32.png"
   },
   "broadcast_list":[
      "TCCxdJo6rbUtJUEp5ms0ow==",
      "7HxXhTO85Ws/8c8W/L3T1g==",
      "DLE2ERqX8BKFFBCVGwsM7A=="
   ],
   "tracking_data":"tracking data",
   "type":"text","text":"';
   foreach ($data["products"]as $subnode) {
     $promodescription=$subnode['activedailypromo'];
     // $body.= '<p>'.$subnode.'</p>';
     // $body.= '<div style="font-size:1em">';
     $body.= '<3'.$subnode['name'].': '.$subnode['currentprice'].'грн x '.$subnode['quantity'].'шт = '.$subnode['finalprice'].'грн | розмір'.$subnode['size'].' | '.$promodescription.'($) | ';
     // $body.= '</div>';
   }
   $subnode = $data['delivery'];
   $body.= 'Доставка: Біла Церква';
   $body.= 'вул.'.$subnode['address'].' :дом '.$subnode['housenum'].', додаткове інфо '.$subnode['additionalinfo'];
   $body.= 'Імя '.$subnode['yourname'].', тел:'.$subnode['yourtell'].'';
   $body.= ''.$location_message.'"}';

  // curl_setopt($ch, CURLOPT_URL, $url);
  //$jsonData = json_encode($data);
  curl_setopt($ch, CURLOPT_POST,1);
  //edited
  curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
  curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
  curl_exec($ch);
}
?>
