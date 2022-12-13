
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
  <div id="wrapper">
  <br>
  <font style="font-size:2.3em;">중고책나라</font>
  <br>
  <br>
  <div id="login">
    <?php
    session_start();
    if(isset($_SESSION['nickname'])) {
      $loginOk=1;
    ?>
    <div style="float:left;">
      <a href="/basket/basket.php"><image style="width:50px;height:50px"  src="/image/basket.png"/></a>
    </div>
    <a href="/logout_process.php">로그아웃</a><br>
    <font style="border-top:1px solid gray;">NICKNAME : <font style="color:blue"><?php echo $_SESSION['nickname']; ?></font><font>
    <?php }else{
      $loginOk=0;
    ?>
    <a href="/login.php">로그인</a>&nbsp&nbsp&nbsp&nbsp
    <a href="/agreement.php" onclick="window.open(this.href,'_blank','width=700,height=510,left=330');return false">
    회원가입</a>
    <?php }
    ?>


  </div>
  <br>

  <div id="menubar">
    <a href="/intro.php">소개</a>
    <a href="/booksell/booksells.php?page=1&sorting=date&category=">책구매</a>
    <a href="/reviewboard/list.php?page=1&sorting=date">리뷰게시판</a>
    <a href="/QAboard/list.php?page=1&sorting=date">Q&A</a>
    <a id="profile" href="#" onclick="return false">마이페이지</a>
  </div>

  <script>
    $(document).ready(function(){
      $("#profile").click(function(){
        var x="0";
        if(x=="<?php echo $loginOk ?>")
        {
          alert('로그인후 이용이 가능합니다.');
        }
        else{
          location.replace('/profile.php');
        }


      });
    });
  </script>
