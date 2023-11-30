
<?php
if (isset($_POST['add_sale'])) {
    $province_id=$_POST['province'];
    $district_id = $_POST['district'];
    $wards_id = $_POST['wards'];
    echo "<pre>";
        $conn = mysqli_connect("localhost:3307", "root", "", "login_register");
        $sql = "SELECT name FROM province WHERE province_id = $province_id";
        $kq = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($kq);
        echo $row['name'];
    echo "<pre>";
        $sql1 = "SELECT name FROM district WHERE district_id = $district_id";
        $kq1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($kq1);
        echo $row1['name'];

    echo "<pre>";
        $sql2 = "SELECT name FROM wards WHERE wards_id = $wards_id";
        $kq2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($kq2);
        $_POST['province_name'] =$row2['name'];
        // echo $_POST['province_name'];
}
?>