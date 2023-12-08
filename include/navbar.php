<div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <img src="img/logoBR.png" alt="" style="height: 150px;width: 250px; margin-top: -10px;">
                    </a>
            
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Trang Chủ</a>
                        
                            
                            <div class="nav-item dropdown">
                            <a href="home.php" class="nav-link dropdown-toggle" data-toggle="dropdown">Cửa hàng</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                   <a href="shop.php" class="dropdown-item">tất cả sản phẩm</a>
                                <?php
                                    $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
                                    $sql1 = "SELECT * from danhmuc";
                                    $kq1 = mysqli_query($conn, $sql1);

                                    while ($row1 = mysqli_fetch_array($kq1)) {
                                      
                                 
                                    ?>
                                  <a href="shop.php?iddm=<?php echo $row1['id_dm']?>" class="dropdown-item"><?php echo $row1['tendanhmuc']?></a>
                           
                                <?php  } ?>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                            <a href="shop.php?id_brand=1" class="nav-link dropdown-toggle" data-toggle="dropdown">Thương hiệu</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                <?php
                                    $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
                                    $sql1 = "SELECT * from brand";
                                    $kq1 = mysqli_query($conn, $sql1);

                                    while ($row1 = mysqli_fetch_array($kq1)) {
                                      
                                 
                                    ?>
                                  <a href="shop.php?id_brand=<?php echo $row1['id_brand']?>" class="dropdown-item"><?php echo $row1['namebrand']?></a>
                           
                                <?php  } ?>
                                </div>
                            </div>
                            <a href="shop.html" class="nav-item nav-link text-danger ">Hot Sale</a>
                            <a href="shop.html" class="nav-item nav-link text-danger ">Sự kiện-Thông báo</a>                         
                            <a href="contact.html" class="nav-item nav-link">Hổ Trợ</a>
                        </div>
                     
                        <?php
                        
                        if (isset($_SESSION["full_name"])) {
                            $full_name = $_SESSION["full_name"];
                            $email = $_SESSION["email"]; 
                            echo'
                            <div class="navbar-nav ml-auto py-0">
                            <i class="fas fa-user-secret">'.$full_name.
                             '
                             &nbsp;&nbsp;
                             <a href="dangnhap/logout.php" class="">Logout</a></i>
                            
                            </div> ';}
                            else{
                                echo '
                                <div class="navbar-nav ml-auto py-0 " id="login">
                                <a href="dangnhap/login.php" class="nav-item nav-link">Login</a>
                                <a href="dangnhap/signup.php" class="nav-item nav-link">Register</a>
                            </div>';
                            }
                        ?>
                      
                        </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/nike6.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var navLinks = document.querySelectorAll('.navbar-nav a');

        navLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                navLinks.forEach(function(link) {
                    link.classList.remove('active');
                });

                this.classList.add('active');

                console.log('Link clicked:', this.href);
                
                // Chuyển hướng đến URL thực khi click vào thẻ <a>
                window.location.href = this.href;
            });
        });

        // Kiểm tra URL và thêm lớp "active" cho thẻ <a> tương ứng
        var currentUrl = window.location.href;
        navLinks.forEach(function(link) {
            if (link.href === currentUrl) {
                link.classList.add('active');
            } else {
                link.classList.remove('active'); // Xóa "active" cho trang cũ
            }
        });
    });
</script>