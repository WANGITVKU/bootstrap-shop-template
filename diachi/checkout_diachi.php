

    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="diachi/js/app.js"></script>
<?php
require 'diachi/connnect.php';

//Checklist
/*
    1. Chuẩn bị Có sở dữ liệu
    2. Tạo giao diện
    3. Connect Db
    4. Get Province
    5. Ajax show District
    6. Ajax show Awards
    7. Show kết quả
    */

$sql = "SELECT * FROM province";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT * from chitiet_user where email = '$email' ";
$kq1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($kq1);

?>
<div class="col-lg-8"> 
                <div class="mb-4">
              
                    <h4 class="font-weight-semi-bold mb-4">Địa chỉ thanh toán và nhận hàng</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ và tên </label>
                            <input name="name" class="form-control" type="text" placeholder="John" value="<?php echo $full_name ?>" required>
                        </div>
                       
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input name="email" class="form-control" type="email" placeholder="example@email.com " value="<?php echo $email ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input name="sdt"  class="form-control" type="tel"   placeholder="Nhập số điện thoại (10 chữ số)" value="0<?php echo $row1['sdt']?>"  pattern="[0-9]{10}" required >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input name="diachi" class="form-control" type="text" placeholder="123 Street" required>
                        </div>
                       
                        <div class="col-md-6 form-group">
                        <label for="province">Tỉnh/Thành phố</label>
                        <select id="province" name="province" class="custom-select" required>
                        <option value="">Chọn một quận/huyện</option>
                          <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                
                            ?>  
                                <option value="<?php echo $row['province_id'] ?>"><?php echo $row['name'] ?></option>
                                 
                            <?php
                            
                            }
                            ?>
                        </select>
                        </div>
                        <div class="col-md-6 form-group">
                        <label for="district">Quận/Huyện</label>
                        <select id="district" name="district" class="custom-select" required>
                            <option value="">Chọn một quận/huyện</option>
                        </select>
                        </div>
                        <div class="col-md-6 form-group">
                        <label for="wards">Phường/Xã</label>
                        <select id="wards" name="wards" class="custom-select" required>
                            <option value="">Chọn một xã</option>
                        </select>
                        </div>
                     
                    </div>
                </div>
                <div class="collapse mb-4" id="shipping-address">
                    
                </div>
            </div>
                
