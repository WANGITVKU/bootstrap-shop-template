
<?php               
        // Include file database.php
                        include 'include/database.php';

                        // Gọi hàm fetchDataUsingMySQLi
                        $products = fetchDataUsingMySQLi();

                        // Bây giờ bạn có thể sử dụng dữ liệu được trả về từ hàm fetchDataUsingMySQLi ở đây.
                        // Ví dụ:
                        foreach ($products as $product) {

                            // Xử lý dữ liệu sản phẩm
                        
                        ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="detail.php?idsp=<?php echo $product['id_sanpham']?>"> <img class="img-fluid w-100 " style="height: 405px;" src="<?php echo $product['img'] ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $product['name'] ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6> <?php echo number_format($product['price'])."VND" ?></h6><h6 class="text-muted ml-2"><del><?php echo number_format($product['price'])."VND"  ?></del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                    
                                <a href="detail.php?idsp=<?php echo $product['id_sanpham']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                                <a href="addcart.php?idsp=<?php echo $product['id_sanpham']?>&iddm=<?php echo $product['id_dm']?>&id_brand=<?php echo $product['id_brand']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hành</a>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    
                   
            
    <!-- Shop End -->