<?php
// xyly/xuly_xoa.php

// Include your database connection file or establish a connection here
// For example:
// include_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có dữ liệu 'id_sanpham' được gửi từ trình duyệt không
    if (isset($_POST['id_sanpham'])) {
        $id_sanpham = $_POST['id_sanpham'];

        // Gọi hàm xóa sản phẩm
        $success = deleteProduct($id_sanpham);

        // Gửi kết quả trả về dưới dạng JSON
        if ($success) {
            $response = array('success' => true, 'message' => 'Xóa sản phẩm thành công.');
        } else {
            $response = array('success' => false, 'message' => 'Không thể xóa sản phẩm.');
        }

        echo json_encode($response);
    } 

    // --------------------xoa brand-------------------
    if (isset($_POST['id_brand'])) {
        $id_brand= $_POST['id_brand'];

        // Gọi hàm xóa sản phẩm
        $success = deleteBrand($id_brand);

        // Gửi kết quả trả về dưới dạng JSON
        if ($success) {
            $response = array('success' => true, 'message' => 'Xóa sản phẩm thành công.');
        } else {
            $response = array('success' => false, 'message' => 'Không thể xóa sản phẩm.');
        }

        echo json_encode($response);
    } 

        // --------------------xoa DANH MUC-------------------
    if (isset($_POST['id_dm'])) {
        $id_dm= $_POST['id_dm'];

        // Gọi hàm xóa sản phẩm
        $success = deleteDM($id_dm);

        // Gửi kết quả trả về dưới dạng JSON
        if ($success) {
            $response = array('success' => true, 'message' => 'Xóa sản phẩm thành công.');
        } else {
            $response = array('success' => false, 'message' => 'Không thể xóa sản phẩm.');
        }

        echo json_encode($response);
    } 
    if (isset($_POST['id_donhang'])) {
        $id_donhang= $_POST['id_donhang'];

        // Gọi hàm xóa sản phẩm
        $success = deleteDH($id_donhang);

        // Gửi kết quả trả về dưới dạng JSON
        if ($success) {
            $response = array('success' => true, 'message' => 'Xóa sản phẩm thành công.');
        } else {
            $response = array('success' => false, 'message' => 'Không thể xóa sản phẩm.');
        }

        echo json_encode($response);
    } 
} else {
    // Nếu không phải là phương thức POST
    $response = array('success' => false, 'message' => 'Phương thức không hợp lệ.');
    echo json_encode($response);
}

// Hàm xóa sản phẩm (đây là ví dụ, bạn cần tùy chỉnh theo cấu trúc cơ sở dữ liệu của bạn)
function deleteProduct($id_sanpham) {
    // Thực hiện xóa sản phẩm từ cơ sở dữ liệu, sử dụng MySQLi hoặc PDO
    // Thay đổi 'your_db_connection' và 'your_products_table' theo cấu trúc cơ sở dữ liệu của bạn
    $conn = new mysqli('localhost:3307', 'root', '', 'banhang');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Xóa sản phẩm từ cơ sở dữ liệu
    $query = "DELETE FROM sanpham WHERE id_sanpham = $id_sanpham";
    $result = $conn->query($query);

    // Đóng kết nối
    $conn->close();

    // Trả về true nếu xóa thành công, ngược lại trả về false
    return $result;
}
function deleteBrand($id_brand) {
    // Thực hiện xóa sản phẩm từ cơ sở dữ liệu, sử dụng MySQLi hoặc PDO
    // Thay đổi 'your_db_connection' và 'your_products_table' theo cấu trúc cơ sở dữ liệu của bạn
    $conn = new mysqli('localhost:3307', 'root', '', 'banhang');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Xóa sản phẩm từ cơ sở dữ liệu
    $query = "DELETE FROM brand WHERE id_brand = $id_brand";
    $result = $conn->query($query);

    // Đóng kết nối
    $conn->close();

    // Trả về true nếu xóa thành công, ngược lại trả về false
    return $result;
}
function deleteDM($id_dm) {
    // Thực hiện xóa sản phẩm từ cơ sở dữ liệu, sử dụng MySQLi hoặc PDO
    // Thay đổi 'your_db_connection' và 'your_products_table' theo cấu trúc cơ sở dữ liệu của bạn
    $conn = new mysqli('localhost:3307', 'root', '', 'banhang');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Xóa sản phẩm từ cơ sở dữ liệu
    $query = "DELETE FROM danhmuc WHERE id_dm = $id_dm";
    $result = $conn->query($query);

    // Đóng kết nối
    $conn->close();

    // Trả về true nếu xóa thành công, ngược lại trả về false
    return $result;
}

function deleteDH($id_donhang) {
    // Thực hiện xóa sản phẩm từ cơ sở dữ liệu, sử dụng MySQLi hoặc PDO
    // Thay đổi 'your_db_connection' và 'your_products_table' theo cấu trúc cơ sở dữ liệu của bạn
    $conn = new mysqli('localhost:3307', 'root', '', 'banhang');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Xóa sản phẩm từ cơ sở dữ liệu
    $query = "DELETE FROM donhang WHERE id_donhang = $id_donhang";
    $result = $conn->query($query);

    // Đóng kết nối
    $conn->close();

    // Trả về true nếu xóa thành công, ngược lại trả về false
    return $result;
}
?>