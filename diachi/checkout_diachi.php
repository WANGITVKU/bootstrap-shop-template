

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
$result = mysqli_query($conn, $sql);?>
<div class="col-lg-8"> 
                <div class="mb-4">
              
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input name="name" class="form-control" type="text" placeholder="John" value="<?php echo $full_name ?>" required>
                        </div>
                       
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input name="email" class="form-control" type="email" placeholder="example@email.com " value="<?php echo $email ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input name="sdt"  class="form-control" type="tel"   placeholder="Nhập số điện thoại (10 chữ số)"  pattern="[0-9]{10}" required >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input name="diachi" class="form-control" type="text" placeholder="123 Street" required>
                        </div>
                       
                        <div class="col-md-6 form-group">
                        <label for="province">Tỉnh/Thành phố</label>
                        <select id="province" name="province" class="custom-select" require>
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
                        <select id="district" name="district" class="custom-select" require>
                            <option value="">Chọn một quận/huyện</option>
                        </select>
                        </div>
                        <div class="col-md-6 form-group">
                        <label for="wards">Phường/Xã</label>
                        <select id="wards" name="wards" class="custom-select">
                            <option value="">Chọn một xã</option>
                        </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>
                     
                    </div>
                </div>
                <div class="collapse mb-4" id="shipping-address">
                    
                </div>
            </div>
                
