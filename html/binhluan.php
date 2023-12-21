<?php             if(isset($_GET['idsp'])){
                     $id = $_GET['idsp'];
                     $sql6 = "SELECT COUNT(*) as comment_count FROM binhluan WHERE id_sanpham = $id";
                    $result6 = $conn->query($sql6);
                    if ($result6->num_rows > 0) {
                        // Lấy dữ liệu từ kết quả
                        $row6 = $result6->fetch_assoc();
                        
                        // Số lượng bình luận
                        $commentCount = $row6["comment_count"];
                }}
                    ?>
                  
                        <div class="row">
                            <div class="col-md-6" >
                                <h4 class="mb-4"><?php echo $commentCount; ?> review for "<?php echo $row['name'] ?>"</h4>
                                <div id="binhluan12">
                               <?php
                                $sql3 = "SELECT * from binhluan where id_sanpham = $id";
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
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="noidung">Your Review *</label>
                                        <textarea id="noidung"   cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name  *</label>
                                        <div class="form-control"  id="name"> <?php echo $full_name ?>  </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <div class="form-control"  id="email" > <?php echo $email ?>  </div>
                                    </div>
                                    <input type="hidden" value="<?php echo $row['id_sanpham'] ?>" id="idsp">

                                    <input type="hidden" value="<?php echo $id_user ?>" id="id_user">
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Gửi" id="btnGui" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script src="js/ajax/binhluan.js"></script>