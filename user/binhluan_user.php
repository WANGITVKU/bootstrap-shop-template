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
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách bình luận của tôi </b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Nội dung đã bình luận</th>
                                    <th>Thơi gian</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                
                                <?php  
                                    if (isset($_SESSION["full_name"])) {
                                    $full_name = $_SESSION["full_name"];
                                    $email = $_SESSION["email"];}
                                    $conn = mysqli_connect("localhost:3307","root","","banhang");
                                    $sql = "SELECT * from chitiet_user where email = '$email'";
                                    $kq = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($kq);
                                    
                                    $sql1="SELECT * from binhluan where id_user = {$row['id_user']}";
                                    $kq1= mysqli_query($conn,$sql1);
                                    
                                    while ($row1= mysqli_fetch_array($kq1)){
                                        // var_dump($row);
                                        $sql2="SELECT * from sanpham where id_sanpham = {$row1['id_sanpham']}";
                                        $kq2= mysqli_query($conn,$sql2);
                                        $row2 = mysqli_fetch_array($kq2); 

                                        echo '<tr>';?>
                                        <td class="align-middle" width="10"><input type="checkbox" name="check1" value="1"></td>
                                        <td class="align-middle"><?php  echo $row2['name']   ?></td>
                                        <td class="align-middle text-center" style="width: 100px; height: 50px;">
                                                <img src="../<?php echo  $row2['img']  ?>" alt="" style="width: 100%; height:auto;">
                                          </td>
                                          <td class="align-middle" > <?php echo $row1['noidung']   ?></td>
                                          <td><?php echo $row1['time']   ?> </td>
                                         
                                    <td>
                                        <a href= "../detail.php?idsp=<?php echo $row1['id_sanpham']   ?>"><button class="btn btn-primary btn-sm edit" type="button"><i class="fa fa-eye"></i></button> </a>
                                       
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
        
        oTable = $('#sampleTable').dataTable();
        $('#all').click(function (e) {
            $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
            e.stopImmediatePropagation();
        });
    </script>
</body>

</html>