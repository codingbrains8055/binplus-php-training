<?php 
if(isset($_GET)){
extract($_GET);
  echo $mail;
echo $cap;
echo "<br>";
echo $captcha;
  if(!preg_match("/[6-9]{1}+[0-9]{9}/", $number)){
    echo "Please enter Indian mobile number";
  }
  if(!preg_match("^(?=.*[A-Za-z])(?=.*\d)(?=.*[@!#*%?&])[A-Za-z\d@$!%*#?&]{8,}$", $mail)){
    echo "Not an email address";
  }
if($cap == $captcha){
  echo "success";
  //header('location:captch.php?success');
}else{
  echo "wrong captch";
  //header('location:captch.php?wrong_captcha');
}
}
?>