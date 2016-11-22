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
    <div class="form" >
      <!-- <p class="welcome_login">Welcome <b>lililala</b></p> -->
      <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post"  class="login-form">
        <input type="text" name="username" placeholder="username"/>
        <input type="password" name="password" placeholder="password"/>
        <button type="submit">login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
    </div>
  </div>
  <div class="dialog animated" id="">
    WooopS!Incorret!Pls try again
    <button>Try Again</button>
  </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<?php

  if( !isset($_SESSION['username']) ){
       //未登入狀態
        if( isset($_POST['username']) && isset($_POST['password'])){

          $username = "aaa";
          $password = "1234";

          if( ($_POST['username'] == $username) && ($_POST['password'] == $password)){
            session_start();
            $_SESSION['username'] = $_POST['username'];
            header("Location:login_success.php");
          }else{
            ?>
              <script>
              $('.dialog').css('display','block').wrap('<div id="blackbg" style="background-color:rgba(0, 0, 0, 0.8);position:absolute;top:0;left:0;bottom:0;right:0;z-index:999"><div>').addClass('slideInDown');
              $('.dialog').find('button').click(function (){
                $('#blackbg').fadeOut();
              });
              $('#blackbg').click(function (){
                $('.dialog > button').trigger('click');
              });
              </script>
            <?php
          }
        }
  }else{
      //已登入狀態
      header("Location:login_success.php");
  }
 ?>