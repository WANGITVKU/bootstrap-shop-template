<?php
  session_start();
 
if (isset($_POST["form4_submit"])) {
                  $brand= $_POST['brand'];   
                  $conn = mysqli_connect("localhost:3307", "root", "", "banhang");
                  if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                  if ($brand !== '' ) {
                      $sql = "INSERT INTO brand (namebrand) VALUES ('$brand')";
                      $kq = mysqli_query($conn, $sql);
                      if ($kq) {
                          echo "
                          <div class='alert alert-success'> thêm sản phẩm thành công </div> ";
                          echo "<script>
                          setTimeout(function() {
                              window.location.href = 'form-add-san-pham.php';
                          }, 2000);
                          </script>";
                          mysqli_close($conn);
                      } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }
                  } else {
                      echo "Vui lòng điền đầy đủ thông tin sản phẩm.";
                  } 
                }
                ?>