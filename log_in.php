<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){
   
   $email= $_POST['email'];
   $password = ($_POST['password']);
   if(isset($_POST['remember_me'])){
      //tạo cookie
      setcookie('email', $email);
      setcookie('password', $_POST['password']);
   }

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password=mysqli_real_escape_string($conn,$_POST['password']);
   
   $select1 = " SELECT * FROM user_form WHERE email = '$email'  ";
   $result1 = mysqli_query($conn, $select1);
   if (mysqli_num_rows($result1) == 0) {
      $row=mysqli_fetch_array($result1);
         $error[]='Email không tồn tại';
    }
   $select2 = " SELECT * FROM user_form WHERE password = '$password' ";
   $result2 = mysqli_query($conn, $select2);
   if (mysqli_num_rows($result2) == 0) {
      $row=mysqli_fetch_array($result2);
         $error[]='Mật khẩu không đúng';
      }else{
         //tiến hành lưu tên đăng nhập và session để tiện xử lý sau này
         $_SESSION['email'] = $email;
       }

   $select="SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";
   $result = mysqli_query($conn, $select);
   if (mysqli_num_rows($result) > 0) {
      $row=mysqli_fetch_array($result);
      header('location:home.php');
   }
}
$email= "";
$password="";
$check = false;
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
   $email= $_COOKIE['email'];
   $password= $_COOKIE['password'];
   $check = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trang Đăng Nhập</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="ashe_css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Đăng nhập ngay</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <!-- <input type="email" name="email" required placeholder="Email" value ="">
      <input type="password" name="password" required placeholder="Mật khẩu" value = ""> -->
      <input type = "email" name ="email" placeholder ="Email" value ="<?php echo $email ?>">
      <input type = "password" name ="password" placeholder ="Password" value ="<?php echo $password ?>">
      Lưu đăng nhập:<input <?php echo ($check)?"checked":"" ?> type ="checkbox" name = "remember_me" value ="1">
      <input type="submit" name="submit" value="Đăng nhập" class="form-btn">
      <p>Bạn chưa có tài khoản? <a href="sign_up.php">Đăng ký ngay?</a></p>
   </form>

</div>

</body>
</html>