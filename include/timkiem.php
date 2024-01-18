<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost:3307", "root", "", "banhang");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM sanpham WHERE name LIKE ? AND quantity > 0 ; ";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = '%'. $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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
                                <?php include "../html/chonsize.php" ;?>
                                    </div>
                                </div>
                            </div>
                            <?php }
                
            } else{
                echo "<a>No matches found</a>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
else
echo 'ko tim dc tai lieu;';
 
// close connection
mysqli_close($conn);
?>