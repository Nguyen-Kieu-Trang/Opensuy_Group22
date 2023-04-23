<?php
                session_start();
                $_SESSION['id2'] = $_POST['id2'];
                $_SESSION['role'] = $_POST['role'];
                $id2 = $_SESSION['id2'];
                $role = $_SESSION['role'];
                
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "database";
                // Create connection
                $conn = mysqli_connect($servername, $username, $password,$dbname);
                // $student_id=4;
                $class_id = trim($_GET["id"]); 

                $sql2 = "SELECT TeacherID FROM class WHERE ClassID='$class_id'" ;
                $results = mysqli_query($conn, $sql2);
                $row1 = mysqli_fetch_assoc($results);
                $teacher_id = $row1['TeacherID'];

                $sql3="SELECT * FROM purchase_1 WHERE ClassID='$class_id' AND StudentID='$id2'";
                $result3 = mysqli_query($conn, $sql3);

                $sql1 = "INSERT INTO purchase_1 (ClassID,StudentID,Evaluation_score,Student_voting_rate, State) VALUES($class_id,$id2, '0','0', 'Not paid' ) ";
                if (mysqli_num_rows($result3) == 0) {
                 if(mysqli_query($conn, $sql1)===true){
                    $_SESSION['stt1']="Successully";

                     header('Location: teacher_detail.php?id='. urlencode($teacher_id)."&id2=".urlencode($id2)."&role=".urlencode($role), true, 303);
                     exit;
                 }
                }
                else{
                    $_SESSION['stt1']="Sorry, something wrong";

                    header('Location: teacher_detail.php?id='. urlencode($teacher_id)."&id2=".urlencode($id2)."&role=".urlencode($role), true, 303);
                }
?>