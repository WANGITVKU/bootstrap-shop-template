<?php
// Kết nối đến cơ sở dữ liệu (Bạn cần thay đổi thông tin kết nối dựa trên cấu hình của bạn)
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "banhang";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['sortValue']) && isset($_POST['additionalData'])) {
    $sortValue = $_POST['sortValue'];
    $additionalData = $_POST['additionalData'];

    // Xử lý giá trị và dữ liệu

    // Mệnh đề ORDER BY cho câu truy vấn SQL
    $orderBy = '';
    switch ($additionalData) {
        case 'asc':
            $orderBy = 'ORDER BY price ASC';
            break;
        case 'desc':
            $orderBy = 'ORDER BY price DESC';
            break;
        case 'az':
            $orderBy = 'ORDER BY name ASC';
            break;
        case 'za':
            $orderBy = 'ORDER BY name DESC';
            break;
        case 'new':
            $orderBy = 'ORDER BY id DESC';
            break;
        case 'old':
            $orderBy = 'ORDER BY id ASC';
            break;
        default:
            // Xử lý trường hợp khác nếu cần
            break;
    }

    // Câu truy vấn SQL với mệnh đề ORDER BY
    $sql = "SELECT * FROM sanpham $orderBy";

    // Thực hiện câu truy vấn
    $result = $conn->query($sql);

    // Xử lý kết quả
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <a href="detail.php?idsp=<?php echo $row['id_sanpham']?>"> <img class="img-fluid w-100 " style="height: 405px;" src="<?php echo $row['img'] ?>" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><?php echo $row['name'] ?></h6>
                                    <div class="d-flex justify-content-center">
                                        <h6> <?php echo number_format($row['price'])."VND" ?></h6><h6 class="text-muted ml-2"><del><?php echo number_format($row['price'])."VND"  ?></del></h6>
                                    </div>
                                </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                            
                                        <a href="detail.php?idsp=<?php echo $row['id_sanpham']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                                        <a href="addcart.php?idsp=<?php echo $row['id_sanpham']?>&iddm=<?php echo $row['id_dm']?>&id_brand=<?php echo $row['id_brand']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hành</a>
                                    </div>
                                </div>
                            </div>
        <?php }
    } else {
        echo "Không có dữ liệu.";
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Không có giá trị hoặc dữ liệu được chọn.";
}
?>
