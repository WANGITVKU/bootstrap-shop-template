<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title> Quản trị Admin</title>
        <link rel="icon" href="../img/BR.png" type="image/jpeg">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="../css/admin/main_admin.css">
        <link rel="stylesheet" type="text/css" href="../css/admin/icon_admin.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- or -->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
      
      </head>
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
<body onload="time()" class="app sidebar-mini rtl">
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
      <li><a class="app-menu__item active" href="admin/admin_qlsp.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="admin_qldh.php"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
     
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside> -->
  <?php include "html/app-sidebar.php" ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="form-add-san-pham.php" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                                  class="fas fa-file-upload"></i> Tải từ file</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                  class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                                  class="fas fa-copy"></i> Sao chép</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                                  class="fas fa-file-pdf"></i> Xuất PDF</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                  class="fas fa-trash-alt"></i> Xóa tất cả </a>
                            </div>
                          </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Giá tiền</th>
                                    <th>Danh mục</th>
                                    <th>Brand</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $conn = mysqli_connect("localhost:3307","root","","banhang");
                                    $sql="SELECT * from sanpham";
                                  
                                    $kq= mysqli_query($conn,$sql);
                               
                                         
                                    while ($row= mysqli_fetch_array($kq)){
                                        $id_sanpham=$row['id_sanpham'] ;
                                        
                                        echo '<tr>';?>
                                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                         <td><?php echo $row['id_sanpham']   ?></td>
                                         <td class="align-middle" ><?php  echo $row['name']   ?></td>
                                         <td class="align-middle" style="width: 125px; height: 125px;">
                                                <img src="../<?php echo $row['img'] ?>" alt="" style="max-width: 100%; max-height: 100%;">
                                            </td>


                                            <!-- Xử lý số lượng -->
                                          <td class="align-middle"> <?php
                                                  $sql1 = "SELECT SUM(quantity) AS total_quantity
                                                  FROM so_luong
                                                  WHERE id_sp = $id_sanpham";
                                                  $kq1 = mysqli_query($conn, $sql1);
                                              if ($kq1) {
                                                  $row1 = mysqli_fetch_array($kq1);
                                                  $total_quantity = $row1['total_quantity'];
                                           
                                                  $sql2 = "UPDATE sanpham SET quantity = $total_quantity WHERE id_sanpham = $id_sanpham";
                                                  $kq2 = mysqli_query($conn, $sql2); 
                                                  if ($kq2) {
                                                    echo $total_quantity;
                                                  } else {
                                                      echo "Lỗi khi cập nhật dữ liệu (UPDATE): " . mysqli_error($conn);
                                                  }
                                              } else {
                                                  echo "Lỗi khi truy vấn dữ liệu (SELECT): " . mysqli_error($conn);
                                              }?></td>
                                           <!-- Xử lý số lượng -->
                                          

                                          <td class="align-middle"><span class="badge bg-success">Còn hàng </span>  <br><a class="details-link" href="soluong_sp.php?id_sp=<?php echo $row['id_sanpham'] ?>">Xem Chi Tiết </a></td>
                                          <td><?php echo $row['price']   ?> đ</td>
                                         <td><?php
                                                  $id_dm=$row['id_dm'] ;                                              
                                                  $query = "SELECT tendanhmuc FROM danhmuc WHERE id_dm =   $id_dm";
                                                  $result = $conn->query($query);
                                                  if ($result->num_rows > 0) {
                                                      // Lặp qua từng hàng kết quả
                                                      while($row1 = $result->fetch_assoc()) {
                                                          echo  $row1['tendanhmuc'];
                                                      }
                                                  } else {
                                                      echo "Không tìm thấy dữ liệu";
                                                  } 
                                                  ?></td>
                                          <td><?php
                                          $id_brand=$row['id_brand'] ;                                              
                                          $query1 = "SELECT namebrand FROM brand WHERE id_brand =  $id_brand";
                                          $result1 = $conn->query($query1);
                                          if ($result1->num_rows > 0) {
                                              // Lặp qua từng hàng kết quả
                                              while($row2 = $result1->fetch_assoc()) {
                                                  echo  $row2['namebrand'];
                                              
                                              }
                                          } else {
                                              echo "Không tìm thấy dữ liệu";
                                          } 
                                          ?></td>
                                                  
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                              data-id-sanpham="<?php echo $row['id_sanpham'] ?>"
                                              onclick="myFunction('<?php echo $row['id_sanpham'] ?>')">
                                          <i class="fas fa-trash-alt"></i> 
                                                  </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" onclick="window.location.href='sua_sp.php?idsp=<?php echo $row['id_sanpham']; ?>'"><i class="fas fa-edit"></i>
                                          </button>
                                        
                                    </td>
                                    <?php    
                                    }
                                    ?>                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <!-- Essential javascripts for application to work-->
    <script src="../js/js/jquery-3.2.1.min.js"></script>
    <script src="../js/js/popper.min.js"></script>
    <script src="../js/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="src/jquery.table2excel.js"></script>
    <script src="../js/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
        //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
    </script>
    <script>
      jQuery(function () {
    jQuery(".trash").click(function () {
        var id_sanpham = $(this).data("id-sanpham"); // Lấy giá trị id_sanpham từ thuộc tính data

        swal({
            title: "Cảnh báo",
            text: "Bạn có chắc chắn là muốn xóa sản phẩm này?",
            buttons: ["Hủy bỏ", "Đồng ý"],
        })
        .then((willDelete) => {
            if (willDelete) {
                // Sử dụng jQuery AJAX để gửi dữ liệu đến trang xử lý
                $.ajax({
                    type: "POST",
                    url: "xuly/xuly_xoa.php",
                    data: { id_sanpham: id_sanpham },
                    success: function (response) {
                        // Xử lý phản hồi từ máy chủ
                        swal("Đã xóa thành công.!", {
                            icon: "success",
                        }).then(function (response) {
                            // Tải lại trang
                            location.reload();
                        });
                    },
                    error: function (error) {
                        // Xử lý lỗi
                        console.error("Error:", error);
                    }
                });
            }
        });
    });
});
        
    </script>
    <div id="result"></div>

<!-- Script Ajax -->

</body>

</html>