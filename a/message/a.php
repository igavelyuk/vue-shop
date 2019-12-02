<?php
$data = json_decode(file_get_contents('php://input'), true);
  // echo "test1 " . $_POST['products'] . "<br>";
  // echo "test2 " . $_POST['total_price'] . "<br>";
  // echo "test5 " . $_POST['telephone'] . "<br>";
  // echo "test6 " . $_POST['security'];
  //
  // echo "First part pass";
  // notcall:notcall,
  // input_address:inputAddress,
  // input_city:inputCity,
  // input_state:inputState

  $products = $_POST['products'];
  $total_price = $_POST['total_price'];
  $to_email = "order@pizzapandabc.com.ua";
  $now = new DateTime();
  $formatted = $now->format('Y-m-d H:i:s');    // MySQL datetime format
  $timestamp = $now->getTimestamp();           // Unix Timestamp -- Since PHP 5.3

  $subject = "Нове замовлення ".$formatted;
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  // Create email headers
      $headers .= "From: order@pizzapandabc.com.ua"."\r\n".
      'Reply-To: '.$from."\r\n" .
      'X-Mailer: PHP/' . phpversion();
      // Compose a simple HTML email message
      $body.=$data['products'];
      mail($to_email, $subject, $body, $headers);
      echo ('true');
?>
