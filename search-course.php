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
<body>
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
    <section class="container">
            <h1 style="margin-bottom: 36px;">Result for "<?php echo $_GET["q"]?>" :</h1>
        


<?php
            if(isset($_GET["submit"])){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "teamdb";
                // Create connection
                $conn = mysqli_connect($servername, $username, $password,$dbname);
                $q=trim($_GET["q"]);
                $sql = "SELECT SubjectID, SubjectName, Description FROM subject WHERE SubjectName LIKE '%$q%'" ;
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) { 
?>                     
        <div class="content-course">
            <ul class="content-item-search">
<?php
        while($row = mysqli_fetch_assoc($result)) {
?>

                <li >

                        <a href="search_class.php?id=<?php echo $row["SubjectName"] ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="content-item-search-title">
                        <?php echo $row["SubjectName"]; ?>
                        </a>
                        <div class="row">
                            <div class="column side">
                                <a href="search_class.php?id=<?php echo $row["SubjectName"]?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                    <img src=<?php echo $array[$row["SubjectName"]]?> alt="">
                                </a>
                            </div>
                            <div class="column middle">
                                <h4 style="float: right;width: 430px; margin-top: 15px;"><?php echo $row["Description"] ?></h4>
                            </div>


                        </div>




                </li>                   
        <?php
        }
    } else {
        echo "0 results";
    }
}?>
            </ul>
        </div>
        


    </section>
                    









