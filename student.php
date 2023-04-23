<?php

$err = [];
if ($_POST) {
   if (isset($_POST['Login_name']) != 0) {
      $first_name = $_POST['First_name'];
      $last_name = $_POST['Last_name'];
      // $phone_num = $_POST['phone_num'];
      $email = $_POST['Email'];
      $login_name = $_POST['Login_name'];
      $password = $_POST['Password'];

      //$ruser_pass = $_POST['ruser_pass'];
      $servername = "localhost";
      $username = "root";
      $password1 = "";
      $dbname = "database";
      // Create connection
      $conn = mysqli_connect($servername, $username, $password1,$dbname);

      $sql = "SELECT Login_name FROM user where user.Login_name='$login_name'";
      $result = mysqli_query($conn, $sql);
      //$row = mysqli_fetch_array($result);
      //mysqli_num_rows($result) > 0
      if (mysqli_num_rows($result) > 0) {
         $err['Login_name'] = 'Tài Khoản Đã Tồn Tại';
      } else {

         //header("Location:login.php");
         // $sql = "INSERT INTO user(login_name) VALUES ('$login_name')";
         // $result = mysqli_query($conn, $sql);
         // $sql = "INSERT INTO student(first_name,last_name,phone_num,email,degree,login_name,password) VALUES ('$first_name','$last_name','$phone_num','$email','$degree','$login_name','$password')";

         $sql = "INSERT INTO user(user.Login_name) VALUES ('$login_name')";
         $result = mysqli_query($conn, $sql);
         // $sql = "INSERT INTO student(student.first_name,student.last_name,student.phone_num,student.email,student.degree,student.login_name,student.password) VALUES ('$first_name','$last_name','$phone_num','$email','$degree','$login_name','$password')";


         //$query = mysqli_query($conn, $sql);
         if ($result) {
            $sql = "INSERT INTO student(student.First_name,student.Last_name,student.Email,student.Login_name,student.Password) VALUES ('$first_name','$last_name','$email','$login_name','$password')";
            // ,'$phone_num'
            $result = mysqli_query($conn, $sql);
            if ($result) {
               // ,student.phone_num
               echo '<script language="javascript">alert("Đăng ký thành công"); window.location="login.php";</script>';
            } else {
               echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="";</script>';
            }
         }
      }
   }
}

?>

<!--<!DOCTYPE html>
   <html>

   <head>
      <title></title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>

   <body>
      <form method="post" action="xuly.php">
<table>
   <tr>
      <td>Fullname</td>
      <td><input type="text" name="s_name" value="" /></td>
   </tr>

   <tr>
      <td>Email</td>
      <td><input type="text" name="email" value="" /></td>
   </tr>

   <tr>
      <td>Phone</td>
      <td><input type="text" name="phone_num" value="" /></td>
   </tr>

   <tr>
      <td>Degree</td>
      <td><input type="text" name="degree" value="" /></td>
   </tr>


   <tr>
      <td>Login name</td>
      <td><input type="text" name="login_name" value="" /></td>
   </tr>

   <tr>
      <td>Password</td>
      <td><input type="text" name="password" value="" /></td>
   </tr>




   <tr>
      <td></td>
      <td><input type="submit" name="teacherRegister" value="Đăng Ký" /></td>
   </tr>
</table>
</form>
</body>

</html>-->
<!DOCTYPE html>
<html>



<head>
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <script src="https://kit.fontawesome.com/da3f2c352c.js" crossorigin="anonymous"></script> -->
   <link rel="stylesheet" href="css/signupcss.css">

</head>

<body>
<header>
      <div class="logo">

        <a href="index.php"><img src="pic/logo.png"></a>    
      </div>


      <div class="menu">

      </div>

      <div class="shop">

      </div>

      <div class="search">

      </div>
   </header>
   <!--<div id="id01" class="modal">-->
   <!--    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">times;</span>-->
   <form action="#" method="post" style="border:1px solid #ccc">
      <div class="container">
         <h1>Đăng kí</h1>
         <p>Vui lòng điền đơn dưới đây để tạo tài khoản</p>
         <hr>

         <label for="first_name"><b>First Name</b></label>
         <input class="su" type=" text" value="" placeholder="Enter your first name" name="First_name" required oninvalid="this.setCustomValidity('Bạn chưa điền ô nay!')" onchange="this.setCustomValidity('')" type="text">

         <label for="last_name"><b>Last Name</b></label>
         <input class="su" type="text" value="" placeholder="Enter your last name" name="Last_name" required oninvalid="this.setCustomValidity('Bạn chưa điền ô nay!')" onchange="this.setCustomValidity('')" type="text">

         <!-- <label for="phone_num"><b>Phone Number</b></label>
         <input class="su" type="text" value="" placeholder="Enter your phone number" name="phone_num" required oninvalid="this.setCustomValidity('Bạn chưa điền ô nay!')" onchange="this.setCustomValidity('')" type="text"> -->

         <label for="email"><b>Email</b></label>
         <input class="su" type="email" value="" placeholder="Enter your email" name="Email" required oninvalid="this.setCustomValidity('Vui lòng nhập đúng dạng email')" onchange="this.setCustomValidity('')" type="text">


         <label for="login_name"><b>Login name</b></label>
         <input class="su" type="text" value="" placeholder="Enter our login name" name="Login_name" required oninvalid="this.setCustomValidity('Bạn chưa điền ô nay!')" onchange="this.setCustomValidity('')" type="text">
         <div style="margin-top:-10px">
            <span style="color: red">
               <?php echo (isset($err['Login_name'])) ? $err['Login_name'] : '' ?>
            </span>
         </div>
         <label for="password"><b>Password</b></label>
         <input class="su" type="password" value="" placeholder="Enter your password" name="Password" required oninvalid="this.setCustomValidity('Bạn chưa điền ô nay!')" onchange="this.setCustomValidity('')" type="text">





         <!-- <label for="user_name"><b>DoB</b></label>
            <input type="date" name="dob" id="user_dob"> 
         <div style="margin-top:-10px">
            <span style="color: red">
               <!-- <?php echo (isset($err['ruser_pass'])) ? $err['ruser_pass'] : '' ?> -->
            <!-- </span>
         </div>  -->


         <!--        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>-->

         <p style="margin-top:20px">By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms &
               Privacy</a>.</p>

         <div class="clearfix">
            <a href="login.php">
               <button type="submit" class="signupbtn">Sign Up</button>
            </a>
            <a href="login.php">
               <button type="button" class="cancelbtn">Cancel</button>
            </a>

            <!--<button type="submit" class="signupbtn">Sign Up</button>-->
         </div>
      </div>
   </form>
   <!--</div>-->
</body>