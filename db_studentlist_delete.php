<?php 
    header("Content-Type:text/html; charset=utf-8");
    include("connMysql.php");
      
    //接收到送出的修改資料資料
    if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['action']=="delete"){
      $sql_query  = "DELETE FROM `test`.`student`";
      $sql_query .= "WHERE `student`.`cID` = ".$_GET["id"];
      $mysqli->query($sql_query);
      header("Location:db_studentlist.php");
    }

    //撈取單筆資料
    $sql_db = "SELECT * FROM `student` WHERE `cID` =".$_GET["id"];
    $db_result =  $mysqli->query($sql_db);
    if(!$db_result) die("資料取得失敗"); 
    $row = $db_result->fetch_assoc();


    $db_result->close();


 ?>

   

      <form action="" method="post"  class="login-form">
        <input type="text" name="cName" placeholder="Name" value="<?php echo $row['cName']?>"/><br>
        <input type="text" name="cBirthday" placeholder="Birthday" value="<?php echo $row['cBirthday']?>"/><br>
        <input type="text" name="cMail" placeholder="Mail" value="<?php echo $row['cMail']?>"/><br>
        <input type="text" name="cPhone" placeholder="Phone" value="<?php echo $row['cPhone']?>"/><br>
        <input type="text" name="cAdd" placeholder="Add" value="<?php echo $row['cAdd']?>"/><br>
        <input type="hidden" name="action" value="delete"/>
       <input type="radio" name="cGender" value="M" <?php if($row['sSex']=='M') echo 'checked'?>>M<input type="radio" name="cGender" value="F" <?php if($row['sSex'] == 'F') echo 'checked'?> >F
        <button type="submit">確定刪除</button>
      </form>