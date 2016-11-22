<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>
<?php
  
  /*
  *參照教學:http://www.phpini.com/php/php-curl-post-get
  */
   $dataArray = array(
     'action'=> 'ub_newsclass_list',
     'datas[classid]'=>'all',
     'datas[funs_log]'=>'f21',
     'datas[lang]'=>'tw',
     'datas[loc]'=>'hccg'
   	);

   $data = http_build_query($dataArray);

   /*
   *PHP 傳送 GET 請求
   */

   $url = "http://hccg.youbike.com.tw/cht/useAPI.php?".$data;

   //file_get_contents()取得回傳
   //json_decode轉成json格式
   $getdatas = json_decode(file_get_contents($url),true);
   var_dump($getdatas);
   echo $getdatas[0]['resdata'];
   $variable = $getdatas[0]['resdata'];
   foreach ($variable as $key => $value) {
   	    echo $variable[$key]['classid'].'<br/>';
   }

   /*
   *PHP 用 CURL 傳送 POST 及 GET 表單
   */

   function getCurl($url,$data){
   	   $ch = curl_init();
   	   $settings = [
   	      CURLOPT_HEADER => 0,
   	      CURLOPT_NOBODY => 0,
   	      CURLOPT_URL => $url,
   	      CURLOPT_RETURNTRANSFER => 1,
   	      CURLOPT_POST => 1,
   	      CURLOPT_POSTFIELDS =>$data
   	   ];
   	   curl_setopt_array($ch, $settings);
   	   $output = curl_exec($ch); 
   	   curl_close($ch);

   	   return json_decode($output,true);
   }

   $getJson = getCurl($url,$data);
   var_dump($getJson);
   $obj = $getJson[0]['resdata'];
   foreach ($obj as $key => $value) {
   	    echo $obj[$key]['class_name'].'<br/>';
   }

   // echo 'json'.json_decode($output,true);

?>


</body>
</html>