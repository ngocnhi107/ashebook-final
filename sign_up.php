<?php
include 'config.php';
if(isset($_POST['submit'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=mysqli_real_escape_string($conn,$_POST['password']);
    $pass1=mysqli_real_escape_string($conn,$_POST['password1']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $birthday=mysqli_real_escape_string($conn,$_POST['birthday']);

    $select="SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            $error[]="Tài khoản đã tồn tại!";
}
        else{
            if($pass != $pass1){
                $error[]="Mật khẩu không khớp!";
            }else{
                $insert="INSERT INTO user_form (email, password, phone, birthday) VALUE ('$email','$pass','$phone', '$birthday')";
                mysqli_query($conn,$insert);
                header('location:log_in.php');
            }
        }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Ký</title>
    <link rel="stylesheet"  href="ashe_css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>ĐĂNG KÝ</h3>
            <?php
            if (isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="Email" autofocus>
            <input type="password" name="password" minlength="6" required placeholder="Mật khẩu">
            <input type="password" name="password1" required placeholder="Nhập lại mật khẩu">
            <input type="tel" name="phone" placeholder="0123-456-789" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}">

            <label for="birthday">Ngày sinh:</label><br> <input type="date" id="birthday" name="birthday"><br>

            <input type="submit" name="submit" value="Đăng ký" class="form-btn">
            <p>Bạn đã có tài khoản? <a href="log_in.php">Đăng nhập</a></p>

        </form>
    </div>
    
</body>
</html>