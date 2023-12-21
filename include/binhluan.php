<?php
session_start();
if(isset($_POST['noidung'])){
    $noidung = $_POST['noidung'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $idsp = $_POST['idsp'];
    $id_user=$_POST['id_user'];
    $currentDateTime = date('Y-m-d H:i:s');
    $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
    $sql = "INSERT INTO binhluan (id_sanpham, id_user , noidung ,time ) VALUES ( $idsp, $id_user, '$noidung', '$currentDateTime')";

    if ($conn->query($sql) === TRUE) {
        $sql3 = "SELECT * from binhluan where id_sanpham = $idsp";
            $kq3 = mysqli_query($conn, $sql3);
            while ($row3 = mysqli_fetch_assoc($kq3)){
            $sql4 = "SELECT * from chitiet_user where id_user = {$row3['id_user']}";
            $kq4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_array($kq4);
            ?>
            
            <div class="media mb-4" >
                <img src="<?php echo $row4['img']?>" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                <div class="media-body">
                    <h6><?php echo $row4['full_name']  ?><small> - <i><?php echo $row3['time']  ?></i></small></h6>
                    <div class="text-primary mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p><?php echo $row3['noidung']  ?></i></p>
                </div>
            </div>
            <?php } ?>
     
        
   <?php } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

}
?>