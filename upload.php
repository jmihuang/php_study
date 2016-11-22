<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<style> 
  table tr td{
     border:solid 1px #666;
  }
</style>
<body>
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" enctype="multipart/form-data">
      <input name="file_upload" type="file" id="file_upload">
      <input type="submit" name="Submit" value="確定上傳">
 

      <input type="submit" value="登入" />
    <input type="reset" value="重填" />
</form>

<!-- move_uploaded_file(暫存檔案名稱,目的路徑及檔名) -->
<?php
   if( isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] == 0){
      if( move_uploaded_file($_FILES['file_upload']['tmp_name'],'./upload/'.$_FILES['file_upload']['name'])){
        echo '上傳成功<br/>';
        echo '檔案名稱:'.$_FILES['file_upload']['name'];
        echo '檔案類型<br/>'.$_FILES['file_upload']['type'];
        echo '檔案大小<br/>'.$_FILES['file_upload']['size'];
      }
   }


?>
<table id="uploads">

<!-- 叫出全部已經上傳的檔案/檔案尺寸 -->
<?php 
  $target_dir = "./upload/";
  //取出目前有的全部檔案
  $variable = glob($target_dir."*");
  foreach ($variable as $filename ) {
    echo '<tr>';
    echo '<td>' . basename($filename) . '</td>';
    echo '<td>' . filesize($filename) . '</td>';
    echo '<td><a href="upload_get.php?del=true&amp;filename=' .basename($filename).'">Delete</a></td>';
    echo '</tr>';
  }

 // $file = basename($path);         // $file is set to "index.php"
 // $file = basename($path, ".php"); // $file is set to "index"

?>
</table>

</body>
</html>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script>
  $('#uploads').on('click','a',function (){
    console.log('click');
       // setTimeout(function (){ confirm('ok'); },1000);
      // $(this).closest('tr').remove();
// setInterval(function(){ console.log('ok') }, 1000);

  }); 

 
</script>
      
      
    <?php
    
    //fopen 用法 http://php.net/function.fopen
    //開新檔案
    $fh = fopen('class.php', 'a');
    //寫入資料
    fwrite($fh, '<h1>Hello world!</h1>');
    fclose($fh);
    //刪除檔案
    unlink('class.php');

    ?>