<!DOCTYPE html>
<html lang="en">
<?php
session_start(); 
if (!isset($_SESSION['email'])) {
    header("Location: dangnhap/login.php");
    exit();
}
?>
<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->

    <link rel="icon" href="img/BR.png" type="image/jpeg">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
   
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <img src="img/logoBR.png" alt="" style="height: 150px;width: 250px; margin-top: -10px;">
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">

                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <?php include "include/iconGioHang.php" ?>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php require_once 'include/navbar.php'; ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thủ tục thanh toán</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thủ tục thanh toán
</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <form action="include/xacnhandonhang.php" method="post">
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
        <?php include "diachi/checkout_diachi.php"?>
            <div class="col-lg-4">
            
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng số đơn hàng</h4>
                    </div>  
                    <div class="card-body">
                        <table class="table table-borderless text-center mb-0">
                            <thead class="bg-secondary text-dark">
                                <tr>
                                    <th>Các sản phẩm</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                   
                                    <th>Tổng cộng</th>

                                
                                </tr>
                            </thead>
                        <?php
                            $total = 0;
                       
                         
             
                        if (empty($_SESSION['cart'])) {
                            echo "Giỏ hàng bạn trống"; // Or whatever message you want
                        } else {
                            // $item = array();
                            // var_dump($_POST);
                            foreach ($_SESSION['cart'] as $id_sanpham => $size) {
                                $item[] = $id_sanpham;
                        
                                foreach ($size as $size => $value) {
                                    // In ra thông tin từ giỏ hàng
                                    // Lặp qua số lần tương ứng với Quality để in ra thông tin từ SQL                         
                                        // echo "ID: $id_sanpham, Size: $size, Quality: $value<br>";
                                        // echo "Bạn đã chọn: " . $_POST['sizeid_' . $id_sanpham.'_'.$size]. " Nó thuộc ".$id_sanpham.'<br>' ; 
                                        // Thực hiện truy vấn SQL và in ra thông tin từ $row
                                        $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
                                        $sql = "SELECT * from sanpham where id_sanpham = $id_sanpham";
                                        $kq = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($kq)) {  
                                            
                                        $quantitySql = "SELECT quantity
                                        FROM so_luong
                                        WHERE id_sp = '$id_sanpham'AND size = '$size';";  
                                        $kqQuantity = mysqli_query($conn, $quantitySql);
                                        $quantity = mysqli_fetch_array($kqQuantity, MYSQLI_ASSOC)['quantity'];
                                            if ($value > $quantity) {
                                              echo "<script>alert('Sản phẩm này đã hết hàng. Vui lòng chọn lại số lượng qua trang cart.');</script>";
                                              echo "<script>
                                              setTimeout(function() {
                                                 window.location.href = 'cart.php';
                                              }, 2000);
                                              </script>";
                                            }             
                            ?>
                        <tbody class="align-middle">
                            <tr>
                            <input type="hidden" name="sizeid_<?php echo $id_sanpham;?>_<?php echo $size;?>" value="<?php echo $_POST['sizeid_' . $id_sanpham.'_'.$size]?>">
                                <td class="align-middle"><?php echo $row['name'] ?></td>
                                <td class="align-middle">             
                                (<?php echo $_POST['sizeid_' . $id_sanpham.'_'.$size] ?>)                           
                                </td>
                                <td class="align-middle">             
                                    <?php echo '  '. $_SESSION['cart'][$row['id_sanpham']][$size] ?>                                 
                                </td>

                                <td class="align-middle"><?php echo number_format($_SESSION['cart'][$row['id_sanpham']][$size]*$row['price'])?> VNĐ</td>
                                
                            
                            </tr>   
                            <?php 
                        
                            $total += $value * $row['price'];
                            //  
                            //  // Lặp qua từng sản phẩm trong giỏ hàng
                            //  foreach ($_SESSION['cart'] as $id_sanpham => $size) {
                            //      foreach ($size as $size => $quantity) {
                            //      // $row là thông tin về sản phẩm từ database, có thể khác nhau ở đây
                            //      // Ví dụ: $row = get_product_info_by_id($id_sanpham);       
                            //      // Tính tổng cho từng sản phẩm
                            //      $total += $quantity * $row['price'];
                            //  }
                            //  $_SESSION['cart_total'] = $total;
                            // }
                        }}  }
                        $_SESSION['cart_total'] = $total;}
                    
                            ?>
                        </tbody>
                    </table> 
                    <div class="card-body">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Tổng giá trị đơn hàng</h6>
                                <h6 class="font-weight-medium"><?php echo number_format($total)."VNĐ" ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">30,000VNĐ</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Tổng cộng</h5>
                                <h5 class="font-weight-bold"><?php echo number_format($total+30000)."VNĐ" ?></h5>
                                <input type="hidden" name="tongtien" value="<?php  echo (int)($total+30000) ?>">
                                
                            </div>  
                            <input type="submit" name="submit"  class="btn btn-block btn-primary my-3 py-3" value="Hoàn tất đặt hàng"></input>
                        </div>
                        

                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Phương thức nhận hàng</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Chuyển khoảng ngân hàng </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                       
                        </div>
                    </div>
                    </div>
                </div>                       
            </div>
        </div>
    </div>
    </form>
    </div>
    <!-- Checkout End -->


    <!-- Footer Start -->
        
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <script src="diachi/js/app.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>