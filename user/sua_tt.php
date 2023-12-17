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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="ajax/app.js"></script>
   
   <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
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
</head>

<body class="app sidebar-mini rtl">
  <style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;

    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      /* color: #FFF; */
      /* background-color: #DC403B; */
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
  </style>
  <!-- Navbar-->

  <!-- Sidebar menu-->
  <?php include "html/app-sidebar.php" ;
  if (isset($_SESSION["email"])) {
                            $email = $_SESSION["email"];
                            $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
                            $sql1 = "SELECT * from chitiet_user where email = '$email' ";
                            $kq1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_array($kq1);
                            } else {
                            // Xử lý trường hợp 'idsp' không được đặt trong chuỗi truy vấn URL
                            echo "Thiếu tham số 'id' trong URL.";
                           };
                          
                           require '../diachi/connnect.php';
                           $sql = "SELECT * FROM province";
                           $result = mysqli_query($conn, $sql);?>?>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Đăng Nhập</li>
        <li class="breadcrumb-item"><a href="#">Cập nhập thông tin tài khoản</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">

        <div class="tile">

          <h3 class="tile-title">Nhập thông tin liên hệ</h3>
          <div class="tile-body">
          
            <form class="row" action="xuly/xuly_ttcn.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
              <div class="form-group col-md-4">
                <label class="control-label">Họ và tên</label>
                <input class="form-control" name="name" type="text" value="<?php echo $row1['full_name'] ?>" required>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Địa chỉ email</label>
                <input class="form-control" name="email" type="text" value="<?php echo $row1['email'] ?>" required>
              </div>
              <div class="form-group  col-md-4">
                <label class="control-label">Số điện thoại</label>
                <input name="sdt"  class="form-control" type="tel"  value="0<?php echo $row1['sdt'] ?>"   placeholder="Nhập số điện thoại (10 chữ số)"  pattern="[0-9]{10}" required >
              </div>
              <div class="form-group col-md-4">
              <label for="province">Tỉnh/Thành phố</label>
              <select id="province" name="province" class="custom-select" required>
              <option value="">Chọn một quận/huyện</option>
                <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                      
                  ?>  
                      <option value="<?php echo $row['province_id'] ?>"><?php echo $row['name'] ?></option>                 
                  <?php 
                  }
                  ?>
              </select>
              </div>
              <div class="form-group  col-md-4">
              <label for="district">Quận/Huyện</label>
              <select id="district" name="district" class="custom-select" required>
                  <option value="">Chọn một quận/huyện</option>
              </select>
              </div>
              <div class="form-group  col-md-4">
              <label for="wards">Phường/Xã</label>
              <select id="wards" name="wards" class="custom-select" required>
                  <option value="">Chọn một xã</option>
              </select>
              </div>
              <div class="form-group  col-md-4">
                <label class="control-label">Địa chỉ chi tiết</label>
                <input class="form-control" name="diachi" type="text" required>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Ngày sinh</label>
                <input class="form-control" name="date" type="date"   value="<?php echo $row1['ngay_sinh'] ?>" required>
              </div>
            
              <div class="form-group col-md-4">
                <label class="control-label">Số CCCD</label>
                <input class="form-control" type="number" name="CCCD"  value="<?php echo (int)$row1['CCCD'] ?>"required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Giới tính</label>
                <select class="form-control" name="gioi_tinh" id="exampleSelect2" required>
                  <option  value="  <?php echo $row1['gioi_tinh'] ?>" >--   <?php echo $row1['gioi_tinh'] ?>--</option>
                  <option value="Nam" >Nam</option>
                  <option value="Nữ">Nữ</option> 
                  <option value="Khác">Khác</option>
                </select>
              </div>
        
              <div class="form-group col-md-12">
              <label class="control-label">Ảnh Đại Diện</label>
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
          </div><div class="form-group col-md-3">
          <input class="btn btn-save" type="submit"  name="submit" value=" Them sp nay">
          <a class="btn btn-cancel" href="../shop.php">Hủy bỏ</a>
        </div>
        </div>
         
  </main>


<script src="../admin/js/js/jquery-3.2.1.min.js"></script>
  <script src="../admin/js/js/popper.min.js"></script>
  <script src="../admin/js/js/bootstrap.min.js"></script>
  <script src="../admin/js/js/main.js"></script>
  <script src="../admin/js/js/plugins/pace.min.js"></script>
</body>

</html>