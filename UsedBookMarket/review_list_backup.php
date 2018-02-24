
<?php
  include "../db_info.php";
  //include "/var/www/html/include/login.php";

  if(isset($_GET['page'])){
    $page=$_GET['page'];
  }else{
    $page=1;
  }
  $onePage=10; //한 페이지에 보여줄 게시글의 수

?>

<!DOCTYPE html>
<html>
<head>
  <title>중고책 나라</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/style.css"/>
 <style>
  table{width:62.5em;border-collapse:collapse;border-top:2px solid gray}
  th{background-color: rgb(213,213,213);padding:3px}
  td{padding:3px}
  tr{border-bottom:1px solid gray}
  tr:hover{background-color: #EAEAEA}
  a{text-decoration: none}
  #paging .pnumber{border:1px solid gray; margin-left:5px; background-color:rgb(213,213,213);padding:1px 4px 1px 4px}
  #paging a:hover{background-color:gray}

  #titleClick{color:black}
  #titleClick:hover{color:blue}
 </style>

</head>
<body>
<?php include "../wrapper.php"  //초기 화면 구성?>
  <div style="text-align:center;margin:40px auto;border-top:3px solid rgb(234,234,234);width:60em">
    <font style="font-size:2em">리뷰게시판</font>
  </div>
  <div style="text-align:right;margin:30px auto;width:65em">
    <select style="float:left;margin-left:2.6em">
      <option>10개씩 보기</option>
      <option>15개씩 보기</option>
      <option>20개씩 보기</option>
    </select>
    <font style="font-size:1em;color:blue;">여러분이 읽으신 책에 대한 소중한 후기를 남겨주세요~! </font>
  </div>

  <div style="margin:10px auto;padding:40px;width:60em;height:27em">
    <table id="reviewboard">
      <tr style='background-color:gray'>
        <th style="width:5em">순번</th>
        <th style="width:26.3em">제목</th>
        <th style="width:10em">닉네임</th>
        <th style="width:10em">날짜</th>
        <th style="width:4em">조회수</th>
        <th style="wdith:4em">좋아요</th>
      </tr>
      <?php

        $limitstart=($onePage*$page)-$onePage;
        $sqlLimit='limit '.$limitstart.','.$onePage;
        $sql="select * from reviewboard order by no desc ".$sqlLimit;
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
      ?>
      <tr>
        <td class="no"><?php echo $row['no']?></td>
        <td class="name"><a id="titleClick" href="./view.php?no=<?php echo $row['no']?>"><?php echo $row['title']?></a></td>
        <td class="nickname"><?php echo $row['nickname']?></td>
        <td class="date"><?php echo $row['date']?></td>
        <td class="hit"><?php echo $row['hit']?></td>
        <td class="good"><?php echo $row['good']?></td>
      </tr>
      <?php
        }?>
    </table>
  </div>

  <!-- 페이징 시작 -->
  <?php


    $sql="select count(*) as cnt from reviewboard order by no desc";//전체 개시글수 가져오기
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $allPost=$row['cnt'];


    $allPage=ceil($allPost/$onePage); //전체 페이지의 수

    $oneSection=4; //한번에 보여줄 총 페이지 개수
    $currentSection=ceil($page/$oneSection); //몇번째 섹션인지?
    $allSection=ceil($allPage/$oneSection);

    $firstPage=($currentSection*$oneSection)-($oneSection-1);
    if($currentSection==$allSection){
      $lastPage=$allPage;
    }else{
      $lastPage=$currentSection*$oneSection;
    }

    $prevPage=($currentSection-1)*$oneSection;
    $nextPage=($currentSection+1)*$oneSection-($oneSection-1);

    $paging="";

    if($page!=1){
      $paging.="<a class='pnumber' href='./list.php?page=1'>처음</a>";
    }

    if($currentSection!=1){
      $paging.="<a class='pnumber' href='./list.php?page=".$prevPage."'>이전</a>";
    }

    for($i=$firstPage;$i<=$lastPage;$i++){
      if($i==$page){
        $paging.="<font class='pnumber' class='pnumber'>".$i."</font>";
      }else{
        $paging.="<a class='pnumber' href='./list.php?page=".$i."'>".$i."</a>";
      }
    }

    if($currentSection!=$allSection){
      $paging.="<a class='pnumber'href='./list.php?page=".$nextPage."'>다음</a>";
    }
  ?>

  <div style="text-align:center;margin:20px auto;border-top:3px solid rgb(234,234,234);width:60em"></div><!--밑줄 -->
  <div style="margin:5px auto;text-align:center;width:65em;height:60px;">

    <button style="float:right;" onclick="location.assign('write.php')">글쓰기</button>
    <div id='paging' style="text-align:center;padding-left:90px;padding-top:5px">
        <?php echo $paging ?>
    </div>
  </div>
  <div style="margin:5px auto;width:30em;">
    <select>
      <option>제목</option>
      <option>내용</option>
      <option>제목+내용</option>
    </select>
    <input type="text" style="margin-left:10px;"/>
  </div>

</div>
