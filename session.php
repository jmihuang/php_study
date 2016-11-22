<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>

<!-- 設定session -->
<?php $_SESSION['user_id']=123;?>

<!-- 讀取session -->
<?php echo $_SESSION['user_id'] ?>
<!-- 刪除指定SEESION值 -->
<?php unset($_SESSION['user_id'])  ?>
<?php 
  if(isset($_SESSION['user_id'])){
     echo 'exist';
  }else{
     echo 'earse';
  } 

?>
<!-- 登入驗證 -->
 <?php
 $_SESSION['token']=rand(100,80);
?>

<form action="test.php" method="post">
  <label for="token" >驗證碼 : <?php  echo $_SESSION['token']; ?></label>
  <input type="text" name="token" id="token"/>
    <input type="submit"  />
</form>



<?php 

    /* 防止計數器灌水
    * cookie在瀏覽器重整時就會讀取一次 
    * session限制 瀏覽器在開啟的情況下計次只算一次
    */
    print_r($_SESSION);
    $expireToday = strtotime(date('Y-m-d 23:59:59'));//通过 strtotime() 函数创建日期和时间

    if(!isset($_SESSION['countOK'])){
        //session不存在時,才做cookie累加
        if(isset($_COOKIE['visitTimes'])){ 
             $visitTime = $_COOKIE['visitTimes'] + 1;       
             setcookie('visitTimes',$visitTime,$expireToday);
             $counter = $visitTime;
        }else{
             setcookie('visitTimes',1,$expireToday);
             $counter = 1;
        }
        $_SESSION['countOK'] = 1;//session寫入
        $counter = 1;
    }else{
      $counter = $_COOKIE['visitTimes'];     
    }

    echo '<p>這是你今天第'.$counter.'次造訪</p>';






?>


<!-- 版頭session login in -->
<?php 

  /*
  *設定session expired time
  *reference https://blog.longwin.com.tw/2008/10/php-set-session-expire-time-2008/
  */
  function startSession($expire = 0){
       //沒有設定時間 以php.ini為主
    print_r(session_get_cookie_params()); 
       if( $expire == 0 ){
          $expire = ini_get('session.gc_maxlifetime');
       }else{
          ini_set('session.gc_maxlifetime', $expire);
       };
   
      if( isset($_COOKIE['PHPSESSID'])){
        echo ini_get('timezone');
          //寫入session cookie過期時間
          /**顯示過期的時間
          $date = date_create();
          $timestamp = time() + $expire;
          $date->setTimestamp( $timestamp );
          echo $date->format('U = Y-m-d H:i:s') . "\n";
          **/
          setcookie('PHPSESSID', session_id(), time() + $expire);

       }else{
          session_set_cookie_params($expire);
          session_start();
       };
  }


  $setSessionExpiredMins = 10;

  startSession( $setSessionExpiredMins * 60 );
?>

<p></p>
</body>
</html>