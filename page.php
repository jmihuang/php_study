<?php 
    header("Content-Type:text/html; charset=utf-8");
    include("connMysql.php");

   //頁數設定
   $pageRow_records=3;
   //預設頁數 如果有翻頁頁數更新
   $num_pages=1;
   if(isset($_GET['page'])){
      $num_pages=$_GET['page'];
   }
   //開始筆數
   $startRow_records = ($num_pages-1)*$pageRow_records;
   
   $sql_query = "SELECT * FROM `student`";
   $db_result = $mysqli->query($sql_query);
   //總筆數
   $total_rows = $db_result->num_rows;
   //總頁數
   $total_pages = ceil($total_rows/$pageRow_records);

   $sql_query_limit = "SELECT * FROM `student` LIMIT ".$startRow_records.",".$pageRow_records."";

   $limit_result =  $mysqli->query($sql_query_limit);

   if(!$limit_result) die("資料取得失敗"); 

 ?>
    <!-- 表格表頭 -->
    <b>總人數<?php echo  $db_result->num_rows;?></b>
        <a href="?page=1">第一頁</a>
        <!-- 上一頁 -->
        <?php echo $num_pages>1?'<a href="?page='.($num_pages-1).'">上一頁</a>':'<span>上一頁</span>';?>
        <!-- 頁碼 -->
        <?php 
          for ($i=1; $i <=$total_pages ; $i++) {
            if($i==$num_pages ){
              echo '<b>'.$i.'</b>';
            }else{
              echo '<a href="?page='.$i.'">'.$i.'</a>'; 
            };    
          }
        ?>
        <!-- 下一頁 -->
        <?php echo $num_pages<$total_pages?'<a href="?page='.($num_pages+1).'">下一頁</a>':'<span>下一頁</span>';?>
        <a href="?page=<?php echo $total_pages?>"">最後頁</a>
        <span>共<?php echo $total_pages?>頁</span>
   
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
         <?php 
          //筆數從1開始
          $startRow_records = $startRow_records+1;
          while ($row = $limit_result->fetch_assoc()) {
             echo "<tr>";
             echo "<td>".$startRow_records++."</td>";
             echo "<td>".$row['cName']."</td>";
             echo "<td>".$row['sSex']."</td>";
             echo "<td>".$row['cBirthday']."</td>";
             echo "<td>".$row['cMail']."</td>";
             echo "<td>".$row['cPhone']."</td>";
             echo "<td>".$row['cAdd']."</td>";
             echo "<td><a href='db_studentlist_update.php'>新增</a></td>";
             echo "<td><a href='db_studentlist_delete.php?id=".$row['cID']."'>刪除</a></td>";
             echo "<td><a href='db_studentlist_edit.php?id=".$row['cID']."'>修改</td>";
             echo "</tr>";
           }


           $db_result->close();
         ?>

    </table>


   
