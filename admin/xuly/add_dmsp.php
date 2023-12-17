<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<?php
         
          if ($_SERVER["REQUEST_METHOD"] == "POST") {

              if (isset($_POST["form2_submit"])) {           
                $tendm = $_POST['dmsp'];    
                $size = $_POST['size'];
                if ($_FILES['SecondImageUpload']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = '../img/'; // Specify the directory where you want to save the uploaded files
                    $uploadFile = $uploadDir . basename($_FILES['SecondImageUpload']['name']);       
                    // Move the uploaded file to the specified directory
                    if (move_uploaded_file($_FILES['SecondImageUpload']['tmp_name'], $uploadFile)) {
                            $con = mysqli_connect("localhost:3307", "root", "", "banhang");
                            if ($tendm!== '' && $uploadFile !==''  && $size  !=='' ) {
                            $sql = "INSERT INTO danhmuc( tendanhmuc, img, size) 
                                    VALUES ('$tendm','$uploadFile', '$size')";
                            $kq = mysqli_query($con, $sql);
                            if ($kq) {
                                echo "
                        <div class='alert alert-success'> thêm danh mục thành công </div> ";
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
              echo "<div class='alert alert-danger'>Vui lòng chọn một tập tin hợp lệ.";   echo "<script>
              setTimeout(function() {
                  window.location.href = 'form-add-san-pham.php';
              }, 5000);
              </script>";
          }
      
  }    
      // Xử lý dữ liệu từ form thêm sản phẩm
  
}}
      // Xử lý dữ liệu từ form thêm sản phẩm
