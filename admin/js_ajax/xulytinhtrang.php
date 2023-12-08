<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "banhang";

$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Nhận dữ liệu từ yêu cầu Ajax
$oldContent = $_POST['oldContent'];
$newContent = $_POST['newContent'];
$id_donhang = $_POST['id_donhang'];

// Thực hiện câu truy vấn SQL để cập nhật giá trị trong cột
$sql = "UPDATE donhang SET tinh_trang = '$newContent' WHERE id_donhang = '$id_donhang'";

if ($conn->query($sql) === TRUE) {
    echo "Update successful";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>