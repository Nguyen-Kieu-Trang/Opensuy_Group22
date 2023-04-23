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
<header>



            <div class="logo"> 
                <a href="index.php"><img src="pic/logo.png"></a>    
            </div>


            <div class="menu">
                <ul class="main-menu">
                    <li><a href="teach.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>">Teacher information</a></li>
                    <li><a href="your_infor.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>">Your information</a></li>
                  
                    <li><a href="purchase.php?id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class='fas fa-shopping-cart'></a></li>
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
            <div class="log-in">
                <form action="">
                    <button style="padding: 10px 20px; cursor: pointer; border: none; margin-right: 15px;" type="button"  ><a href="login.php">Log in</a></button>
                    <button style="padding: 10px 20px; cursor: pointer; border: none; margin-right:25px;" type="button" ><a href="register.php">Sign up</a></button>
                </form>

            </div>


</header>


<!-- -----------------------Courses-->
<section class="container">
    <div class="web">
        <div class="row">
            <div class="top-item">
                <p>Web Development Courses</p>
            </div>
            <div class="content">
                <ul class="content-item">
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "HTML, CSS, and Javascript for Web Developers" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/picweb1.png" alt="">
                            </a>
                        </div> 
                        
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "HTML, CSS, and Javascript for Web Developers" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="text">HTML, CSS, and Javascript for Web Developers</a>
                        </div>   
                    </li>                    
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Front-End Developer Capstone" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/picweb2.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Front-End Developer Capstone" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="text">Front-End Developer Capstone</a>
                        </div>   
                    </li>  
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "IBM Full Stack Software Developer Certificat Professionnel" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/picweb3.png" alt="">
                            </a>
                        </div> 
                        
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "IBM Full Stack Software Developer Certificat Professionnel" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="text">IBM Full Stack Software Developer Certificat Professionnel</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Meta Back-End Developer Certificat Professionnel" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/picweb4.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Meta Back-End Developer Certificat Professionnel" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Meta Back-End Developer Certificat Professionnel</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "React Basics" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/picweb5.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "React Basics" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">React Basics</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Building RESTful APIs Using Node.js and Express" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/picweb6.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Building RESTful APIs Using Node.js and Express" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Building RESTful APIs Using Node.js and Express</a>
                        </div>   
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ML">
        <div class="row">
            <div class="top-item">
                <p>Machine Learning Courses</p>
            </div>
            <div class="content">
                <ul class="content-item">
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Machine Learning for All" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ml1.png" alt="">
                            </a>
                        </div> 
                        
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Machine Learning for All" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="text">Machine Learning for All</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Mathematics for Marchine Learning" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ml2.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Mathematics for Marchine Learning" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Mathematics for Marchine Learning</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Deep Learning" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ml3.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Deep Learning" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Deep Learning</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Computer Vision Advanced" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ml4.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Computer Vision Advanced" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Computer Vision Advanced</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Natural Language Processing" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ml5.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Natural Language Processing" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Natural Language Processing</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Google Data Analytics" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ml6.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Google Data Analytics" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Google Data Analytics</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Machine Learning: Concepts and Applications" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ml7.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Machine Learning: Concepts and Applications" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Machine Learning: Concepts and Applications</a>
                        </div>   
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="DS">
        <div class="row">
            <div class="top-item">
                <p>Data science courses</p>
            </div>
            <div class="content">
                <ul class="content-item">
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "IBM Data Science" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ds1.png" alt="">
                            </a>
                        </div> 
                        
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "IBM Data Science" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="text">IBM Data Science</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Data Analysis in Python: Using Pandas DataFrames" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ds2.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Data Analysis in Python: Using Pandas DataFrames" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Data Analysis in Python: Using Pandas DataFrames</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Python for everyone" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ds3.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Python for everyone" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Python for everyone</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Google Data Analytics" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ds4.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Google Data Analytics" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Google Data Analytics</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Data Science specialization: Foundations using R" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ds5.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Data Science specialization: Foundations using R" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Data Science specialization: Foundations using R</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Data Science Foundations: Data Structures and Algorithms" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ds6.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Data Science Foundations: Data Structures and Algorithms" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Data Science Foundations: Data Structures and Algorithms</a>
                        </div>   
                    </li>
                    <li>
                        <div class="product-item">
                            <a href="search_class.php?id=<?php echo "Data Science Math Skills" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="product-thumb">
                                <img src="pic/ds7.png" alt="">
                            </a>
                        </div> 
                        <div class="product-info">
                            <a href="search_class.php?id=<?php echo "Data Science Math Skills" ?>&id2=<?php echo $params['id2'];?>&role=<?php echo $params['role'];?>" class="">Data Science Math Skills</a>
                        </div>   
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- 
    <div class="own">
    <div class="own-item">
        <img src="pic/ds1.png" alt="">
        <h1>The Ultimate 2023 Fullstack</h1>
        <p>279.000<sup>đ</sup></p>
    </div>
    <div class="own-item">
        <img src="pic/picweb2.png" alt="">
        <h1>The Ultimate 2023 Fullstack</h1>
        <p>279.000<sup>đ</sup></p>
    </div>

</div>
-->
