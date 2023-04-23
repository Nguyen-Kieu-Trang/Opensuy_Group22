<?php
                session_start();
                $_SESSION['std_id'] = $_POST['std_id2'];
                echo $_SESSION['std_id'];
                $std_id=$_SESSION['std_id'];

                $class_id = trim($_GET["id"]); 

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "database";
                // Create connection
                $conn = mysqli_connect($servername, $username, $password,$dbname);
                
                $sql1 = "DELETE FROM purchase_1 WHERE StudentID=$std_id AND ClassID=$class_id";
                if(mysqli_query($conn, $sql1)===true){
                    echo "Delete successfully.";
                    header('Location: purchase.php', true, 303);
                    exit;
                }
?>