<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>
<!-- 設定cookie -->
<?php
    setcookie("times", $_COOKIE['times']+1, time()+3600);  
?>
<!-- 讀取cookie值 -->
<?php print_r($_COOKIE['times']); ?>
<!-- 刪除cookie值 -->
<?php setcookie("times", "", time()-3600); ?>
<!-- 第一次開網站時顯示 : 初次見面你好 -->
<?php 
    if(isset($_COOKIE['times'])){
      setcookie("times", 1, time()+3600);
      echo '初次見面你好';
    }else{
      $times = $_COOKIE['time']+1;
      setcookie("times", $times, time()+3600);
      echo '這是第'.$times.'造訪';
    }
?> 

<!-- 瀏覽本頁次數 過了今天就清除 -->

<?php
   if(isset($_COOKIE['visitTimes'])){
   	   $visitTime = $_COOKIE['visitTimes'] + 1;
   	   $expireToday = strtotime(date('Y-m-d 23:59:59'));//通过 strtotime() 函数创建日期和时间
   	   setcookie('visitTimes',$visitTime,$expireToday);
       echo '<p>這是你今天第'.$visitTime.'次造訪</p>';
   }else{
   	   setcookie('visitTimes',1,$expireToday);
   	   echo '<p>這是你今天第1次造訪</p>';
   }
?>


<!-- 當天過期 -->
<?php 
  
  $setttime = strtotime(date('Y-m-d 23:59:59'));
  echo $setttime;
  setcookie('aa','aaaaa|'.$setttime , $setttime);
  $datett = new DateTime();
  list($value, $expiry) = explode("|", $_COOKIE["aa"]); 
  $datett->setTimestamp( $expiry );
  echo '取出過期的時間是:'.$datett ->format('U = Y-m-d H:i:s') . "\n";


 ?>



</body>
</html>