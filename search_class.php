<?php
ob_start();
session_start();
?>
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
            error_reporting(E_ERROR ); 
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $url_components = parse_url($actual_link);
            parse_str($url_components['query'], $params);
            if($params['success']=="True"){
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?php echo "Successfull"; ?>!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php      
        }
        if($params['success']=="False"){
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo "Conflict!!"; ?>!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
            }

    ?>


            <div class="logo"> 
                <a href="self.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><img style="height: 70px" src="pic/logo.png"></a>    
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
                <form action="search-course.php" method="GET" id="searchForm">
                    <input type="text" name="q" id="searchBar" placeholder="Find course information" value="" maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
                    <button type="submit" name="submit" id="searchBtn" >Search</button>
                    <input type="hidden" id="id2" name="id2" value="<?php echo $params['id2'];?>">
                    <input type="hidden" id="role" name="role" value="<?php echo $params['role'];?>">
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
        $array = array(
            "HTML, CSS, and Javascript for Web Developers"=>"pic/picweb1.png",
            "Front-End Developer Capstone"=>"pic/picweb2.png",
            "IBM Full Stack Software Developer Certificat Professionnel"=>"pic/picweb3.png",
            "Meta Back-End Developer Certificat Professionnel"=>"pic/picweb4.png",
            "React Basics"=>"pic/picweb5.png",
            "Building RESTful APIs Using Node.js and Express"=>"pic/picweb6.png",
            "Machine Learning for All"=>"pic/ml1.png",
            "Mathematics for Marchine Learning"=>"pic/ml2.png",
            "Deep Learning"=>"pic/ml3.png",
            "Computer Vision Advanced"=>"pic/ml4.png",
            "Natural Language Processing"=>"pic/ml5.png",
            "Google Data Analytics"=>"pic/ml6.png",
            "Machine Learning: Concepts and Application"=>"pic/ml7.png",
            "IBM Data Science"=>"pic/ds1.png",
            "Data Analysis in Python: Using Pandas DataFrames"=>"pic/ds2.png",
            "Python for everyone"=>"pic/ds3.png",
            "Data Science specialization: Foundations using R"=>"pic/ds5.png",
            " Data Science Foundations: Data Structures and Algorithms"=>"pic/ds6.png",
            "Data Science Math Skills"=>"pic/ds7.png"
        );

?>
<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "database";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            $id = trim($_GET["id"]); 
            $sql = "SELECT * FROM class LEFT JOIN subject ON class.SubjectID=subject.SubjectID WHERE SubjectName='$id'" ;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
?>

            <div class="title-class">
                <h1 class="title-name"><?php echo $row["Subjectname"]?></h1>
                <div class="title-des">
                    <p><?php echo  $row["Description"]?></p>
                </div>
                    <img class="title-img" src=<?php echo $array[$row["Subjectname"]]?> alt="">

                <!-- <div class="title-inf">
                    <h4><?php echo  $row['num']?></h4>
                </div> -->
            </div>
            <?php   if ($params['role'] == "Teacher"): ?>
                <div class="add_class">
                    <form action="search_class.php?id=<?php echo $_GET['id']?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" method="post" name=id>
                        <!--  -->
                        <input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
                        <input type="hidden" id="id2" name="id2" value="<?php echo $params['id2'];?>"/>
                        <input type="hidden" id="role" name="role" value="<?php echo $params['role'];?>"/>
                        <input style="width: 180px;" type="text" name="class_size" id="searchBar" placeholder="Class size" value="" maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
                        <input type="text" name="start_date" id="searchBar" placeholder="Start date" value="" maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
                        <input type="text" name="end_date" id="searchBar" placeholder="End date" value="" maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
                        <input type="text" name="class_time" id="searchBar" placeholder="Class time" value="" maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
                        <input type="text" name="fee" id="searchBar" placeholder="Fee" value="" maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
                        <input type="text" name="level" id="searchBar" placeholder="Level" value="" maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
                        <input type="submit" name="button_add_class" value="Add Class" />
                        
                    </form>
                </div>
            <?php endif; ?>

<?php

            $teacher_id = $params['id2'];;

            

            $sql2 = "SELECT SubjectID FROM subject WHERE SubjectName='$id'" ;
            $subject_id = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($subject_id);
            $row3 = $row2['SubjectID'];

            $sql3 = "SELECT First_name, Last_name FROM teacher WHERE TeacherID='$teacher_id'" ;
            $subject_id = mysqli_query($conn, $sql3);
            $row3_ = mysqli_fetch_assoc($subject_id);
            $teacher_lastname = $row3_['Last_name'];
            $teacher_firstname = $row3_['First_name'];

            $sql = "SELECT * FROM class JOIN subject ON class.SubjectID=subject.SubjectID JOIN teacher ON class.TeacherID=teacher.TeacherID WHERE SubjectName='$id'" ;
            $result = mysqli_query($conn, $sql);
            $sql4="SELECT * FROM class";
            $result2= mysqli_query($conn, $sql4);
            $total_row=mysqli_num_rows($result2);
            $total_row2=mysqli_num_rows($result);
            $subject_name=$row["Subjectname"];
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] === 443 ? "https://" : "http://";
            $page_url = "{$protocol}{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
            if(isset($_POST["button_add_class"])&&$_POST){
                if($_POST['class_size']!='' &&$_POST['start_date']!=''&&$_POST['end_date']!=''&&$_POST['class_time']!=''&&$_POST['fee']!=''&&$_POST['level']!=''){
                    
                    $class_size = $_POST['class_size'];
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];
                    $class_time = $_POST['class_time'];
                    $fee = $_POST['fee'];
                    $level = $_POST['level'];
                    echo $start_date;
                    echo $end_date;
                    echo $class_time;
                    $sql5="SELECT Func_check_schedule3($teacher_id,'$start_date', '$end_date', '$class_time') as invalid_schedule";
                    $result5 = mysqli_query($conn, $sql5);
                    $row4 = mysqli_fetch_assoc($result5);
                    $invalid_schedule = $row4["invalid_schedule"];
                    if($invalid_schedule ==0){
                        $sql1 = "INSERT INTO class (ClassID,TeacherID,SubjectID,Class_size, Start_date,
                        End_date,Class_time,Fee,Level,remain_slots) VALUES('$total_row','$teacher_id','$row3', '$class_size','$start_date', '$end_date', '$class_time', '$fee', '$level' , 0) ";
                        if(mysqli_query($conn, $sql1)===true){ 
                            $statuss="Successfully!";                           
                            ?>
                            
                            <?php
                            header('Location: search_class.php?id='. rawurlencode($_GET['id'])."&id2=".urlencode($params['id2'])."&role=".urlencode($params['role'])."&success=True", true, 303);

                             exit;
                        }
                        else{
                            $statuss="ERROR: Could not able to execute $sql1. ";                           
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?php echo $statuss; ?>!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                        }
                    }
                    else{

                        $statuss="Your scheldule has conflict.";                           
                        header('Location: search_class.php?id='. urlencode($_GET['id'])."&id2=".urlencode($params['id2'])."&role=".urlencode($params['role'])."&success=False", true, 303);
                    }
                    

                }

            }
            
            if (mysqli_num_rows($result) > 0) {
                
?>
                <table class="table">
                    <thead>
                        <th>SubjectName</th>
                        <th>Class_size</th>
                        <th>Start_date</th>
                        <th>End_date</th>
                        <th>Class_time</th>
                        <th>Fee</th>
                        <th>Level</th>
                        <th>Teacher</th>
                        <?php   if ($params['role'] == "Student"){?>
                        <th>Enroll</th>
                        <?php } ?>
                    </thead>
<?php
                    if($page_url=="https://localhost/prj/search_class.php?id=".urlencode($_GET['id'])){
                        mysqli_data_seek($result, mysqli_num_rows($result) - 1);
                        $row5=mysqli_fetch_array($result);
                        

?>
                    <tr>
                    <td><?php echo $row5["Subjectname"]?></td>
                    <td><?php echo $row5["remain_slots"]."/".$row5["Class_size"]?></td>

                    <td><?php echo $row5["Start_date"]?></td>
                    <td><?php echo $row5["End_date"]?></td>
                    <td><?php echo $row5["Class_time"]?></td>
                    <td><?php echo $row5["Fee"]?></td>
                    <td><?php echo $row5["Level"]?></td>

                    <td><a href="teacher_detail.php?id=<?php echo $row5['TeacherID'] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><?php echo $row5["Last_name"]." ".$row5["First_name"]?></a></td>
                    <?php   if ($params['role'] == "Student"){?>
                    <td><a href="insert_purchase2.php?id=<?php echo $row5['ClassID'] ?>&id2=<?php echo $params['id2']; ?>&role=<?php echo $params['role']; ?>">Add</a></td>
                    <?php } ?>
                </tr>
<?php  
                }
?>
<?php
            if(isset($_SESSION['stt'])){
                ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?php echo $_SESSION['stt']; ?>!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                <?php
                unset($_SESSION['stt']);
            }
?>                       
<?php
            // output data of each row
                $index=0;
                $result6 = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result6)) { 
                    $index +=1;
                    if($page_url=="https://localhost/prj/search_class.php?id=".urlencode($_GET['id']) && $index==($total_row2)){break;}
?>

                <tr>
                <td><?php echo $row["Subjectname"]?></td>
                <td><?php echo $row["remain_slots"]."/".$row["Class_size"]?></td>
                <td><?php echo $row["Start_date"]?></td>
                <td><?php echo $row["End_date"]?></td>
                <td><?php echo $row["Class_time"]?></td>
                <td><?php echo $row["Fee"]?></td>
                <td><?php echo $row["Level"]?></td>

                <td><a href="teacher_detail.php?id=<?php echo $row['TeacherID'] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><?php echo $row["Last_name"]." ".$row["First_name"]?></a></td>
                <!-- <td><a href="insert_purchase2.php?id=<?php echo $row['ClassID'] ?>">Add</a></td> -->
                <?php   if ($params['role'] == "Student"){?>
                <td><form method="POST" action="insert_purchase2.php?id=<?php echo $row['ClassID'] ?>"> 
                    <input type="submit"name="eval" value="Add">
                    <!-- <input type="hidden"name="std_id" value="<?php echo $row["StudentID"]?>"> -->
                    <input type="hidden" id="id2" name="id2" value="<?php echo $params['id2'];?>">
                    <input type="hidden" id="role" name="role" value="<?php echo $params['role'];?>">
                    
                </form></td>
                <?php } ?>
                </tr>
                    
<?php
                }
?>
            </table> 
<?php
            } else {
                echo "0 results";
            }
            
?>