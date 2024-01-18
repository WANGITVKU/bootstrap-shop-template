<!DOCTYPE html>
<html lang="en">
<?php 
        session_start();
    ?>
<head>
  <title>Quản trị Admin</title>
  <link rel="icon" href="../img/BR.png" type="image/jpeg">
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
   
   <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
  
</head>

<body class="app sidebar-mini rtl">
 
  <!-- Navbar-->

  <!-- Sidebar menu-->
  <!-- <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="/images/hay.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Võ Trường</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
     
      <li><a class="app-menu__item " href="#"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Quản lý khách hàng</span></a></li>
      <li><a class="app-menu__item active" href="admin_qlsp.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="table-data-oder.html"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside> -->
  <?php include "html/app-sidebar.php" ?>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item active"><a href="admin_qlsp.php">Quản lý danh mục</a></li>
        <li class="breadcrumb-item ">Sửa danh mục</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">SỬA THÔNG TIN DANH MỤC</h3>
          <div class="tile-body">
            
          

             <!---------------------------------- ADD SP ------------------------------------------>
            <?php  if (isset($_GET['id_dm'])) {
                $id_dm = $_GET['id_dm'];
                $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
                $sql = "SELECT * from danhmuc where id_dm = $id_dm";
                $kq = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($kq);
            } else {
                // Xử lý trường hợp 'idsp' không được đặt trong chuỗi truy vấn URL
                echo "Thiếu tham số 'id_dm' trong URL.";
            }?>
            
            <form id="form1" method="POST"  action="../admin/xuly/xuly_suadm.php" class="row" enctype="multipart/form-data">
              <div class="form-group col-md-3">
                <label class="control-label">Mã danh mục</label>
                <input class="form-control" type="text" name="id" placeholder="" value="<?php echo $row['id_dm']; ?>">
              </div>
              
              <div class="form-group col-md-3">
                <label class="control-label">Tên danh mục</label>
                <input class="form-control" type="text" name="name" value="<?php echo $row['tendanhmuc']; ?>" >
              </div>
              <input type="hidden" name="img_old" value="<?php echo $row['img']; ?>"> 

              <div class="form-group col-md-3">
                <label class="control-label">Size</label>
                <input class="form-control" type="text" name="size"  value="<?php echo $row['size']; ?>">
             </div>
                <div class="form-group col-md-12">
                <label class="control-label">Ảnh sản phẩm</label>
                <div id="myfileupload">
                  <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);" />
                </div>
                <div id="thumbbox">
                  <img height="450" width="400" alt="Thumb image" id="thumbimage" style="display: none" />
                  <a class="removeimg" href="javascript:"></a>
                </div>
                <div id="boxchoice">
                  <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                  <p style="clear:both"></p>
                </div>
                
                </select>
              </div>
              </div>
            
             
              

          </div>
          <input class="btn btn-save" type="submit"  name="form1_submit" value=" Them sp nay">
          </form>
          <a class="btn btn-cancel" href="table-data-product.html">Hủy bỏ</a>
          </div>
        <!-- ---------------------END------------------- -->

      <!---------------------------------- ADD DM ------------------------------------------>
 
        <!--
      // if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //       $name = $_POST['name'];
      //       $quantity = $_POST['quantity'];
      //       $price = $_POST['price'];
      //       $id_dm = $_POST['id_dm'];
      //       $id_brand = $_POST['id_brand'];     
      //   // Handle file upload
      //       if ($_FILES['ImageUpload']['error'] === UPLOAD_ERR_OK) {
      //           $uploadDir = 'img/'; // Specify the directory where you want to save the uploaded files
      //           $uploadFile = $uploadDir . basename($_FILES['ImageUpload']['name']);       
      //           // Move the uploaded file to the specified directory
      //           if (move_uploaded_file($_FILES['ImageUpload']['tmp_name'], $uploadFile)) {
      //               // File was uploaded successfully              
      //   // Now, you can store the file path ($uploadFile) in your database
      //               // Assuming you have a database connection already established
      //               $conn1 = mysqli_connect("localhost:3307", "root", "", "banhang");
      //               $sql3 = "INSERT INTO sanpham(name, price, quantity, id_dm, id_brand, img) 
      //                        VALUES ('$name', '$price', '$quantity', '$id_dm', '$id_brand', '$uploadFile')";
      //               $kq3 = mysqli_query($conn1, $sql3);
        
      //               if ($kq3) {
      //                   echo "<div class='alert alert-success'>Thêm sản phẩm thành công</div>";
      //                   echo "<script>
      //                       setTimeout(function() {
      //                           window.location.href = 'table-data-product.php';
      //                       }, 2000);
      //                   </script>";
      //               } 
                   
      //   else {
      //                   echo "Thêm sản phẩm thất bại!";
      //               }
      //           } 
      //               }
        
                   
      //   else {
      //               echo "File upload failed.";
      //           }
      //       } else {
      //           echo "Vui lòng chọn một tập tin hợp lệ.";
      //       }
        
        ?> -->
  </main>
  <script>

function readURL(input, thumbimage ) {
  if (input.files && input.files[0]) { //Sử dụng cho Firefox - Chrome
    var reader = new FileReader();
    reader.onload = function (e) {
      $(thumbimage).attr('src', e.target.result);
      $(thumbimage).show();
      // Hiển thị ảnh thứ hai
   
    }
    reader.readAsDataURL(input.files[0]);
  } else { // Sử dụng cho IE
    $(thumbimage).attr('src', input.value);
    // Hiển thị ảnh thứ hai
   
  }
$("#thumbimage").show();
$('.filename').text($("#uploadfile").val());
$('.Choicefile').css('background', '#14142B');
$('.Choicefile').css('cursor', 'default');
$(".removeimg").show();
$(".Choicefile").unbind('click');

}
$(document).ready(function () {
$(".Choicefile").bind('click', function () {
$("#uploadfile").click();
});



$(".removeimg").click(function () {
$("#thumbimage").attr('src', '').hide();
// Ẩn khung thứ hai

$("#myfileupload").html('<input type="file" id="uploadfile"  name="ImageUpload" onchange="readURL(this, \'#thumbimage\');" />');
$(".removeimg").hide();
$(".Choicefile").bind('click', function () {
$("#uploadfile").click();
});
$('.Choicefile').css('background', '#14142B');
$('.Choicefile').css('cursor', 'pointer');
$(".filename").text("");
});

});
</script>
  <!--
  MODAL CHỨC VỤ 
-->

  



  <script src="../js/js/jquery-3.2.1.min.js"></script>
  <script src="../js/js/popper.min.js"></script>
  <script src="../js/js/bootstrap.min.js"></script>
  <script src="../js/js/main.js"></script>
  <script src="../js/js/plugins/pace.min.js"></script>
  <script>
    const inpFile = document.getElementById("inpFile");
    const loadFile = document.getElementById("loadFile");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
    inpFile.addEventListener("change", function () {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        previewDefaultText.style.display = "none";
        previewImage.style.display = "block";
        reader.addEventListener("load", function () {
          previewImage.setAttribute("src", this.result);
        });
        reader.readAsDataURL(file);
      }
    });

  </script>
</body>

</html> 