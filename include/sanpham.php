       
        <?php
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        if (isset($_GET['id_brand']) || isset($_GET['iddm'])) {
        
            $conn = mysqli_connect('localhost:3307', 'root', '','banhang');
            // BƯỚC 2: TÌM TỔNG SỐ RECORDS
            $result = mysqli_query($conn, 'select count(id_sanpham) as total from sanpham');
            $row = mysqli_fetch_assoc($result);
            $total_records = $row['total'];
            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 5;
            // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ STARTsss
            // tổng số trang
            $total_page = ceil($total_records / $limit);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
            $current_page = $total_page;
            }
            else if ($current_page < 1){
            $current_page = 2;
            }
            // Tìm Start
            $start = ($current_page - 1) * $limit;
    
            $sql1 = "SELECT * from sanpham where id_sanpham =1+$start";
            $kq1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($kq1);

            if (isset($_GET['id_brand']) ){
            $id_brand = $_GET['id_brand'];
            $id_dm = '';
            $linkpage='&id_brand='.$row1['id_brand'];
            }
            elseif( isset($_GET['iddm'])){
            $id_dm = $_GET['iddm'];
            $id_brand ='';
            $linkpage='&iddm='.$row1['id_dm'];
            }
            else{ echo ' ko có gia trị nào';}
            
            
            $result1 = mysqli_query($conn, "SELECT * FROM sanpham WHERE id_brand='$id_brand' OR id_dm='$id_dm' AND quantity > 0 LIMIT $start, $limit");
        
         
        
         // PHẦN HIỂN THỊ TIN TỨC
         // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
         while ($row = mysqli_fetch_assoc($result1)){
             ?>
         
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
                                 <a data-toggle="modal" data-target="#chonsize<?php echo $row['id_sanpham']?>" class="btn btn-sm text-dark p-0">
                                    <i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng
                                </a>
                                <?php include "html/chonsize.php" ;?>
                             </div>
                         </div>
                     </div>
                     <?php } ?>
                                <div class="col-12 pb-1">
                                <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center mb-3">
                                
                                <li class="page-item ">
                                    <?php

                                // PHẦN HIỂN THỊ PHÂN TRANG
                                // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                        if($current_page > 1 && $total_page > 1) {                   
                                        echo  '<a class="page-link" href="shop.php?page=' . ($current_page - 1) . $linkpage. '"aria-label="Previous">';
                                        echo '<span aria-hidden="true">&laquo;</span>';
                                        echo '<span class="sr-only">Previous</span>';
                                        }?>

                                    </a>
                                    </li>
                                    <?php
                                for ($i = 1; $i <= $total_page; $i++){
                                    echo '<li class="';
                                    // Nếu là trang hiện tại, thêm class active
                                    echo ($current_page == $i) ? 'page-item active' : 'page-item';
                                    echo '"><a class="page-link" href="shop.php?page='.$i.$linkpage.'">'.$i.'</a></li>';
                                }
                                    ?>
                                
                                    <li class="page-item">
                                    <?php if ($current_page < $total_page && $total_page > 1){
                                    echo '<a class="page-link" href="shop.php?page='.($current_page+1).$linkpage.'" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>';}
                                        ?>
                                    </a>
                                    </li>
                                </ul>
                                </nav>
                                </div>      
                <?php 
                }
                else
                {   
                    $conn = mysqli_connect('localhost:3307', 'root', '','banhang');
                        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                        $result = mysqli_query($conn, 'select count(id_sanpham) as total from sanpham');
                        $row = mysqli_fetch_assoc($result);
                        $total_records = $row['total'];
                        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 9;
                        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                        // tổng số trang
                        $total_page = ceil($total_records / $limit);
                        // Giới hạn current_page trong khoảng 1 đến total_page
                        if ($current_page > $total_page){
                        $current_page = $total_page;
                        }
                        else if ($current_page < 1){
                        $current_page = 2;
                        }
                        // Tìm Start
                        $start = ($current_page - 1) * $limit;

                        $sql1 = "SELECT * from sanpham where id_sanpham =1+$start";
                        $kq1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_array($kq1);

                    
                        $result1 = mysqli_query($conn, "SELECT * FROM sanpham where quantity > 1 LIMIT $start, $limit");
                    
                        
                    
                        // PHẦN HIỂN THỊ TIN TỨC
                        // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
                        while ($row = mysqli_fetch_assoc($result1)){
                            ?>
                        
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
                                                <a data-toggle="modal" data-target="#chonsize<?php echo $row['id_sanpham']?>" class="btn btn-sm text-dark p-0">
                                                <i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng
                                            </a>
                                            <?php include "html/chonsize.php" ;?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                    <?php } ?>
                                            <div class="col-12 pb-1">
                                            <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-center mb-3">
                                            
                                            <li class="page-item ">
                                                <?php

                                            // PHẦN HIỂN THỊ PHÂN TRANG
                                            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                                            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                                    if($current_page > 1 && $total_page > 1) {                   
                                                    echo  '<a class="page-link" href="shop.php?page=' . ($current_page - 1) . '"aria-label="Previous">';
                                                    echo '<span aria-hidden="true">&laquo;</span>';
                                                    echo '<span class="sr-only">Previous</span>';
                                                    }?>

                                                </a>
                                                </li>
                                                <?php
                                            for ($i = 1; $i <= $total_page; $i++){
                                                echo '<li class="';
                                                // Nếu là trang hiện tại, thêm class active
                                                echo ($current_page == $i) ? 'page-item active' : 'page-item';
                                                echo '"><a class="page-link" href="shop.php?page='.$i.'">'.$i.'</a></li>';
                                            }
                                                ?>
                                            
                                                <li class="page-item">
                                                <?php if ($current_page < $total_page && $total_page > 1){
                                                echo '<a class="page-link" href="shop.php?page='.($current_page+1).'" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>';}
                                                    ?>
                                                </a>
                                                </li>
                                            </ul>
                                            </nav>
                                            </div> <?php
                }
                ?>

                    <!-- </form> -->

                                    
                                
                <!-- Shop End -->