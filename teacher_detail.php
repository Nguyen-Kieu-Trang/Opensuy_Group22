<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Course</title>
</head>
<body>
<?php
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "database";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            $sqlll = "SELECT * FROM student" ;
            $resulttt = mysqli_query($conn, $sqlll);
            $rowww = mysqli_fetch_assoc($resulttt)
?>
<header>
    <?php 
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $url_components = parse_url($actual_link);
            parse_str($url_components['query'], $params);

    ?>


            <div class="logo"> 
                <a href="self.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><img style="height:70px" src="pic/logo.png"></a>    
            </div>


            <!-- <div class="menu">

                    <li><a href="teach.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>">Teacher information</a></li>
                    <li><a href="your_infor.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>">Your information</a></li>

            </div> -->

            <div class="menu">
                <ul class="main-menu">
                    <li><a href="teach.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>">Teacher information</a></li>
                    <li><a href="your_infor.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>">Your information</a></li>
                    <?php 
                        if($params['role']=="Student"){
                    ?>
                    <li><a href="purchase.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class='fas fa-shopping-cart'></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="shop"></div>



            <div class="search">
                <form action="search-course.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" method="GET" id="searchForm">
                    <input type="text" name="q" id="searchBar" placeholder="Find course information" value="" maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
                    <button type="submit" name="submit" id="searchBtn" >Search</button>
                </form>
            </div>
            <img src="default_avatar.png" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="default_avatar.png" alt="">
                        <h3><?php echo $rowww['First_name'] ?></h3>
                    </div>
                    <hr>
                    <a href="#" class="sub-menu-link">
                        <p>Log out</p>
                        <span class="fa fa-sign-out" style="font-size:14px"></span></span>
                    </a>
                </div>
            </div> 

    <script>
        let subMenu = document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</header>
<!-- -----------------------searching   ------------------------ -->
<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "database";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            $id = trim($_GET["id"]); 
            $student_id=0;
            $sql = "SELECT * FROM teacher JOIN class ON class.TeacherID=teacher.TeacherID JOIN subject ON class.SubjectID=subject.SubjectID WHERE class.TeacherID='$id'" ;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
?>
            <div class="filter"></div>
                <table class="table">
                    <thead>
                        <th>SubjectName</th>
                        <th>Class_size</th>
                        <th>Start_date</th>
                        <th>End_date</th>
                        <th>Class_time</th>
                        <th>Fee</th>
                        <th>Level</th>
                        <?php if($params['role']=="Student"){ ?>
                        <th>Enroll</th>
                        <?php } ?>
                    </thead>
<?php
            // output data of each row
                while($row = mysqli_fetch_assoc($result)) { 
?>
                <tr>
                <td><?php echo $row["Subjectname"]?></td>
                <td><?php echo $row["remain_slots"]."/".$row["Class_size"]?></td>
                <td><?php echo $row["Start_date"]?></td>
                <td><?php echo $row["End_date"]?></td>
                <td><?php echo $row["Class_time"]?></td>
                <td><?php echo $row["Fee"]?></td>
                <td><?php echo $row["Level"]?></td>
                <!-- <td><a href="insert_purchase.php?id=<?php echo $row['ClassID'] ?>&id2=<?php echo $params['id2'] ?>&role=<?php echo $params['role'] ?>">Add</a></td> -->
                <?php if($params['role']=="Student"){ ?>
                <td><form method="POST" action="insert_purchase.php?id=<?php echo $row['ClassID'] ?>"> 
                    <input type="submit"name="eval" value="Add">
                    <input type="hidden" id="id2" name="id2" value="<?php echo $params['id2'];?>">
                    <input type="hidden" id="role" name="role" value="<?php echo $params['role'];?>">
                </form></td>
                <?php } ?>
            </tr>

    <?php
            if(isset($_SESSION['stt1'])){
                ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?php echo $_SESSION['stt1']; ?>!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                <?php
                unset($_SESSION['stt1']);
            }
?>  

<?php       
             
            }
?>
            </table> 
<?php
            } else {
                echo "0 results";
            }
           
?>
