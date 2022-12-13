



<?php
  //include "db_info.php";
  //include "/var/www/html/include/login.php";


//책은 가장 조용하고 변함없는 벗이다. 책은 가장 쉽게 다가갈 수 있고 가장
//현명한 상담자이자 가장 인내심 있는 교사이다. -찰스 W.엘리엇
?>

<!DOCTYPE html>
<html>
<head>
  <title>중고책 나라</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/style.css"/>
 <style>
  td{border:1px solid gray;padding:30px}
 </style>
 <script>
     function formsubmit(no){

       if(no==1){
         form1.action="preview.php?no="+no;
         form1.submit();
       }
       else if(no==2){
         form2.action="preview.php?no="+no;
         form2.submit();
       }
       else if(no==3){
         form3.action="preview.php?no="+no;
         form3.submit();
       }
       else if(no==4){
         form4.action="preview.php?no="+no;
         form4.submit();
       }else{}
     }
   </script>
</head>
<body>
<?php include "wrapper.php"  //초기 화면 구성?>

<div style="width:83%;height:85%;padding:50px 100px;border:1px solid red">
    <table class="producttable">
      <tr>
        <td>
          <div>
            <?php
            $no=1;
            $name[$no]="멈추면 비로소 보이는 것들";
            $author[$no]="혜민스님";
            $publish[$no]="쌤앤파커스";
            $cost[$no]=12600;
            $path[$no]="./image/stop_big.jpg";
            ?>

            <image src="./image/stop_small.jpg"/></br>
            <p>제목 : <?php echo $name[$no]?></p>
            <p>작가 : <?php echo $author[$no]?> / 출판사 : <?php echo $publish[$no]?>
            <p>가격 : <?php echo $cost[$no]."원"?><br>

              <form name="form1" method="post" >
                <input type="hidden" name="name"   value="<?php echo $name[$no]?>">
                <input type="hidden" name="author" value="<?php echo $author[$no]?>">
                <input type="hidden" name="publish"value="<?php echo $publish[$no]?>">
                <input type="hidden" name="cost"   value="<?php echo $cost[$no]?>">
                <input type="hidden" name="path"   value="<?php echo $path[$no]?>">
                <input type=button value="상세 보기" onclick="formsubmit(1)">
              </form>
          </div>
        </td>
        <td>
          <div>
            <?php
            $no=2;
            $name[$no]="습관의 힘";
            $author[$no]="찰스 두히그";
            $publish[$no]="갤리온";
            $cost[$no]=14400;
            $path[$no]="./image/habit_big.jpg";
            ?>

            <image src="./image/habit_small.jpg"/></br>
            <p>제목 : <?php echo $name[$no]?></p>
            <p>작가 : <?php echo $author[$no]?> / 출판사 : <?php echo $publish[$no]?>
            <p>가격 : <?php echo $cost[$no]."원"?>

              <form name="form2" method="post" >
                <input type="hidden" name="name"   value="<?php echo $name[$no]?>">
                <input type="hidden" name="author" value="<?php echo $author[$no]?>">
                <input type="hidden" name="publish"value="<?php echo $publish[$no]?>">
                <input type="hidden" name="cost"   value="<?php echo $cost[$no]?>">
                <input type="hidden" name="path"   value="<?php echo $path[$no]?>">
                <input type=button value="상세 보기" onclick="formsubmit(2)">
              </form>

          </div>
        </td>
        <td>
          <div>
            <?php
            $no=3;
            $name[$no]="미움받을 용기";
            $author[$no]="고가 후미타케";
            $publish[$no]="인플루엔션";
            $cost[$no]=13410;
            $path[$no]="./image/hated_big.jpg";
            ?>

            <image height="260px" src="./image/hated_small.jpg"/></br>
            <p>제목 : <?php echo $name[$no]?></p>
            <p>작가 : <?php echo $author[$no]?> / 출판사 : <?php echo $publish[$no]?>
            <p>가격 : <?php echo $cost[$no]."원"?>

              <form name="form3" method="post" >
                <input type="hidden" name="name"   value="<?php echo $name[$no]?>">
                <input type="hidden" name="author" value="<?php echo $author[$no]?>">
                <input type="hidden" name="publish"value="<?php echo $publish[$no]?>">
                <input type="hidden" name="cost"   value="<?php echo $cost[$no]?>">
                <input type="hidden" name="path"   value="<?php echo $path[$no]?>">
                <input type=button value="상세 보기" onclick="formsubmit(3)">
              </form>

          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div>
            <?php
            $no=4;
            $name[$no]="너의 이름은 1";
            $author[$no]="신카이 마코로";
            $publish[$no]="대원 씨아이";
            $cost[$no]=4950;
            $path[$no]="./image/name_small.jpg";
            ?>

            <image src="./image/name_small.jpg"/></br>
            <p>제목 : <?php echo $name[$no]?></p>
            <p>작가 : <?php echo $author[$no]?> / 출판사 : <?php echo $publish[$no]?>
            <p>가격 : <?php echo $cost[$no]."원"?>

              <form name="form4" method="post" >
                <input type="hidden" name="name"   value="<?php echo $name[$no]?>">
                <input type="hidden" name="author" value="<?php echo $author[$no]?>">
                <input type="hidden" name="publish"value="<?php echo $publish[$no]?>">
                <input type="hidden" name="cost"   value="<?php echo $cost[$no]?>">
                <input type="hidden" name="path"   value="<?php echo $path[$no]?>">
                <input type=button value="상세 보기" onclick="formsubmit(4)">
              </form>

          </div>
        </td>
      </tr>
    </table>
    <div style="text-align:right"><button>상품등록</button></div>
  </div>
</div><!-- include 문서의 div 닫기-->
</body>
