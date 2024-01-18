<!DOCTYPE html>
<html lang="en">
<?php 
        session_start();
    ?>
<head>
  <title> Quản trị Admin</title>
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
  <script>

      function readURL(input, thumbimage, secondImage ) {
        if (input.files && input.files[0]) { //Sử dụng cho Firefox - Chrome
          var reader = new FileReader();
          reader.onload = function (e) {
            $(thumbimage).attr('src', e.target.result);
            $(thumbimage).show();
            // Hiển thị ảnh thứ hai
            $(secondImage).attr('src', e.target.result);
            $(secondImage).show();
          }
          reader.readAsDataURL(input.files[0]);
        } else { // Sử dụng cho IE
          $(thumbimage).attr('src', input.value);
          // Hiển thị ảnh thứ hai
          $(secondImage).attr('src', input.value);
          $(secondImage).show();
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

  $(".SecondChoicefile").bind('click', function () {
    $("#secondUploadfile").click();
  });

  $(".removeimg").click(function () {
    $("#thumbimage").attr('src', '').hide();
    // Ẩn khung thứ hai
    $("#secondImage").attr('src', '').hide();
    $("#myfileupload").html('<input type="file" id="uploadfile"  name="ImageUpload" onchange="readURL(this, \'#thumbimage\', \'#secondImage\');" />');
    $(".removeimg").hide();
    $(".Choicefile").bind('click', function () {
      $("#uploadfile").click();
    });
    $('.Choicefile').css('background', '#14142B');
    $('.Choicefile').css('cursor', 'pointer');
    $(".filename").text("");
  });

  $(".removeSecondImg").click(function () {
    // Ẩn khung thứ hai và làm sạch input
    $("#secondImage").attr('src', '').hide();
    $("#secondImageUpload").html('<input type="file" id="secondUploadfile" name="SecondImageUpload" onchange="readURL(this, \'#thumbimage\', \'#secondImage\');" />');
    $(".removeSecondImg").hide();
    $(".SecondChoicefile").bind('click', function () {
      $("#secondUploadfile").click();
    });
    $('#secondBoxchoice').css('background', '#14142B');
    $('#secondBoxchoice').css('cursor', 'pointer');
  });
});
  </script>
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
        <li class="breadcrumb-item">Danh sách sản phẩm</li>
        <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới sản phẩm</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#add_dmsp"><i
                    class="fas fa-folder-plus"></i> Thêm danh mục sản phẩm</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addbrand"><i
                    class="fas fa-folder-plus"></i> Thêm thương hiệu</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i
                    class="fas fa-folder-plus"></i> Thêm loại sản phẩm </a>
              </div>
            </div>
            
            <?php
              $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
              $sql = "SELECT MAX(id_sanpham) AS max_id FROM sanpham;";
              $kq = mysqli_query($conn, $sql);
              if ($kq) {
                $row = mysqli_fetch_assoc($kq);
                $ID = $row['max_id']+1;} 
                else {
                  echo "Có lỗi trong truy vấn: " . mysqli_error($conn);
              }
             ?>

             <!---------------------------------- ADD SP ------------------------------------------>

            <form id="form1" method="POST"  action="../admin/xuly/add_sp.php" class="row" enctype="multipart/form-data">
              <div class="form-group col-md-3">
                <label class="control-label">Mã sản phẩm </label>
                <input class="form-control" type="text" name ="id_sanpham"placeholder="" value="<?php echo $ID ?>">
              </div>
              <input type="hidden" name="form_id" value="1">
              <div class="form-group col-md-3">
                <label class="control-label">Tên sản phẩm</label>
                <input class="form-control" type="text" name="name">
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Giá bán</label>
                <input class="form-control" type="text" name="price">
              </div>
              <div class="form-group col-md-3">
                <input type="hidden" name="img_old" value=""> 
                <label for="exampleSelect" class="control-label">Chọn danh mục sản phẩm</label>
                <select class="form-control" id="exampleSelect" name="id_dmsp">
                  <option>-- Chọn danh mục --</option>
                  <?php
                    $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
                    $sql1 = "SELECT * from danhmuc";
                    $kq1 = mysqli_query($conn, $sql1);
                    while ($row1 = mysqli_fetch_array($kq1)) {
                        echo '<option value="' . $row1['id_dm'] . '">' . $row1['tendanhmuc'] . '</option>';
                      }
                    ?>
                </select>
                </div>
                <div class="form-group col-md-3">
             
                <label for="exampleSelect" class="control-label">Chọn thương hiệu sản phẩm</label>
                <select class="form-control" id="exampleSelect" name="id_brand">
                  <option>-- Chọn thương hiệu --</option>
                  <?php
                 
                    $sql2 = "SELECT * from brand";
                    $kq2 = mysqli_query($conn, $sql2);
                    while ($row2 = mysqli_fetch_array($kq2)) {
                        echo '<option value="' . $row2['id_brand'] . '">' . $row2['namebrand'] . '</option>';
                      }
                    ?>
                </select>
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
              <label for="editor"></label>
              <textarea name="mo_ta" id="editor"></textarea>
              <script>
                  ClassicEditor
                      .create( document.querySelector( '#editor' ) )
                      .catch( error => {
                          console.error( error );
                      } );
              </script>
             
              

          </div>
          <input class="btn btn-save" type="submit"  name="form1_submit" value=" Them sp nay">
          </form>
          <a class="btn btn-cancel" href="table-data-product.html">Hủy bỏ</a>
          </div>
        <!-- ---------------------END------------------- -->

      <!---------------------------------- ADD DM ------------------------------------------>
  <form id="form2" method="POST" action="../admin/xuly/add_dmsp.php"  enctype="multipart/form-data">
    <div class="modal fade" id="add_dmsp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới danh mục </h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tên danh mục mới</label>
              <input class="form-control" name="dmsp" type="text" required>
            </div>  <div class="form-group col-md-12">
              <label class="control-label">Thêm size cho danh mục</label>
              <input class="form-control" name="size" type="text" required>
            </div>

            <div class="form-group col-md-6">
              <label class="control-label">Danh mục sản phẩm hiện đang có</label>
              <ul style="padding-left: 20px;">
              <?php
                    $kq3 = mysqli_query($conn, $sql1);
                    while ($row3 = mysqli_fetch_array($kq3)) { ?>
                <li><?php echo $row3['tendanhmuc'] ?>    </li>
                 <?php }?>     
              </ul>
            </div>
          

          <div class="form-group col-md-6">
          <div id="secondImageContainer">
            <label class="control-label">Ảnh sản phẩm 2</label>
            <div id="secondImageUpload">
              <input type="file" id="secondUploadfile" name="SecondImageUpload" onchange="readURL(this, '#secondImage');" />
            </div>
            <div id="secondThumbbox">
              <img height="200" width="200" alt="Second Thumb image" id="secondImage" style="display: none" />
              <a class="removeSecondImg" href="javascript:"></a>
            </div>
            <div id="secondBoxchoice">
              <a href="javascript:" class="SecondChoicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh 2</a>
              <p style="clear:both"></p>
            </div>
          </div>

            <BR>
            
           
          <BR>
        </div>
        <div class="form-group col-md-12">
        <input class="btn btn-save" type="submit"  name="form2_submit" value=" Thêm ">
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
        <div class="modal-footer">
        </div>
        </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </form>
    <!-- ---------------------END------------------- -->

  <!---------------------------------- ADD Them loai san pham ------------------------------------------>
      

       <!---------------------END--------------------->
  <!---------------------------------- ADD tình trạng ------------------------------------------>
  <form id="form4" method="POST" action="../admin/xuly/add_brand.php">
  <div class="modal fade" id="addbrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm </h5>
              </span>
            </div>   
              <div class="form-group col-md-12">
                <label class="control-label">Tên thương hiệu mới</label>
                <input class="form-control" type="text" name="brand" required>
              </div>
              <br>
              <div class="form-group col-md-12">
              <label class="control-label">Thương hiệu hiện đang có</label>
              <ul style="padding-left: 20px;">
              <?php
                $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
                $sql5 = "SELECT * from brand";
                $kq5 = mysqli_query($conn, $sql5);
                while ($row5 = mysqli_fetch_array($kq5)) {         
                ?>
                <li><?php echo $row5['namebrand'] ?>    </li>
                 <?php }?>     
              </ul>
            </div>
              <button class="btn btn-save" type="submit" name="form4_submit">Lưu lại</button>
              <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>
          <!--END-->


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