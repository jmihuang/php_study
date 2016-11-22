<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>
    
    
  <?php
  
  //fopen 用法 http://php.net/function.fopen
  //開新檔案
  $fh = fopen('fopen_a.php', 'a');
  //寫入資料
  fwrite($fh, '<h1>Hello world!</h1>');
  fclose($fh);
  //刪除檔案
  // unlink('fopen_a.php');
  $file = fopen("test.txt","r");

  ?>

</body>
</html>

