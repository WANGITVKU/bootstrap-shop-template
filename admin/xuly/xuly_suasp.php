<head>
  <title>Thêm sản phẩm | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->

  <!-- Font-icon css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Bootstrap JS và Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
<?php
         
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
             

              if (isset($_POST["form1_submit"])) {
                      $img_old =$_POST['img_old'];
                      $id = $_POST['idsp'];
                      $name = $_POST['name'];
                      $quantity = $_POST['quantity'];
                      $price = $_POST['price'];
                      $id_dmsp=$_POST['id_dmsp'];
                      $mo_ta=$_POST['mo_ta'];
                     $id_brand=$_POST['id_brand']; 
                  // Handle file upload
                      if ($_FILES['ImageUpload']['error'] === UPLOAD_ERR_OK) {
                        $conn1 = mysqli_connect("localhost:3307", "root", "", "banhang");
                          $relativePath = 'img/' . basename($_FILES['ImageUpload']['name']);
                          $uploadFile = '../../' . $relativePath;
                          if ($img_old !== $relativePath) {
                          if (move_uploaded_file($_FILES['ImageUpload']['tmp_name'], $uploadFile)) {
                            echo $uploadFile;
                            
                              // File was uploaded successfully              
                         // Now, you can store the file path ($uploadFile) in your database
                                $sql3 = "UPDATE sanpham
                                        SET 
                                        `name` = '$name', 
                                        `price` = '$price', 
                                        `quantity` = '$quantity', 
                                        `id_dm` = $id_dmsp, 
                                        `id_brand` = $id_brand, 
                                        `img` = '$relativePath', 
                                        `mo_ta` = '$mo_ta'
                                        WHERE `id_sanpham` = $id;";
                                $kq3 = mysqli_query($conn1, $sql3);
                            } 
                 
                 
                      }
                      else {
                        $sql3 = "UPDATE sanpham
                        SET 
                        `name` = '$name', 
                        `price` = '$price', 
                        `quantity` = '$quantity', 
                        `id_dm` = $id_dmsp, 
                        `id_brand` = $id_brand, 
                        `mo_ta` = '$mo_ta'
                        WHERE `id_sanpham` = $id;";
                        $kq3 = mysqli_query($conn1, $sql3);
                    }   
                    if ($kq3) {
                        echo "
                  <div class='alert alert-success'> thêm sản phẩm thành công </div> ";
                  echo "<script>
                  setTimeout(function() {
                      window.location.href = '../admin_qlsp.php';
                  }, 2000);
                  </script>";
                      } 
                      else {
                          echo "<div class='alert alert-danger'>Vui lòng chọn một tập tin hợp lệ.";  echo "<script>
                          </script>";
                      }
                  
              }    
                  // Xử lý dữ liệu từ form thêm sản phẩm
              
          }}
         
          ?>