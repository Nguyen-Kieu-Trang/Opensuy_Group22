<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tablesort.js">
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
                    <li><a href="purchase.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class='fas fa-shopping-cart'></a></li>
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




<?php
            $sort_ranked_option="";
            $sort_degree_option='';
            $q=trim($_GET["query"]);
            $search = "WHERE (First_name LIKE '%$q%' OR Last_name LIKE '%$q%' OR Email LIKE '%$q%')";
            if(isset($_GET['sort_ranked'])){
                if($_GET['sort_ranked']=="0-10"){
                    if($sort_ranked_option==""){
                        $sort_ranked_option="order by FIND_IN_SET(Rank, '0,1,2,3,4,5,6,7,8,9,10,None') ASC";
                    }
                    else{
                        $sort_ranked_option="ORDER BY ".substr($sort_ranked_option,8).", FIND_IN_SET(Rank, '0,1,2,3,4,5,6,7,8,9,10,None') ASC";
                    }
                }
                elseif($_GET['sort_ranked']=="10-0"){
                    if($sort_ranked_option==""){
                        $sort_ranked_option="order by FIND_IN_SET(Rank, '0,1,2,3,4,5,6,7,8,9,10,None') DESC";
                    }
                    else{
                        $sort_ranked_option="ORDER BY ".substr($sort_ranked_option,8).", FIND_IN_SET(Rank, '0,1,2,3,4,5,6,7,8,9,10,None') DESC";
                    }
                }
            }
            if(isset($_GET['sort_degree'])){
                if($_GET['sort_degree']=="low-high"){
                    if($sort_ranked_option==""){
                        $sort_ranked_option = "ORDER BY FIND_IN_SET(Degree, 'Bachelor,Master,Doctoral,Professional')";
                    }
                    else{
                        echo $sort_ranked_option;
                        $sort_ranked_option = "ORDER BY FIND_IN_SET(Degree, 'Bachelor,Master,Doctoral,Professional'),".substr($sort_ranked_option,8);
                    }
                }
                if($_GET['sort_degree']=="high-low"){
                    if($sort_ranked_option==""){
                        $sort_ranked_option = "ORDER BY FIND_IN_SET(Degree, 'Bachelor,Master,Doctoral,Professional') DESC";
                    }
                    else{
                        $sort_ranked_option = "ORDER BY FIND_IN_SET(Degree, 'Bachelor,Master,Doctoral,Professional') DESC,".substr($sort_ranked_option,8);
                    }
                }
                if($_GET['sort_degree']=="high-low"){

                }
                if($_GET['sort_degree']=="Bachelor"){
                    $search .=" AND Degree='Bachelor'";
                }
                elseif($_GET['sort_degree']=="Doctoral"){
                    $search .=" AND Degree='Doctoral'";
                }
                elseif($_GET['sort_degree']=="Master"){
                    $search .=" AND Degree='Master'";
                }
                elseif($_GET['sort_degree']=="Professional"){
                    $search .=" AND Degree='Professional'";
                }
            }
            $sql = "SELECT * FROM teacher $search $sort_ranked_option" ;


            $i = 0;
            $result = mysqli_query($conn, $sql);

            
            if (mysqli_num_rows($result) > 0) {
?>
        <body>
            <div class="result">
                <h1 class="table-result">There are <?php echo mysqli_num_rows($result); ?> result </h1>
            </div>
            <div class="order_rank">

        <div class="teacher-search">
            <form action="" method="GET">
                
            <input type="text" name="q" class="searchBar" placeholder="Find teacher information" value="" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
                <select name="sort_degree" class="ranked">
                    <option value="" selected="selected">Select Option</option>
                    <option value="Bachelor"<?php if(isset($_GET['sort_degree'])&& $_GET['sort_degree']=="Bachelor"){?> selected="selected" <?php } ?>>Bachelor</option>
                    <option value="Doctoral"<?php if(isset($_GET['sort_degree'])&& $_GET['sort_degree']=="Doctoral"){?> selected="selected" <?php } ?>>Doctoral</option>
                    <option value="Master"<?php if(isset($_GET['sort_degree'])&& $_GET['sort_degree']=="Master"){?> selected="selected" <?php } ?>>Master</option>
                    <option value="Professional"<?php if(isset($_GET['sort_degree'])&& $_GET['sort_degree']=="Professional"){?> selected="selected" <?php } ?>>Professional</option> 
                </select>
                <button type="submit" name="submit" id="searchBtn" >Search</button>

            </form>
        </div>

    </div>

            <div class="show-more-container">
                <div class="content-table ">
                    <table id="myTable" class="table table-sortable">
                        <thead>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Degree</th>
                            <th>Rank</th>
                        </thead>
                        
            <?php
                        while($row = mysqli_fetch_assoc($result)) {
                                    $i = $i + 1;
            ?>
                        
                        <tr>
                        <td><a href="teacher_detail.php?id=<?php echo $row['TeacherID'] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><?php echo $row["Last_name"]?> </a> </td>
                        <td><a href="teacher_detail.php?id=<?php echo $row['TeacherID'] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><?php echo $row["First_name"]?> </a> </td>
                        <td><a href="teacher_detail.php?id=<?php echo $row['TeacherID'] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><?php echo $row["Email"]?> </a> </td>
                        <td><a href="teacher_detail.php?id=<?php echo $row['TeacherID'] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><?php echo $row["Contact_phone"]?> </a> </td>
                        <td><a href="teacher_detail.php?id=<?php echo $row['TeacherID'] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><?php echo $row["Degree"]?> </a> </td>
                        <td><a href="teacher_detail.php?id=<?php echo $row['TeacherID'] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>"><?php echo $row["Rank"]?> </a> </td>
                        </tr>

            <?php           
                        }
            ?>
            

        <?php
                    } else {
                        echo "0 results";
                    }  
            ?>      
                    </table>
                </div>
            </div>
            <script src="tablesort.js"></script>
            <script>
$(document).ready(function () {
    $('#myTable').DataTable({
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
    });
});
                </script>
        </body>
