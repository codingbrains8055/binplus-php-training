<?php 
    $captcha =  rand(1000, 9999);
?>
<html>
<head>
  
  </head>
  <body>
  <form method="get" action=vld.php>
    <fieldset>
      <input type=email placeholder="enter your email here" name=mail />
      <input type=text placeholder="enter your number here" name=number pattern="[6-9]{1}+[0-9]{9}"/>
       <input type=number  name="cap" placeholder="captcha here"/>  
      <span><?php echo $captcha;?></span>
      <input type=hidden value="<?php echo $captcha;?>" name="captcha"/>
  <input type=submit value="submit"/>
    </fieldset>
    </form>
  </body>
</html>