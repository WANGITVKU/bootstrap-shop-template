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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Bootstrap JS và Popper.js -->

  </head>
<?php
         
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
             

              if (isset($_POST["form1_submit"])) {
                      $id_sanpham= $_POST['id_sanpham'];
                      $name = $_POST['name'];
               
                      $price = $_POST['price'];
                      $id_dmsp=$_POST['id_dmsp'];
                      $mo_ta=$_POST['mo_ta'];
                        $id_brand=$_POST['id_brand']; 
                  // Handle file upload
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
                            echo $uploadFile;
                              // File was uploaded successfully              
                         // Now, you can store the file path ($uploadFile) in your database
                              // Assuming you have a database connection already established
                              $conn1 = mysqli_connect("localhost:3307", "root", "", "banhang");
                              $sql3 = "INSERT INTO sanpham(id_sanpham,name, price, id_dm,id_brand, img , mo_ta) 
                                      VALUES ( $id_sanpham ,'$name', '$price', $id_dmsp ,$id_brand, '$relativePath','$mo_ta')";
                              $kq3 = mysqli_query($conn1, $sql3);
                  
                              if ($kq3) {
                             
                                $sql1 = "SELECT size FROM danhmuc WHERE id_dm = $id_dmsp";
                                $result = $conn1->query($sql1);
        
                                if ($result->num_rows > 0) {
                                  $row1 = $result->fetch_assoc();
                                  $data = $row1['size'];
                              
                                  // Tách dữ liệu thành mảng
                                  $dataArray = explode(', ', $data);
                                  foreach ($dataArray as $value) {  
                                    
                                     $sql2 = "INSERT INTO so_luong ( id_sp ,size) VALUES ($id_sanpham ,'$value')";
                                     $result2 = $conn1->query($sql2);     
                              // Kiểm tra và xử lý kết quả thêm dữ liệu
                              if ($result2) {
                                echo "Thêm dữ liệu thành công cho size: $value";
                            } else {
                                echo "Lỗi khi thêm dữ liệu cho size: $value - " . $conn->error;
                            }
                        }
                            } else {
                                echo "Không có dữ liệu size từ danh mục có id_dm = $id_dmsp";
                            }
                                echo "
                          <div class='alert alert-success'> thêm sản phẩm thành công </div> ";
                          echo "<script>
                          setTimeout(function() {
                              window.location.href = '../soluong_sp.php?id_sp=$id_sanpham >;
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
                          echo "<div class='alert alert-danger'>Vui lòng chọn ảnh cho sản phẩm </div>";   echo "<script>
                          setTimeout(function() {
                              window.location.href = '../form-add-san-pham.php';
                          }, 6000);
                          </script>";
                      }
                  
              }    
                  // Xử lý dữ liệu từ form thêm sản phẩm
              
          }
         
          ?>
