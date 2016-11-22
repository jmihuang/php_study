<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 
   
   
   $arr = array( '台北市','桃園市','新竹市','彰化市','台中市','桃園市','新竹市', '台北市');	

  //array_unique 刪除相同的陣列值

  var_dump( array_unique($arr) );

   // 自訂排序

   function cmp($a,$b){

       if($a == $b){
       		return 0;
       }
       
       return ($a<$b)?-1:1;
   }
   $aNum = array(2,2,5,6,1);
   usort($aNum,'cmp');
   var_dump($aNum);

   //關鍵字搜尋
   //in_array(value) bloon
   //array_search( value ) -->回傳其key

   $array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'black', 4 => 'black');

   echo array_search('black', $array, true);

   $newarray = array();
   foreach ($array as $key => $value) {
   	   if( $array[$key] == "black"){
   	   		array_push( $newarray,$array[$key] );
   	   }
   }
   var_dump($newarray);


   //array_diff
   //比對$test1,$test2 以test1為依準 把$test2沒有的值印出來

   $test1 = array(1,2,3,4,5);
   $test2 = array(4,2,5,6,7);
   $var = array_diff($test1,$test2);
   print_r($var);//Array ( [0] => 1 [2] => 3 )

   //array_diff_assoc()
   //比對$test1,$test2 以test1為依準 對索引$test2沒有的值印出來

   $test1 = array(1,2,3,4,5);
   $test2 = array(4,2,5,6,7);
   $var = array_diff_assoc($test1,$test2);
   print_r($var);//Array ( [0] => 1 [2] => 3 [3] => 4 [4] => 5 )


   /* filter*/
   $place = array(
   		'榮星花園','復華花園新城','台北批發市場','臺北花市','藝術村','櫻花棒球場'
   	);

   $keyin = '花';

   function filter($val){

   	  global $keyin;
   	  if(preg_match("/$keyin/",$val)){
   	  	return $val;
   	  };

   }

   $filterResult = array_filter($place,'filter');
   $fl_array = preg_grep("/$keyin/", $place);

   print_r($filterResult);
   print_r($fl_array);


   






  

 ?>
	
</body>
</html>