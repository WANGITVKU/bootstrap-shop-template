<!DOCTYPE html>

<?php
session_start();
?>
<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->

    <link rel="icon" href="img/BR.png" type="image/jpeg">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-HJAP06mgExuH2O9VjHSTYewtPl/9PAmzYhe7wFVZ4KTzpkUZ1Bb4YZpfbqVaP5x" crossorigin="anonymous">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ Hàng của bạn</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <form action="checkout.php" method="post">
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
           
            <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-borderless text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th colspan="2">Các sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Size</th>
                                <th>Tổng cộng</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                    <?php
                    $total = 0;
                        // var_dump($_SESSION['cart']);
                      if (empty($_SESSION['cart'])) {
                          echo "Your cart is empty."; // Or whatever message you want
                      } else {
                      
                          $item = array();
                          
                          foreach ($_SESSION['cart'] as $id_sanpham => $size) {
                              $item[] = $id_sanpham;
                            
                              foreach ($size as $size => $value) {
                             
                                // In ra thông tin từ giỏ hàng
                                // echo "ID: $id_sanpham, Size: $size, Quality: $value<br>";
                                // Lặp qua số lần tương ứng với Quality để in ra thông tin từ SQL
                               
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
                                            echo "<script>
                                                alert('Sản phẩm này đã hết hàng. Vui lòng chọn lại số lượng qua trang cart.');
                                                setTimeout(function() {
                                                    window.location.href = 'cart.php?decrease_1={$row['id_sanpham']}&size1={$size}';
                                                });
                                            </script>";
                                            if(isset($_GET['decrease_1'])){   
                                                $index=$_GET['decrease_1'];
                                                $size1 = isset($_GET['size1']) ? $_GET['size1'] : '';
                                                if($_SESSION['cart'][$index][$size1]>=1){
                                                    $_SESSION['cart'][$index][$size1]= $quantity;
                                                }
                                                echo "<script>window.location='cart.php';</script>";
                                                exit; 
                                            }
                                        }
                                        
                                    
                        ?>
                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle"><?php echo $row['name'] ?></td>
                            <td class="align-middle"><img src="<?php echo $row['img'] ?>" alt="" style="width: 50px;"></td>
                            <td class="align-middle"><?php echo number_format($row['price'])  ?> VNĐ</td>
                            <td class="align-middle">
                                
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                <a href="cart.php?decrease=<?php echo $row['id_sanpham']?>&size1=<?php echo $size; ?>" class="input-group-btn"> 
                                        <i class=" btn-sm btn-primary fa fa-minus"></i>
                                  
                                </a>
                                    <input style="width: 30px;" type="text"  name=<?php 'qty['.$row['id_sanpham'].']['.$size.']' ?> class="form-control form-control-sm bg-secondary text-center" value="<?php echo $_SESSION['cart'][$row['id_sanpham']][$size] ?>">                                   
                                <a href="cart.php?increase=<?php echo $row['id_sanpham'];?>&size1=<?php echo $size; ?>" class="input-group-btn">     
                                        <i class="btn-sm btn-primary fa fa-plus"></i>
                                       
                                                                      
                                    
                                    </a>
                                </div> 
                                <?php       
                                            if(isset($_GET['delete'])){   
                                                $index=$_GET['delete'];
                                                $size1 = isset($_GET['size1']) ? $_GET['size1'] : '';
                                                unset($_SESSION['cart'][$index][$size1]);
                                                $_SESSION['cart'] = array_filter($_SESSION['cart']);
                                                    // Kiểm tra xem toàn bộ mảng 'cart' có trống không và hủy bỏ nếu có
                                                    if (empty($_SESSION['cart'])) {
                                                        unset($_SESSION['cart']);
                                                    }
                                                echo "<script>window.location='cart.php';</script>";
                                                exit; 
                                                }
                                            if(isset($_GET['increase'])){   
                                            $index=$_GET['increase'];
                                            $size1 = isset($_GET['size1']) ? $_GET['size1'] : '';
                                            if($_SESSION['cart'][$index][$size1]>=1){
                                                $_SESSION['cart'][$index][$size1]+=1;
                                            }
                                            echo "<script>window.location='cart.php';</script>";
                                            exit; 
                                            }
                                            if(isset($_GET['decrease'])){   
                                                $index=$_GET['decrease'];
                                                $size1 = isset($_GET['size1']) ? $_GET['size1'] : '';
                                                if($_SESSION['cart'][$index][$size1]>=1){
                                                    $_SESSION['cart'][$index][$size1]-=1;
                                                }
                                                echo "<script>window.location='cart.php';</script>";
                                                exit; 
                                            }
                                          
                                            ?>
                            </td>

                            <!-- xử lý chọn size -->
                            <td class="align-middle">
                            <select class="form-select " name="sizeid_<?php echo $id_sanpham;?>_<?php echo $size;?>" aria-label="Default select example" required>
                                <option class="align-middle w-100" value="<?php echo ($size == 'Chưa có') ? '' : $size; ?>" selected> <?php echo'Size '. $size ?></option>
                                    <?php 
                                     if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    $sql1 = "SELECT size FROM so_luong WHERE id_sp = $id_sanpham AND quantity > 0";
                                    $result1 = $conn->query($sql1);

                                    if ($result1->num_rows > 0) {
                                        while ($row1 = mysqli_fetch_assoc($result1)){
                                 ?>
                                 <option class="align-middle w-100" value="<?php echo $row1['size'] ?>">Size <?php echo $row1['size'] ?></option>
                                 <?php }} ?>
                                </select> </td>
                                 <!-- xử lý chọn size -->

                            <td class="align-middle"><?php echo number_format($_SESSION['cart'][$row['id_sanpham']][$size]*$row['price'])?> VNĐ</td>
                            <td class="align-middle"> <a href="cart.php?delete=<?php echo $row['id_sanpham'];?>&size1=<?php echo $size; ?>"> <i class=" btn-sm btn-primary fa fa-times"> </i> </a></td>
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
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Mã giảm giá</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tóm tắt giỏ hàng</h4>
                    </div>
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
                        </div>  
                        <input type="submit" name="submit"  class="btn btn-block btn-primary my-3 py-3" value="Tiến hành thanh toán"></input>
                    </div>
                    <a href="shop.php"class="btn btn-block btn-primary my-3 py-3" > Quay lại mua hàng  </a>
                </div>
            </div>
        </div>
        </form>
    </div>
    
    <!-- Cart End -->


    <!-- Footer Start -->
   
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <?php include "include/footer.php" ?>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

