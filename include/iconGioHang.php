<div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">
                    <?php
                $ok=1;
                $soSanPhamTrongGioHang = 0;

                if(isset($_SESSION['cart']))
                foreach ($_SESSION['cart'] as $id_sanpham => $size) {
                    foreach ($size as $size => $value) {
                          $soSanPhamTrongGioHang++;
                        if(isset($value)){
                            $ok=2;}}

                    }
                
                if ($ok != 2)
                {
                echo '0';
                }
                else
                {
                
                // $items = $_SESSION['cart'];
                // echo count($items);
                echo  $soSanPhamTrongGioHang ;
                }
                ?>
                    </span>
                </a>
            </div>