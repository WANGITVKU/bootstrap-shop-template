
<!doctype html>
<html>
<head>
<title>Đăng ký</title>

<link rel="icon" href="../img/BR.png" type="image/jpeg">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<!-- /fonts -->
<!-- css -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<link href="../css/sigup.css" rel='stylesheet' type='text/css' media="all" />

<!-- /css -->
</head>
<body>
<h1 class="w3ls">Trang đăng ký </h1>
<div class="content-w3ls">
	<div class="content-agile1">
		<h2 class="agileits1">Official</h2>
		<p class="agileits2">BREAKRULES chào mừng bạn </p>
	</div>
	<div class="content-agile2">
		<form action="#" method="post">
			<div class="form-control w3layouts"> 
				<input type="text"  id="firstname" name="fullname" placeholder="Họ và tên" title="Please enter your First Name "required="">
			</div>

			<div class="form-control w3layouts">	
				<input type="email" id="email" name="email" placeholder="mail@example.com" title="Please enter a valid email" required="">
			</div>

			<div class="form-control agileinfo">	
				<input type="password" class="lock"  name="password" placeholder="Mật khẩu" id="password1" required="">
			</div>	

			<div class="form-control agileinfo">	
				<input type="password" class="lock"  name="repeat_password" placeholder="Nhập lại mật khẩu" id="password2" required="">
			</div>			
			
			<input type="submit" class="register" value="Register"name="submit">
			<div></div>
		</form>
		<?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
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
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }
           else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "
                <div class='alert alert-success'> You are registered successfully.</div> ";
                echo "<script>
                setTimeout(function() {
                    window.location.href = 'login.php';
                }, 2000);
           </script>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
		<p class="wthree w3l">
        Bạn đã có tài khoảng <a style="color: aqua;" href="login.php">Đăng Nhập tại đây</a>
        <br>
        Đăng Nhập nhanh bằng cách liên kết tài khoảng mạng xã hội khác </p>
		<ul class="social-agileinfo wthree2">
			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa fa-youtube"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
<p class="copyright w3l">© 2017 Official Signup Form. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">Nguyễn Huỳnh Quang</a></p>
</body>
</html>