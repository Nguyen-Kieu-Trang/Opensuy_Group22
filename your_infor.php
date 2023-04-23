<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Course</title>
</head>

<?php
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
                <a href="self.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><img src="pic/logo.png"></a>    
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
            //$id = trim($_GET["id"]); 
            $student_id=$params['id2'];
            $teacher_id=$params['id2'];
            $isStudent="Student";
            $isTeacher="Teacher";

            $sql = "SELECT * FROM purchase_1 JOIN class ON class.ClassID = purchase_1.ClassID JOIN subject ON subject.SubjectID=class.SubjectID 
            JOIN teacher ON teacher.TeacherID = class.TeacherID
            WHERE StudentID=$student_id AND State='Paid'" ;
            $result = mysqli_query($conn, $sql);
            

            $sql1="SELECT * FROM class JOIN teacher ON class.TeacherID=teacher.TeacherID JOIN subject ON subject.SubjectID=class.SubjectID WHERE teacher.TeacherID= $teacher_id";
            $result1= mysqli_query($conn, $sql1);
            $count = mysqli_num_rows($result);
        #if account is student
        if($isStudent==$params['role']){
            if (mysqli_num_rows($result) > 0) {
?>
            <div class="title-page">
                <h1>Here is <?php echo $count?> classes you are enrroling</h1>
            </div>

                <div></div>
                <div></div>
            <div class="show-more-container">
                <div class="your-table ">
                    <table id="myTable" class="table table-sortable">
                    <thead>
                        <th>SubjectName</th>
                        <th>Teacher</th>
                        <th>Class_size</th>
                        <th>Start_date</th>
                        <th>End_date</th>
                        <th>Class_time</th>
                        <th>Fee</th>
                        <th>Level</th>
                        <th>Evaluation_score</th>
                        <th>Student_voting_rate</th>
                        <th>State</th>
                    </thead>
<?php
            // output data of each row
                while($row = mysqli_fetch_assoc($result)) { 
?>
                <tr>
                <td><?php echo $row["Subjectname"]?></td>
                <td><a href="teacher_detail.php?id=<?php echo $row['TeacherID'] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>">    <?php echo $row["Last_name"]." ".$row["First_name"]?></a></td>
                <td><?php echo $row["Class_size"]?></td>
                <td><?php echo $row["Start_date"]?></td>
                <td><?php echo $row["End_date"]?></td>
                <td><?php echo $row["Class_time"]?></td>
                <td><?php echo $row["Fee"]?></td>
                <td><?php echo $row["Level"]?></td>
                <td><?php echo $row["Evaluation_score"]?></td>
                <td >
                    <form style="width: 50px;" method="POST" action="student_vote.php?id=<?php echo $row['ClassID'] ?>">
                      <input style="width: 157px;"type="text"name="vote" value="<?php echo $row["Student_voting_rate"]?>">
                      <input type="hidden" id="id2" name="id2" value="<?php echo $params['id2'];?>">
                    <input type="hidden" id="role" name="role" value="<?php echo $params['role'];?>">
                    <input type="hidden"name="std_id" value="<?php echo $row["StudentID"]?>">
                    </form>
                </td>
                <td><?php echo $row["State"]?></td>
                
                </tr>

<?php       
             
            }
?>
            </table> 
<?php
            } else {
                echo "0 results";
            }
        }
        #if account is teacher
        if($isTeacher==$params['role']){
            if (mysqli_num_rows($result1) > 0) {
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
                                        <th>Class info</th>
                                    </thead>
<?php
                            // output data of each row
                                while($row = mysqli_fetch_assoc($result1)) { 
?>
                                <tr>
                                <td><?php echo $row["Subjectname"]?></td>
                                <td><?php echo $row["Class_size"]?></td>
                                <td><?php echo $row["Start_date"]?></td>
                                <td><?php echo $row["End_date"]?></td>
                                <td><?php echo $row["Class_time"]?></td>
                                <td><?php echo $row["Fee"]?></td>
                                <td><?php echo $row["Level"]?></td>
                                <td><form method="POST" action="class_info_detail.php?id=<?php echo $row['ClassID'] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"> 
                                <input type="submit"name="detail" value="Detail">
                                </form>
                            
                            </td>
                                
                                </tr>
                
<?php       
                             
                            }
?>
                            </table> 
                            </div>
<?php
                            } else { ?>
                            <div class="title-purchase">
                                <h1><?php echo "You did not buy anything :("; ?></h1>
                            </div>
                            <?php }
        }
           
?>