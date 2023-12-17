<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <title>Danh sách nhân viên | Quản trị Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="../css/admin/main_admin.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- or -->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
      
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
      
      </head>

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
      <li><a class="app-menu__item active" href="table-data-product.html"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="admin/admin_qldh.php"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
     
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside> -->
  <?php include "html/app-sidebar.php" ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng </b></a></li>
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
                                    <th>Mã đơn hàng</th>
                                    <th>Tên Người Mua</th>
                                    <th>Email</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Tổng tiền</th>
                                    <th>Thời gian Đặt hàng</th>
                                    <th>Tình Trạng</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                
                                <?php  
                                    if (isset($_SESSION["full_name"])) {
                                    $full_name = $_SESSION["full_name"];
                                    $email = $_SESSION["email"];}
                                    $conn = mysqli_connect("localhost:3307","root","","banhang");
                                    $sql="SELECT * from donhang where email = '$email'";
                                  
                                    $kq= mysqli_query($conn,$sql);
                               
                                         
                                    while ($row= mysqli_fetch_array($kq)){
                                        echo '<tr>';?>
                                        <td class="align-middle" width="10"><input type="checkbox" name="check1" value="1"></td>
                                         <td class="align-middle"><?php echo $row['id_donhang']   ?> <br> <a class="details-link" href="chitietdonhang.php?iddh=<?php echo $row['id_donhang'] ?>">Xem Chi Tiết </a>  </td>
                                         <td class="align-middle"><?php  echo $row['full_name']   ?></td>
                                      
                                          <td class="align-middle" > <?php echo $row['email']   ?></td>
                                          <td class="align-middle"><?php echo $row['sdt']   ?> </td>
                                          <td class="align-middle"><?php echo $row['dia_chi']   ?> </td>
                                         
                                          <td><?php echo $row['tong_tien']   ?> </td>
                                          <td><?php echo $row['time']   ?> </td>
                                          <td><div id="myElement<?php echo $row['id_donhang']?>" onclick="changeContent(<?php echo $row['id_donhang']?>)"><?php echo html_entity_decode($row['tinh_trang']);?></td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                              data-id_donhang="<?php echo $row['id_donhang'] ?>"
                                              onclick="myFunction('<?php echo $row['id_donhang'] ?>')">
                                          <i class="fas fa-trash-alt"></i> 
                                                  </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                                       data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                       
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
    <script src="js_ajax/xulydh.js"></script>
    <script src="../js/js/jquery-3.2.1.min.js"></script>
    <script src="../js/js/popper.min.js"></script>
    <script src="../js/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="src/jquery.table2excel.js"></script>
    <script src="../js/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- Essential javascripts for application to work-->
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
        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("myTable").deleteRow(i);
        }
        jQuery(function () {
            jQuery(".trash").click(function () {
                var id_donhang = $(this).data("id_donhang"); // Lấy giá trị id_sanpham từ thuộc tính data

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
                            data: { id_donhang:id_donhang},
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
        oTable = $('#sampleTable').dataTable();
        $('#all').click(function (e) {
            $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
            e.stopImmediatePropagation();
        });
    </script>
</body>

</html>