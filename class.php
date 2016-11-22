<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>
  <?php 

    class Student{
      
      var $total;
      var $average;
      var $int_Id;//座號
      var $str_Name;//姓名
      var $str_Gender;//性別
      var $int_Englis;//英文成績
      var $int_Chinese;
      var $int_Math;
      static public $countNum = 0;//靜態成員 存取呼叫都必須是[類別名稱::$靜態成員名稱]
 
      /**靜態方法
      * 存取呼叫都必須是[類別名稱::靜態方法()]
      * 靜態方法是不需要經由建立物件的動作就可以對方法進行取及操作 
      */
      static function showMsg ( $msg ){
        return $msg;
      }
      

      function total (){
          return $this -> int_Englis + $this -> int_Chinese + $this -> int_Math;
      }
   
      function average (){
          return ($this -> int_Englis + $this -> int_Chinese + $this -> int_Math)/3;
      }

      function setData( $int_Id,$str_Name,$str_Gender,$int_Englis,$int_Chinese,$int_Math )
      {
        $this -> int_Id = $int_Id;
        $this -> str_Name = $str_Name;
        $this -> str_Gender = $str_Gender;
        $this -> int_Englis = $int_Englis;
        $this -> int_Chinese = $int_Chinese;
        $this -> int_Math = $int_Math;
        $this -> total = $this -> total();
        $this -> average = $this -> average();
      }



      
      // _construct() 建構

      function __construct(){
        echo '-------學生資料開始--------<br/>';
        Student :: $countNum ++;
      }

      function showData(){
        echo '座號'.$this -> int_Id.'<br/>';
        echo '姓名'.$this -> str_Name.'<br/>';
        echo '性別'.$this -> str_Gender.'<br/>';
        echo '英文成績'.$this -> int_Englis.'<br/>';
        echo '國文成績'.$this -> int_Chinese.'<br/>';
        echo '數學成績'.$this -> int_Math.'<br/>';
        echo '總計'.$this -> total .'<br/>';
        echo '平均'.$this -> average.'<br/>';
        
      }

      //destruct 解建構

      function __destruct(){
        echo '-------學生資料結束--------<br/>';
        Student :: $countNum --;
      }

    }

    echo Student :: showMsg('95學年度成績表');

    $stdObj1 = new Student;
    $stdObj1 -> setData( '1','Jamie','woman','100','80','100' );
    $stdObj1 -> showData(); 
    $stdObj1 = NULL;

    $stdObj2 = new Student;
    $stdObj2 -> setData( '2','Betty','woman','80','60','50' );
    $stdObj2 -> showData();
    $stdObj1 = NULL;

    echo '人數'.Student :: $countNum.'個';
   ?>


</body>
</html>