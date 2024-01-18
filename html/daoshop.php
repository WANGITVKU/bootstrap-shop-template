      <?php $result2 = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY id_sanpham DESC");
        while ($rowa = mysqli_fetch_assoc($result2)){ ?>
         
               
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            
                            <a href="detail.php?idsp=<?php echo $rowa['id_sanpham']?>"> <img class="img-fluid w-100 " style="height: 405px;" src="<?php echo $rowa['img'] ?>" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $rowa['name']?></h6>
                            <div class="d-flex justify-content-center">
                                <h6><?php echo $rowa['price']?>VND</h6><h6 class="text-muted ml-2"><del><?php echo $rowa['price']?>VND</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="detail.php?idsp=<?php echo $rowa['id_sanpham']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary "></i>Xem chi tiết</a>
                        
                        
                    </div>
        </div>
          
            <?php } ?>
     
