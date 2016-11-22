<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<style> 
  table tr td{
     border:solid 1px #666;
  }
</style>
<body>

      <script>

         function checkDel(){
         var delq = confirm('Are you sure,delete the file'<?php $_GET['filename']?>);
         if( delq ){
          <?php 
             if (isset($_GET['del'])) {
                 unlink($_GET['filename']);
               }
            ?>

         }
       
      </script>
      
      
    <?php
    
    //fopen 用法 http://php.net/function.fopen
    //開新檔案
    $fh = fopen('class.php', 'a');
    fwrite($fh, '<h1>Hello world!</h1>');
    fclose($fh);
    //刪除檔案
    unlink('class.php');

?>



<table>

<?php 
  $variable = glob("./upload/*");
  foreach ($variable as $filename ) {
    echo '<tr>';
    echo '<td>' . basename($filename) . '</td>';
    echo '<td>' . filesize($filename) .'</td>';
    echo '<td><a href="?del=true&filename='.$filename.'" onclick="checkDel();">Delete</a></td>';
    echo '</tr>';
  }

 // $file = basename($path);         // $file is set to "index.php"
 // $file = basename($path, ".php"); // $file is set to "index"

?>
</table>
</body>
</html>