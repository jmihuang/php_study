   <?php 	
        include_once "connMysql.php";

	    // SELECT 顯示欄位
	    // FROM 資料表 A LEFT JOIN 資料表B
	    // ON A.相關資料 = 資料表 B.相關資料

	$query_RecAlbum = "SELECT album.album_id, album.album_date, album.album_title, album.album_desc, albumphoto.ap_picurl, 
		count(albumphoto.ap_id) AS albumNum -- 計算相片數
		FROM album
		LEFT JOIN albumphoto -- 合併資料表
		ON album.album_id= albumphoto.album_id
		GROUP BY album.album_id -- 相同album_id Group一起
		ORDER BY album.album_id
		";

		$query = $DB_con->prepare($query_RecAlbum);
		$query->execute();
		//總筆數
		$count = $query->rowCount();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			;
	?>

		<h1>相片總數 : <b><?php echo $row['albumNum']?></b></h1>
		<section>	
			<figure>
			    <i>相本編號 : <?php echo $row['album_date']?></i>
				<p>相本名稱 : <?php echo $row['album_title']?></p>
				<?php
				if($row['ap_picurl'] == NULL){
					echo "<img src=\"http://placehold.it/350x150\"/>";
				}else{
					echo "<a href=\"albumshow.php?id=".$row['album_id']."\"><img src=".$row['ap_picurl']."></a>";
				}
						
				?>	
				<figcaption>相本敘述 : <?php echo $row['album_desc']?></figcaption>
				<time>相本創建日期 : <?php echo $row['album_date']?></time>	
			</figure>
		</section>

	 <?php			
		}
	 ?>

	 <div>總共<?php echo $count?>相簿</div>




