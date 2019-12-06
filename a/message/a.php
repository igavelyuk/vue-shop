<?php
$data = json_decode(file_get_contents('php://input'), true);
// if (isset($data["."])) {
//   echo "OK999";
//   print_r("OK999");
//   send_mail($data);
// }
send_mail($data);
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
  // $location_message = get_ip();
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
      <table style="border-bottom:1px solid #3b6e93" width="100%" cellspacing="0" cellpadding="0">
      <tbody>
      <tr>
      <td style="padding:5px 10px" width="40%" valign="middle" align="left">
      <a href="pandabc.site" style="text-decoration:none; border-radius:75px;" target="_blank" data-saferedirecturl="https://pizzapandabc.com.ua/">
      <div>
      <div style="height:150px;width:150px; background:#05c820; color:white; border-radius:75px;">
      <div style="height:65px;">
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
      $currentprice="Вартість";
      $lastprice="Вартicть без знижки";
      $description="Опис";
      $icon="Значок";
      $id="id";
      $name="Назва";
      $picture="картина";
      $promo="Акційний";
      $quantity="Кількість";
      $size="Розмір";
      $date="Дата та врем'я додатку у кошик";
      $finalprice="Ціна з урахуванням кількості, без акціі"
      $body.= '<div style="padding:5px;margin:10px;font-size:2em">Деталі замовлення - '.$formatted.'</div>';
      foreach ($data["products"]as $subnode) {
        $body.= '<div style="font-size:1em">';
        foreach ($subnode as $key => $value) {
          if ($key!='id') {
            if ($key!='icon') {
              if ($key!='picture') {
                switch ($key) {
                  case "currentprice":
                  $body.= '<div style="font-size:1em">'.$key.': '.$value.'</div>';
                  break;
                  case 1:
                  $body.= '<div style="font-size:1em">'.$key.': '.$value.'</div>';
                  break;
                  case 2:
                  $body.= '<div style="font-size:1em">'.$key.': '.$value.'</div>';
                  break;
                  default:
                  $body.= '<div style="font-size:1em">'.$key.': '.$value.'</div>';
                }
              }else{
                $body.= '<img height="100px" width="100px" src ="'.$value.'"/>';
              }
            }
          }
        }
        $body.= '</div>';
      }
      //
      // $body.= '<div style="padding:5px;margin:10px;font-size:1.5em">'.'</div>';
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
      $body.= '<hr style="border:0;color:#ccc;background-color:#ccc;height:1px;width:100%;text-align:left">
      <div style="color:#666;font-size:11px;padding:20px 10px 10px">
      З повагою, служба доставки їжі "Панда Біла Церква".<br>
      Даний лист сформовано автоматично, прохання не відповідати на нього по електронній пошті.<br>
      горяча ліния: Kiyvstar (096)41-41-096 и Life Cell (063)41-41-096 <br>
      Також якщо відбулися технічні проблеми напишіть лист <a href="mailto:support@pizzapandabc.com.ua" target="_blank" data-saferedirecturl="pizzapandabc.com.ua">support@pizzapandabc.com.ua</a><br>
      </div>
      </td>
      </tr>
      </tbody>
      </table>
      <div style="text-align:center;color:#666;font-size:11px;padding:20px 50px 10px 50px">
      Copyright © 2006—2019
      <a href="pizzapandabc.com.ua" target="_blank" data-saferedirecturl="pizzapandabc.com.ua">
      "'.$slogan.'"</a>
      </div>
      </td>
      </tr>
      </tbody>
      </table></body></html>';
      mail($to_email, $subject, $body, $headers);
}
// function get_ip(){
//   function get_client_ip_env() {
//       $ipaddress = '';
//       if (getenv('HTTP_CLIENT_IP'))
//           $ipaddress = getenv('HTTP_CLIENT_IP');
//       else
//       if(getenv('HTTP_X_FORWARDED_FOR'))
//           $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
//       else if(getenv('HTTP_X_FORWARDED'))
//           $ipaddress = getenv('HTTP_X_FORWARDED');
//       else if(getenv('HTTP_FORWARDED_FOR'))
//           $ipaddress = getenv('HTTP_FORWARDED_FOR');
//       else if(getenv('HTTP_FORWARDED'))
//           $ipaddress = getenv('HTTP_FORWARDED');
//       else if(getenv('REMOTE_ADDR'))
//           $ipaddress = getenv('REMOTE_ADDR');
//       else
//           $ipaddress = 'UNKNOWN';
//       return $ipaddress;
//   }
//   $ip = get_client_ip_env();
//   $access_key = '5a9d245a0d7a8992f1dd9e953c4cd7d5';
//   $ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   $json = curl_exec($ch);
//   curl_close($ch);
//   $api_result = json_decode($json, true);
//   return $api_result["city"].'Геокоордінати на <a href="https://www.latlong.net/c/?lat='.$api_result["latitude"].'&long='.$api_result["longitude"].'">Перейти</a>';
// }
?>
