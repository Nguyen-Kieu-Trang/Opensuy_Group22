<?php
                session_start();
                $_SESSION['std_vote'] = $_POST['vote'];
                $_SESSION['id2'] = $_POST['id2'];
                $_SESSION['student_id'] = $_POST['std_id'];
                $_SESSION['role'] = $_POST['role'];
                $id2 = $_SESSION['id2'];
                $role = $_SESSION['role'];

                $std_voting=$_SESSION['std_vote'];
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "database";
                // Create connection
                $conn = mysqli_connect($servername, $username, $password,$dbname);
                // $student_id=64;
                $student_id=$_SESSION['student_id'];
                $class_id = 0; 
                $id = trim($_GET["id"]);

                $sql2 = "SELECT TeacherID,STR_TO_DATE(End_date,'%d/%m/%Y')as end_datee FROM class WHERE ClassID=$id" ;
                $results = mysqli_query($conn, $sql2);
                $row1 = mysqli_fetch_assoc($results);
                $teacher_id = $row1['TeacherID'];

                // $sql3 = "SELECT CURDATE() as crdate";
                $sql3="SELECT STR_TO_DATE('30/12/2023', '%d/%m/%Y') as crdate ";
                $results1 = mysqli_query($conn, $sql3);
                $row2 = mysqli_fetch_assoc($results1);
                $crdate = $row2["crdate"];
                $sql1 = "UPDATE purchase_1 SET Student_voting_rate='$std_voting' WHERE StudentID=$student_id AND ClassID=$id";
                if($row1["end_datee"]<$row2["crdate"]){
                    $sql4 = "SELECT AVG(Student_voting_rate) as avg_score FROM purchase_1 JOIN class ON class.ClassID=purchase_1.ClassID WHERE purchase_1.State='Paid' and 
                    class.ClassID in (SELECT ClassID FROM class WHERE TeacherID = $teacher_id and class.End_date < $crdate) and Student_voting_rate!=0";
                    $results4 = mysqli_query($conn, $sql4);
                    $row4 = mysqli_fetch_assoc($results4);
                    $avg = $row4["avg_score"];
                    $sql5 = "UPDATE teacher SET avg_score='$avg' WHERE TeacherID = $teacher_id";
                    $results5 = mysqli_query($conn, $sql5);
                    $sql6 = "SET @x = 0";
                    $results6 = mysqli_query($conn, $sql6);
                    $sql7="UPDATE teacher SET rank = (@x:=@x+1) ORDER BY avg_score desc;";
                    $results6 = mysqli_query($conn, $sql7);
                    if(mysqli_query($conn, $sql1)){
                        echo "Records inserted successfully.";
                        header('Location: your_infor.php'."?id2=".urlencode($id2)."&role=".urlencode($role), true, 303);
                        exit;
                    }
                }
                else{
                    echo "Your class do not finish.";
                    header('Location: your_infor.php'."?id2=".urlencode($id2)."&role=".urlencode($role), true, 303);
                }
                
?>