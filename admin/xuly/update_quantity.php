<?php
if (isset($_GET['item_id']) && isset($_GET['new_value'])) {
    $itemId = $_GET['item_id'];
    echo "ip_quantity".$itemId;
    $newValue = $_GET['new_value'];
    $conn1 = mysqli_connect("localhost:3307", "root", "", "banhang");
    $stmt = $conn1->prepare("UPDATE so_luong SET quantity = ? WHERE id_quantity = ?");

    $sql1 = "SELECT * from so_luong where id_quantity= $itemId";
    $kq1 = mysqli_query($conn1, $sql1);
    $row1 = mysqli_fetch_array($kq1);
    $id_sanpham=$row1['id_sp'];

        $sql2 = "SELECT SUM(quantity) AS total_quantity
        FROM so_luong
        WHERE id_sp = $id_sanpham";
        $kq2 = mysqli_query($conn1, $sql2);
        if ($kq2) {
            
        $row2 = mysqli_fetch_array($kq2);
        $total_quantity = $row2['total_quantity'];
        $sql3 = "UPDATE sanpham SET quantity = $total_quantity WHERE id_sanpham = $id_sanpham";
        $kq3 = mysqli_query($conn1, $sql3); 
        echo "Cập nhật dữ liệu thành công! total_quantity: ".$total_quantity;
        } else {
        echo "Lỗi khi truy vấn dữ liệu (SELECT): " . mysqli_error($conn1);
        }
    
    $stmt->bind_param("ii", $newValue, $itemId);
    $stmt->execute();
    if ($stmt->execute()) {
        echo "Cập nhật dữ liệu thành công! ".$newValue;
    } else {
        echo "Lỗi khi cập nhật dữ liệu: " . $stmt->error;
    }
}
?>