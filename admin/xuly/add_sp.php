<!DOCTYPE html>
<html lang="en">
<?php 
        session_start();
    ?>
<head>
  <title>Thêm sản phẩm | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../css/admin/main_admin.css">
  <link rel="stylesheet" type="text/css" href="../css/admin/icon_admin.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<?php
         
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
             

              if (isset($_POST["form1_submit"])) {
                      
                      $name = $_POST['name'];
                      $quantity = $_POST['quantity'];
                      $price = $_POST['price'];
                      $id_dmsp=$_POST['id_dmsp'];
                      $mo_ta=$_POST['mo_ta'];
                        $id_brand=$_POST['id_brand']; 
                  // Handle file upload
                      if ($_FILES['ImageUpload']['error'] === UPLOAD_ERR_OK) {
                          $uploadDir = 'img/'; // Specify the directory where you want to save the uploaded files
                          $uploadFile = $uploadDir . basename($_FILES['ImageUpload']['name']);       
                          // Move the uploaded file to the specified directory
                          if (move_uploaded_file($_FILES['ImageUpload']['tmp_name'], $uploadFile)) {
                              // File was uploaded successfully              
                         // Now, you can store the file path ($uploadFile) in your database
                              // Assuming you have a database connection already established
                              $conn1 = mysqli_connect("localhost:3307", "root", "", "banhang");
                              $sql3 = "INSERT INTO sanpham(name, price, quantity, id_dm,id_brand, img, mo_ta) 
                                      VALUES ('$name', '$price', '$quantity', $id_dmsp,$id_brand, '$uploadFile','$mo_ta')";
                              $kq3 = mysqli_query($conn1, $sql3);
                  
                              if ($kq3) {
                                echo "
                          <div class='alert alert-success'> thêm sản phẩm thành công </div> ";
                          echo "<script>
                          setTimeout(function() {
                              window.location.href = 'form-add-san-pham.php';
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
                          echo "<div class='alert alert-danger'>Vui lòng chọn một tập tin hợp lệ.";  echo "<script>
                       
                          </script>";
                      }
                  
              }    
                  // Xử lý dữ liệu từ form thêm sản phẩm
              
          }
         
          ?>