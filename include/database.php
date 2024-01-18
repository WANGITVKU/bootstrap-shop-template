<?php
    
function fetchDataUsingMySQLi() {
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "banhang";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_GET['id_brand']) || isset($_GET['iddm'])) {
        // Ít nhất một trong hai tham số tồn tại
    
        if (isset($_GET['id_brand'])) {
            $id_brand = $_GET['id_brand'];
            // Bây giờ bạn có thể sử dụng $id_brand theo nhu cầu của bạn.
                // Thực hiện truy vấn
                $sql = "SELECT id_sanpham, id_brand, id_dm, name, img, price, quantity FROM sanpham WHERE id_brand='$id_brand' AND quantity > 1 ";
                $result = $conn->query($sql);

                // Kiểm tra và xử lý kết quả
                $products = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $products[] = $row;
                    }
                }

                    // Đóng kết nối
                    $conn->close();

                    return $products;
        }
    
        if (isset($_GET['iddm'])) {
            $id_dm = $_GET['iddm'];
            // Bây giờ bạn có thể sử dụng $id_dm theo nhu cầu của bạn.
                // Thực hiện truy vấn
            $sql = "SELECT id_sanpham, id_brand, id_dm, name, img, price, quantity FROM sanpham WHERE id_dm='$id_dm' AND quantity > 1 ";
            $result = $conn->query($sql);

            // Kiểm tra và xử lý kết quả
            $products = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }
            }

            // Đóng kết nối
            $conn->close();

            return $products;
        }
    } else {
        // Cả hai tham số đều không tồn tại
        echo "Không có tham số nào được truyền qua.";
    }

}
?>