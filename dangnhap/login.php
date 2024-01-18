<?php
session_start();
?>
<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Đăng Nhập </title>


<link rel="icon" href="../img/BR.png" type="image/jpeg">
    <link rel="stylesheet" href="../css/dangnhap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
           $hostName = "localhost:3307";
           $dbUser = "root";
           $dbPassword = "";
           $dbName = "banhang";
           $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
           if (!$conn) {
               die("Something went wrong;");
           }
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $userId = $user["id"]; 
                    $_SESSION["user"] = "yes";
                    $_SESSION["full_name"] = $user["full_name"];
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["id_user"] = $user["id"];
                    $sql1 = "SELECT * FROM chitiet_user  WHERE id_user = $userId";
                    $result1 = mysqli_query($conn, $sql1);
                    $user1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                   if (mysqli_num_rows($result1) > 0) {
       
                    header("Refresh: 2; url=../home.php");
                    echo "<div class='alert alert-success'>Đăng nhập thành công</div>";
                    die();
                } else {
                    // User ID does not exist in chitiet_user table
                    header("Refresh: 2; url=../user/capnhapuser.php");
                    echo "<div class='alert alert-warning'>Đăng nhập thành công</div>";
                    die();
                }
                }else{
                    echo "<div class='alert alert-danger'>Mật khẩu không chính xác</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email không đúng hoặc không tồn tại</div>";
            }
            
        }
        if (isset($_POST["admin"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
          
            $hostName = "localhost:3307";
            $dbUser = "root";
            $dbPassword = "";
            $dbName = "banhang";
            $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
             $sql1 = "SELECT * FROM admin WHERE email = '$email'";
             $result1 = mysqli_query($conn, $sql1);
             $user1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
             if ($user1) {
              if (password_verify($password, $user1["password"])) {         
                     $_SESSION["user"] = "yes";
                     header("Location: ../admin/admin_qlsp.php");      
                     die();
                 }else{
                     echo "<div class='alert alert-danger'>Password does not match</div>";
                 }
             }else{
                 echo "<div class='alert alert-danger'>Email does not match</div>";
             }
             
         }
        ?>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="https://sneakernews.com/wp-content/uploads/2015/10/2015-Nike-Mag-GIF1_original.gif" alt="">
        <div class="text">
          <span class="text-1">Chào mừng bạn đến với BreakRules<br> Hãy đăng nhập</span>
          <span class="text-2">Bắt đầu mua sắp nào !</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">ĐĂNG NHẬP</div>
          <form action="#" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email"  name="email" placeholder="Nhập email của bạn" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Nhập mật khẩu" required>
              </div>
              <div class="text"><a href="#">Bạn quên mật khẩu?</a></div>
              <div class="button input-box">
                <input type="submit" name="login" value="Đăng nhập">
              </div>
              <div class="button1 input-box">
                <input type="submit" name="admin" value="Đăng nhập cho admin">
              </div>
              <div class="text sign-up-text">Bạn chưa có tài khoản? <label for="flip" ><a href= "../dangnhap/signup.php" > Đăng ký</a></label></div>
            </div>
        </form>
      </div>
        
    </div>
  </div>
</body>
</html>