<!DOCTYPE html>
<html lang="en">



<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style.css">
   <title>Course</title>
</head>

<body>
<header>



            <div class="logo"> 
               <a href="index.php"><img src="pic/logo.png"></a>    

            </div>


            <!-- <div class="menu">

                    <li><a href="teach.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>">Teacher information</a></li>
                    <li><a href="your_infor.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>">Your information</a></li>

            </div> -->

            <div class="menu">

            </div>
            <div class="shop"></div>



            <div class="search">

            </div>
            <div class="sub-menu-wrap" id="subMenu">
                
            </div> 


</header>

   <form action="#" method="post">

      <div class="imgcontainer">
         <img style="width:200px;height:200px;" src="default_avatar.png" alt="Avatar" class="avatar">
         <div><strong>Chọn thành phần bạn muốn đăng kí</strong></strong></div>
         <a href="teacher.php"><button type="button">Giáo viên</button></a>
         <a href="student.php"><button type="button">Học sinh</button></a>
         <a href="login.php"><button type="button">Đăng nhập</button></a>
         <a href="index.php"><button type="button">Trang chủ</button></a>
      </div>
      <!--<div class="containerr">

            <button type="submit">Login</button>
            <a href="teacher.php"><button type="button">Giáo viên</button></a>
            <a href="student.php"><button type="button">Học sinh</button></a>
            <a href="login.php"><button type="button">Đăng kí</button></a>


         </div>-->

   </form>
</body>