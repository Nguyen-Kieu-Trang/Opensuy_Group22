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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Course</title>
</head>

<?php 
            error_reporting(E_ERROR );
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $url_components = parse_url($actual_link);
            parse_str($url_components['query'], $params);
            $iddd = (int) $params['id2'];
            if($params['status']=="True"){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?php echo "Successfull"; ?>!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php            
                        }
            
                ?>


<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "database";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            $sqlll = "SELECT * FROM student where StudentID=$iddd" ;
            $resulttt = mysqli_query($conn, $sqlll);
            $rowww = mysqli_fetch_assoc($resulttt)
?>
<header>



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
                <form action="search-course.php" method="GET" id="searchForm">
                    <input type="text" name="q" id="searchBar" placeholder="Find course information" value="" maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
                    <button  type="submit" name="submit" id="searchBtn" >Search</button>
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
                    <a href="index.php" class="sub-menu-link">
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
            $sql = "SELECT * FROM purchase_1 JOIN class ON class.ClassID = purchase_1.ClassID JOIN subject ON subject.SubjectID=class.SubjectID 
            JOIN teacher ON teacher.TeacherID = class.TeacherID
            WHERE StudentID=$student_id AND State='Not paid'" ;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
?>
        

        <div class="title-page">
                <h1>Wao you have choosen <?php echo mysqli_num_rows($result); ?> classes from us</h1>
        </div>
        <form style="margin-top: 15px;" method="POST" action=""> 
                <button style="margin-left:15px" style="margin" type="submit" name="payment">Payment</button>
                
                <label style="margin-left: 15px;margin-top: 15px;" for="total">Total:</label><br>
                <table class="table">
                
                    <thead>
                    <th>SubjectName</th>
                        <th>Teacher</th>
                        <th>Class_size</th>
                        <th>Start_date</th>
                        <th>End_date</th>
                        <th>Class_time</th>
                        <th>Fee</th>
                        <th>Level</th>
                        <th><button style="    width: 100px;border-radius: 12px;margin-bottom: 7px;" type="submit" name="remove">Remove</button><input type="checkbox" id="delete_all" />Delete all</th>
                        <th><button style="    width: 100px;border-radius: 12px; margin-bottom: 7px;" type="submit" name="buy">Cal</button> <input type="checkbox" id="select_all" />Select all</th>
                    </thead>
                    
<?php
            // output data of each row
                while($row = mysqli_fetch_assoc($result)) { 
?>
                <tr>
                <td><?php echo $row["Subjectname"]?></td>
                <td><a href="teacher_detail.php?id=<?php echo $row['TeacherID'] ?>"><?php echo $row["Last_name"]." ".$row["First_name"]?></a></td>
                <td><?php echo $row["Class_size"]?></td>
                <td><?php echo $row["Start_date"]?></td>
                <td><?php echo $row["End_date"]?></td>
                <td><?php echo $row["Class_time"]?></td>
                <td><?php echo $row["Fee"]?></td>
                <td><?php echo $row["Level"]?></td>
                <!-- <?php
                // ob_start();
                ?> -->
                <td> <input type="checkbox" name="removeID[]" class="checkbox2" value="<?php echo $row['ClassID'] ?>"> </td>
                <td> 
                    <input type="checkbox" name="buyID[]" class="checkbox" value="<?php echo $row['ClassID'] ?>"  <?php if(isset($_POST['buyID'])&& in_array($row['ClassID'] , $_POST['buyID'])){echo 'checked="checked"';}  ?> >
                    

                </td>
                </tr>

<?php       
             
            }
?>
            
            </table> 
            </form>
            
<?php
            } else {
?>
            <div class="title-page">
                <h1><?php echo "You did not buy anything :("; ?></h1>
            </div>
                
            <?php }
           
?>
<?php
            
            if(isset($_POST['remove'])&&isset($_POST['removeID'])){
                foreach($_POST['removeID'] as $removeID){
                    $remove_sql="DELETE FROM purchase_1 WHERE StudentID=$student_id AND ClassID=$removeID";
                    mysqli_query($conn, $remove_sql);
                    
                }
                // ob_flush();
                header('Location: purchase.php?id2='.rawurlencode($params['id2'])."&role=".rawurldecode($params['role']));
            }
            if(isset($_POST['buy'])&&isset($_POST['buyID'])){
                $total_money=0;
                foreach($_POST['buyID'] as $classID){
                    $sql2 = "SELECT Fee FROM class WHERE ClassID='$classID'" ;
                    $results = mysqli_query($conn, $sql2);
                    $row1 = mysqli_fetch_assoc($results);
                    $fee_per_class = $row1['Fee'];
                    $total_money += $fee_per_class;
                }    
?>
                
                
                <h1 for="total" style="margin-left:36px;margin-top:5px"><?php echo $total_money;?> $</h1><br>
<?php
            }
           
            if(isset($_POST['payment'])){
                if(isset($_POST['buyID'])){
                    foreach($_POST['buyID'] as $classID){
                        $sql1 = "UPDATE purchase_1 SET State='Paid' WHERE StudentID=$student_id AND ClassID=$classID";
                        mysqli_query($conn, $sql1);
                        $sql4 = "UPDATE class SET remain_slots = remain_slots+1 WHERE ClassID=$classID";
                        $result4 = mysqli_query($conn, $sql4);
                        // ob_flush();
                        ?>
                        <h1>heloo</h1>
                        <?php

                        header('Location: purchase.php?id2='.urlencode($params['id2'])."&role=".urldecode($params['role'])."&status=true", true, 303);
                }
            }
            }
?>

<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});

$(document).ready(function(){
    $('#delete_all').on('click',function(){
        if(this.checked){
            $('.checkbox2').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox2').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox2').on('click',function(){
        if($('.checkbox2:checked').length == $('.checkbox2').length){
            $('#delete_all').prop('checked',true);
        }else{
            $('#delete_all').prop('checked',false);
        }
    });
});
</script>

</body>