<meta charset="utf-8">

<?php
session_start();
if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $diachi= $_POST['diachi'];
    $email=$_POST['email'];
    $sdt=$_POST['sdt'];
    $province_id=$_POST['province'];
    $district_id = $_POST['district'];
    $wards_id = $_POST['wards'];
    $tongtien=$_POST['tongtien'];
    $currentDateTime = date('Y-m-d H:i:s');
    
    echo $name;
    echo "<pre>";
        $conn = mysqli_connect("localhost:3307", "root", "", "login_register");
        $sql = "SELECT name FROM province WHERE province_id = $province_id";
        $kq = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($kq);
        // echo $row['name'];
    echo "<pre>";
        $sql1 = "SELECT name FROM district WHERE district_id = $district_id";
        $kq1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($kq1);
        // echo $row1['name'];

    echo "<pre>";
    // var_dump($_POST);
        $sql2 = "SELECT name FROM wards WHERE wards_id = $wards_id";
        $kq2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($kq2);
        // echo $row2['name'];
        $diachi_cuthe=$row['name'].'-'.$row1['name'].'-'.$row2['name'].'-'. $diachi;
        $conn1 = new mysqli("localhost:3307", "root", "", "banhang");
        if ($conn1->connect_error) {
            die("Kết nối không thành công: " . $conn1->connect_error);
        }
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt = mysqli_prepare($conn1, "INSERT INTO donhang (full_name, email, dia_chi, sdt, tong_tien, time) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $diachi_cuthe, $sdt, $tongtien, $currentDateTime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        $affected_rows = mysqli_affected_rows($conn);// Kiểm tra và in thông báo
        if ($affected_rows > 0) {
            echo "Dữ liệu đã được thêm thành công!";
            
        } else {
            echo "Không thể thêm dữ liệu. Đã xảy ra lỗi.";
        }

        
             // Đóng kết nối
        $sql4 = "SELECT MAX(id_donhang) AS max_id FROM donhang";
        $kq4 = mysqli_query($conn1, $sql4);
        if ($kq4) {
          $row4 = mysqli_fetch_assoc($kq4);
          $ID = $row4['max_id'];} 
      
          else {
            echo "Có lỗi trong truy vấn: " . mysqli_error($conn);
        }
       echo  $ID.'<br><br>';
        
        // $sql = "SELECT MAX(id_sanpham) AS max_id FROM sanpham;";
        // $kq = mysqli_query($conn, $sql);
        // if ($kq) {
        //   $row = mysqli_fetch_assoc($kq);
        //   $ID = $row['max_id']+1;} 
        //   else {
        //     echo "Có lỗi trong truy vấn: " . mysqli_error($conn);
        // }
        
    



    $total = 0;
    var_dump($_POST);
    if (empty($_SESSION['cart'])) {
        echo "Your cart is empty."; // Or whatever message you want
    } else {
    $item = array();

   
    foreach ($_SESSION['cart'] as $id_sanpham => $size) {
        $item[] = $id_sanpham;

        foreach ($size as $size => $value) {
            // In ra thông tin từ giỏ hàng
            // Lặp qua số lần tương ứng với Quality để in ra thông tin từ SQL
               
                echo "ID: $id_sanpham, Size: $size, Quality: $value<br>";
                echo "Bạn đã chọn: " . $_POST['sizeid_' . $id_sanpham.'_'.$size]." Nó thuộc".$id_sanpham.'<br>' ;
                ${'sizeid' . $id_sanpham} =  $_POST['sizeid_' . $id_sanpham.'_'.$size];
                echo ${'sizeid' . $id_sanpham} ;
               
                                    $sql5 = "SELECT * from sanpham where id_sanpham = $id_sanpham";
                                    $kq5 = mysqli_query($conn1, $sql5);
                                    while ($row = mysqli_fetch_array($kq5)) {

                $sql6 = "INSERT INTO ct_donhang (id_donhang,id_sanpham,so_luong,size,don_gia,thanh_tien)   VALUES ('$ID', '$id_sanpham', '$value', '".$_POST['sizeid_' . $id_sanpham.'_'.$size]."', '".$row['price']."','$tongtien' )";
                $kq6 = mysqli_query($conn1, $sql6);
                  
                if ($kq6) {
                  echo "
            <div class='alert alert-success'> thêm sản phẩm thành công </div> ";
            echo "<script>
            setTimeout(function() {
                // window.location.href = 'home.php';
            }, 2000);
            </script>";
                } 
                // Lưu trữ giá trị được chọn tr   ong biến
                            
                     // Hiển thị giá trị đã chọn
                    // In ra thông tin từ giỏ hàng
                    
                
                                    }
            }
        
            $str = implode(",", $item);
            // Các xử lý khác...
        }

      
    }}

?>