<?php
                    session_start()
?>
<!DOCTYPE html>
<html lang="en">

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết sản phẩm</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Sản Phẩm</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Chi tiết sản phẩm</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
                <?php
            if (isset($_GET['idsp'])) {
                $id = $_GET['idsp'];
                $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
                $sql = "SELECT * from sanpham where id_sanpham = $id";
                $kq = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($kq);
                $sql6 = "SELECT COUNT(*) as comment_count FROM binhluan WHERE id_sanpham = $id";
                $result6 = $conn->query($sql6);
                $quantitySql = "SELECT quantity
                FROM sanpham
                WHERE id_sanpham = '$id';";  
                $kqQuantity = mysqli_query($conn, $quantitySql);
                $quantity = mysqli_fetch_array($kqQuantity, MYSQLI_ASSOC)['quantity'];
               
                if ($result6->num_rows > 0) {
                    // Lấy dữ liệu từ kết quả
                    $row6 = $result6->fetch_assoc();
                    
                    // Số lượng bình luận
                    $commentCount = $row6["comment_count"];
                }
                $decodedContent = html_entity_decode($row['mo_ta']);
            } else {
                // Xử lý trường hợp 'idsp' không được đặt trong chuỗi truy vấn URL
                echo "Thiếu tham số 'idsp' trong URL.";
            }

                // Xử lý dữ liệu sản phẩm
            
            ?>
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="<?php echo $row['img'] ?>" alt="Image">
                        </div>
                        <!-- <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-2.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-3.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-4.jpg" alt="Image">
                        </div> -->
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?php echo $row['name'] ?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="far fa-star"></small>
              
                    </div>
                    <small class="pt-1">(<?php echo  $commentCount ?> Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4"><?php echo number_format($row['price']) ?></h3>
                <p class="mb-4"><?php echo $decodedContent; ?></p>
                <form  method="post" action="include/muangay.php?idsp=<?php echo $row['id_sanpham']?>">
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <?php
                    if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $productId = $row['id_dm']; // ID của sản phẩm bạn muốn lấy dữ liệu

                        $sql1 = "SELECT size FROM danhmuc WHERE id_dm = $productId";
                        $result = $conn->query($sql1);

                        if ($result->num_rows > 0) {
                            $row1 = $result->fetch_assoc();
                            $data = $row1['size'];
                        
                            // Tách dữ liệu thành mảng
                            $dataArray = explode(', ', $data);
                            foreach ($dataArray as $value) {
                        ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-<?php echo $value;?>" name="size" value="<?php echo $value; ?>" required  >
                                    <!-- Đặt giá trị cho 'value' để có thể lấy giá trị này khi gửi biểu mẫu -->
                                    <label class="custom-control-label" for="size-<?php echo $value; ?>"><?php echo $value; ?></label>
                                </div>
                        <?php
                            }
                        } else {
                            echo "Không tìm thấy dữ liệu.";
                        }
                       
                        ?>

                </div>
                <div class="d-flex mb-3"> 
                    Số lượng sản phẩm còn lại : <?php echo $quantity ?>
                </div>
               
              
                    <!--                                                          ---->
                    <a href="addcart.php?idsp=<?php echo $row['id_sanpham']?>&iddm=<?php echo $row['id_dm']?>&id_brand=<?php echo $row['id_brand']?>" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng </a>
                    &ensp;
                   
                    <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Mua ngay</button>
                            
                    </form>
                    <!----                                                     ------>  
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
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
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Miêu tả sản phẩm</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews <?php
                     echo $commentCount ?></a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                    
                </div>
                <div class="tab-content" >
                    <div class="tab-pane fade show active" style="background-color: white" id="tab-pane-1">
                    <p class="mb-4"><?php echo $decodedContent; ?></p>
                    </div>
                    
                    <div class="tab-pane fade" id="tab-pane-3" style="background-color: white">
                    <?php require_once 'html/binhluan.php'; ?>       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">

                <?php include "html/daoshop.php"?>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Footer Start -->
    <?php include "include/footer.php"?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>