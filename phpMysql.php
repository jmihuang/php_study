<?php 
    header("Content-Type:text/html; charset=utf-8");
    include("connMysql.php");

    //接收到送出的資料
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $good_sn = insert_data();
        echo '編號'.$good_sn;
        header("location:phpMysql.php?goods_sn={$good_sn}");  
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

    //撈取全部資料
    function list_data(){
    	global $mysqli;
        $sql_query = "SELECT * FROM `student` ORDER BY `cID` ASC";
        $db_result =  $mysqli->query($sql_query);

        if(!$db_result) die("student資料連結失敗");     

    	   $rows = [];
    	   while($row = $db_result->fetch_assoc() ){
    	     $rows[] = $row;
    	   }
    	   // var_dump($rows);
           $html = "";
           foreach ($rows as $key => $value) {
           $html .= "<tr>";
               $html .= "<td>".$rows[$key]['cID']."</td>";
               $html .= "<td>".$rows[$key]['cName']."</td>";
               $html .= "<td>".$rows[$key]['sSex']."</td>";
               $html .= "<td>".$rows[$key]['cBirthday']."</td>";
               $html .= "<td>".$rows[$key]['cMail']."</td>";
               $html .= "<td>".$rows[$key]['cPhone']."</td>";
               $html .= "<td>".$rows[$key]['cAdd']."</td>";
               $html .= "<td>新增</td>";
               $html .= "<td>刪除</td>";
               $html .= "<td>修改</td>";
               $html .= "</tr>";
           }
           return $html;

    	   $db_result->close();
    	 
    }	

 ?>
    <!-- 表格表頭 -->
    <b>總人數</b>
    <table>
        <tr>
            <th>序號</th>
            <th>姓名</th>
            <th>性別</th>
            <th>生日</th>
            <th>信箱</th>
            <th>電話</th>
            <th>住址</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
         <!-- 資料內容 -->
         <?php echo list_data(); ?>

    </table>
   

      <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post"  class="login-form">
        <input type="text" name="cName" placeholder="Name"/><br>
        <input type="text" name="cBirthday" placeholder="Birthday"/><br>
        <input type="text" name="cMail" placeholder="Mail"/><br>
        <input type="text" name="cPhone" placeholder="Phone"/><br>
        <input type="text" name="cAdd" placeholder="Add"/><br>
       <input type="radio" name="cGender" value="M">M<input type="radio" name="cGender" value="F">F
        <button type="submit">Submit</button>
      </form>