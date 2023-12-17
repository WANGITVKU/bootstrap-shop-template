<meta charset="utf-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Bootstrap JS và Popper.js -->
<?php
session_start();
if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $diachi= $_POST['diachi'];
    $email=$_POST['email'];
    $sdt=$_POST['sdt'];
    $province_id=$_POST['province'];
    $district_id = $_POST['district'];
    $wards_id = $_POST['wards'];
    $gioi_tinh=$_POST['gioi_tinh'];
    $date = $_POST['date'];
    $CCCD = $_POST['CCCD'];
    
    // echo $name;
    echo "<pre>";
        $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
        $sql = "SELECT name FROM province WHERE province_id = $province_id";
        $kq = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($kq);
        // echo $row['name'];
    echo "<pre>";
        $sql1 = "SELECT name FROM district WHERE district_id = $district_id";
        $kq1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($kq1);
        // echo $row1['name'];

    echo "<pre>";
    // var_dump($_POST);
        $sql2 = "SELECT name FROM wards WHERE wards_id = $wards_id";
        $kq2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($kq2);
        // echo $row2['name'];
        $diachi_cuthe=$row['name'].'-'.$row1['name'].'-'.$row2['name'].'-'. $diachi;
        if ($_FILES['ImageUpload']['error'] === UPLOAD_ERR_OK) {
            //   $uploadDir = '../../img/';       
            //   if (!is_dir($uploadDir)) {
            //     mkdir($uploadDir, 0777, true);
            // } // Specify the directory where you want to save the uploaded files
            //   $uploadFile = $uploadDir . basename($_FILES['ImageUpload']['name']);       
              // Move the uploaded file to the specified directory
              $relativePath = 'img/' . basename($_FILES['ImageUpload']['name']);
              $uploadFile = '../../' . $relativePath;
              if (move_uploaded_file($_FILES['ImageUpload']['tmp_name'], $uploadFile)) {
                // echo $uploadFile;
                  // File was uploaded successfully              
             // Now, you can store the file path ($uploadFile) in your database
                  // Assuming you have a database connection already established
                 
                  $sql3 = "INSERT INTO chitiet_user(full_name,email, sdt, gioi_tinh, diachi,ngay_sinh, img , CCCD) 
                          VALUES ( '$name', '$email', $sdt, '$gioi_tinh' , '$diachi_cuthe' ,'$date' ,'$relativePath','$CCCD')";
                  $kq3 = mysqli_query($conn, $sql3);
      
                  if ($kq3) {
                    echo "
              <div class='alert alert-success'> Cập Nhập Thông Tin Thành Công </div> ";
              echo "<script>
              setTimeout(function() {
                  window.location.href = '../profile.php';
              }, 2000);
              </script>";
                  } 
                
      else {
                      echo "Thêm sản phẩm thất bại!";  echo "<script>

                      </script>";
                  }
              } 
                  
      
                
      else {
                  echo "File upload failed.";  echo "<script>
               
                  </script>";
                  
              }
          } else {
              echo "<div class='alert alert-danger'>Vui lòng chọn ảnh đại diện </div>";   echo "<script>
              setTimeout(function() {
                  window.location.href = '../capnhapuser.php';
              }, 6000);
              </script>";
          }
      
  }    
        