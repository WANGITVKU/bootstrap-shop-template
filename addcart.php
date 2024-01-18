<!-- <?php
// if (empty($_POST['ten_truong'])) {
//     echo "Vui lòng nhập vào trường!";
// } else {
//     // Xử lý dữ liệu khi không trống
//     $ten_truong = $_POST['ten_truong'];
//     // Tiếp tục xử lý...
// }
?> -->
<?php
session_start();

if (isset($_POST["id_sp"]) && isset($_POST["size"])) {
$id=$_POST["id_sp"];
$size = $_POST["size"];
if(isset($_SESSION['cart'][$id][$size]))
{
$qty = $_SESSION['cart'][$id][$size] + 1;
}
else
{ 
    $qty=1;
}
        $_SESSION['cart'][$id][$size]=$qty;
        $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
        $quantitySql = "SELECT quantity
        FROM so_luong
        WHERE id_sp = '$id'AND size = '$size';";  
        $kqQuantity = mysqli_query($conn, $quantitySql);
        $quantity = mysqli_fetch_array($kqQuantity, MYSQLI_ASSOC)['quantity'];
        if ($qty > $quantity) {
          
                
                if($_SESSION['cart'][$id][$size]>=1){
                    $_SESSION['cart'][$id][$size]= $quantity;
             
            echo "<script>
                alert('Sản phẩm này đã hết hàng. Vui lòng chọn lại số lượng qua trang cart.');
                
            </script>";
            echo "<script>window.location='shop.php';</script>";
         
            exit; 
          }
        }
if (isset($_GET['id_brand']) || isset($_GET['iddm'])) {
    // Ít nhất một trong hai tham số tồn tại

    if (isset($_GET['id_brand'])) {
        $id_brand = $_GET['id_brand'];
        header("location:shop.php?id_brand=$id_brand");
    }

    if (isset($_GET['iddm'])) {
        $id_dm = $_GET['iddm'];
        // Bây giờ bạn có thể sử dụng $id_dm theo nhu cầu của bạn.
            // Thực hiện truy vấn
        header("location:shop.php?iddm=$id_dm");
    }
} else {
    // Cả hai tham số đều không tồn tại
    echo "Không có tham số nào được truyền qua.";
}

exit();}
?>