<?php 
    header("Content-Type:text/html; charset=utf-8");
    include("connMysql.php");

    //接收到送出的資料
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $number = insert_data();
        echo '編號'.$number;
        header("location:db_studentlist.php?number={$number}");  
    }


    //新增一筆至資料庫
    function insert_data(){
        global $mysqli;
    	$sql_query = "SELECT * FROM student";
        $db_result = $mysqli->query($sql_query);
        if(!$db_result) die("student資料連結失敗");     
        

    	
    	$cName = $mysqli->real_escape_string($_POST['cName']);
    	$cBirthday = $mysqli->real_escape_string($_POST['cBirthday']);
    	$cMail = $mysqli->real_escape_string($_POST['cMail']);
    	$cPhone = $mysqli->real_escape_string($_POST['cPhone']);
    	$cAdd = $mysqli->real_escape_string($_POST['cAdd']);
    	$cGender = $mysqli->real_escape_string($_POST['cGender']);

    	$sql = "INSERT INTO `student`(`cID`, `cName`, `sSex`, `cBirthday`, `cMail`, `cPhone`, `cAdd`) VALUES ('','{$cName}','{$cGender}','{$cBirthday}','{$cMail}','{$cPhone}','{$cAdd}')";
    	$mysqli->query($sql) or die($mysqli->connect_error);
    	$id = $mysqli->insert_id;
    	return $id;
   
    }

 ?>

   

      <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post"  class="login-form">
        <input type="text" name="cName" placeholder="Name"/><br>
        <input type="text" name="cBirthday" placeholder="Birthday"/><br>
        <input type="text" name="cMail" placeholder="Mail"/><br>
        <input type="text" name="cPhone" placeholder="Phone"/><br>
        <input type="text" name="cAdd" placeholder="Add"/><br>
       <input type="radio" name="cGender" value="M">M<input type="radio" name="cGender" value="F">F
        <button type="submit">Submit</button>
      </form>