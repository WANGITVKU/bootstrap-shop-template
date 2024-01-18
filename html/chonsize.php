<form id="form4" method="POST" action="addcart.php?iddm=<?php echo $row['id_dm']?>&id_brand=<?php echo $row['id_brand']?>">
                                <div class="modal fade" id="chonsize<?php echo $row['id_sanpham']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group  col-md-12">
                                                    <span class="thong-tin-thanh-toan">
                                                        <h5>Chọn size  </h5>
                                                    </span>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                    <label class="control-label">Ảnh sản phẩm</label>
                                                    <div class="form-group col-md-9" > <img class="img-fluid w-100 " style="height: 305px;" src="
                                                    <?php echo $row['img'] ?>" alt=""></div>
                                                    </div>
                                                        <div class="form-group col-md-6">
                                                        <label class="control-label">Chọn size muốn mua</label>
                                                        <div class="form-group col-md-6">
                                                                <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>

                                                            <div class="form-group col-md-3">
                                                            
                                                            <input type="hidden" name="id_sp" id="id_sp<?php echo $row['id_sanpham']?>" value="<?php echo $row['id_sanpham']?>">
                                                            <?php
                                                                                $sql2 = "SELECT * FROM so_luong WHERE id_sp = " . $row['id_sanpham'] . " AND quantity > 0 ORDER BY size ASC";
                                                                                $result2 = $conn->query($sql2);

                                                                                if ($result2->num_rows > 0) {
                                                                                    echo '<div class="">';
                                                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                                        $uniqueId = "size-" . $row['id_sanpham'] . "-" . $row2['quantity'];
                                                                                        ?>
                                                                                        <div class="form-check">
                                                                                            <input type="radio" class="form-check-input" id="<?php echo $uniqueId; ?>" name="size" value="<?php echo $row2['size']; ?>" required>
                                                                                            <label class="form-check-label" for="<?php echo $uniqueId; ?>"><?php echo $row2['size']; ?></label>
                                                                                        </div>
                                                                                        <?php
                                                                                    }
                                                                                    echo '</div>';
                                                                                }
                                                                                ?>
                                                          
                                                        </div>

                                                        </div>
                                                            </div>
                                                        <div class="form-group col-md-12">
                                                        <input class="btn btn-outline-success" type="submit"  name="form4_submit" value=" Thêm ">
                                                        <a class="btn btn-outline-danger" data-dismiss="modal" href="#">Hủy bỏ</a>
                                                            <div class="modal-footer">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>