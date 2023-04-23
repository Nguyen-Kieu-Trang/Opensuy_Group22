<?php
                session_start();
                $_SESSION['teacher_eval'] = $_POST['eval'];
                $_SESSION['student_id'] = $_POST['std_id'];
                $_SESSION['id2'] = $_POST['id2'];
                $_SESSION['role'] = $_POST['role'];
                $id2 = $_SESSION['id2'];
                $role= $_SESSION['role'];
                $teacher_eval=$_SESSION['teacher_eval'];
                $student_id=$_SESSION['student_id'];
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "database";
                // Create connection
                $conn = mysqli_connect($servername, $username, $password,$dbname);
                $class_id = 0; 
                $id = trim($_GET["id"]);

                $sql2 = "SELECT TeacherID FROM class WHERE ClassID='$class_id'" ;
                $results = mysqli_query($conn, $sql2);
                $row1 = mysqli_fetch_assoc($results);
                $teacher_id = $row1['TeacherID'];

                $sql1 = "UPDATE purchase_1 SET Evaluation_score='$teacher_eval' WHERE StudentID=$student_id AND ClassID=$id";
                if(mysqli_query($conn, $sql1)){
                    echo "Records inserted successfully.";
                    header('Location: class_info_detail.php?id='.urlencode($id)."&id2=".urlencode($id2)."&role=".urlencode($role), true, 303);
                    exit;
                }
?>