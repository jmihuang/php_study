<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<LINK REL=StyleSheet HREF="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" TYPE="text/css" MEDIA=screen>
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);

  .login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
  }
  .form {
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    max-width: 360px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }
  .form input {
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
  }
  button {
    font-family: "Roboto", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #4CAF50;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
  }
  .form button:hover,.form button:active,.form button:focus {
    background: #43A047;
  }
  .form .message {
    margin: 15px 0 0;
    color: #b3b3b3;
    font-size: 12px;
  }
  .welcome_login{
    margin: 15px 0 0;
    color: #b3b3b3;
    font-size: 16px;
  }
  .form .message a {
    color: #4CAF50;
    text-decoration: none;
  }
  .form .register-form {
    display: none;
  }
  .container {
    position: relative;
    z-index: 1;
    max-width: 300px;
    margin: 0 auto;
  }
  .container:before, .container:after {
    content: "";
    display: block;
    clear: both;
  }
  .container .info {
    margin: 50px auto;
    text-align: center;
  }
  .container .info h1 {
    margin: 0 0 15px;
    padding: 0;
    font-size: 36px;
    font-weight: 300;
    color: #1a1a1a;
  }
  .container .info span {
    color: #4d4d4d;
    font-size: 12px;
  }
  .container .info span a {
    color: #000000;
    text-decoration: none;
  }
  .container .info span .fa {
    color: #EF3B3A;
  }
  .dialog{
    display:none;
    width: 200px;
    text-align:center;
    line-height: 24px;
    padding:100px;
    background-color:#fff;
    margin:200px auto 0 auto;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }
  input:focus{
    border:solid 2px #76b852;
  }
  body {
    background: #76b852; /* fallback for old browsers */
    background: -webkit-linear-gradient(right, #76b852, #8DC26F);
    background: -moz-linear-gradient(right, #76b852, #8DC26F);
    background: -o-linear-gradient(right, #76b852, #8DC26F);
    background: linear-gradient(to left, #76b852, #8DC26F);
    font-family: "Roboto", sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;      
  }
</style>
<body>
  <div class="login-page">
    <div class="form">
      <p class="welcome_login">Welcome <b>
        <?php
          session_start();
          if( isset($_SESSION['username'])){
            echo  $_SESSION['username'];
          }    
        ?>
      </b></p>

        <button onClick="window.location.href='login_success.php?logout=true';">logout</button>

    </div>
  </div>
  <div class="dialog animated" id="">
    <p></p>
    <button onClick="window.location.href='login_success.php?logout=true';">Try Again</button>
  </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script>
   //計時登出
   var msg = "Session has expired!Due to inactivity.Pls login again.";

   function modalog(msg){
    $('.dialog').css('display','block').wrap('<div id="blackbg" style="background-color:rgba(0, 0, 0, 0.8);position:absolute;top:0;left:0;bottom:0;right:0;z-index:999"><div>').addClass('slideInDown')
    .find('p').html(msg);
   }

   setTimeout(function(){ modalog(msg); }, 1*60*1000);

</script>
<?php 
  //執行登出動作
  if(isset($_GET['logout']) && ($_GET['logout'] == true)){
    unset($_SESSION['username']);//清除session
     header("Location:login.php");
  }
  //session不存在 踢出
  if(!isset($_SESSION['username'])){
    ?>
      <script>  
         modalog(msg);
      </script>
    <?php
  }else{
    if(!isset($_SESSION['LAST_ACTIVITY'])){
      $_SESSION['LAST_ACTIVITY'] = time();
    }
    echo (time() - $_SESSION['LAST_ACTIVITY']);
  }
  //自動清除session
  $mins = 1;
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $mins* 60)) {

      // last request was more than 1 minutes ago
      unset($_SESSION['username']);     // unset $_SESSION variable for the run-time 
      session_destroy();   // destroy session data in storage
  }


 ?>