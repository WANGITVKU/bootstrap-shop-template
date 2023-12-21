
<header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="../dangnhap/logout.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../<?php echo $_SESSION['img_user'] ?>" width="50px"
      alt="User Image">
    <div>
      <p class="app-sidebar__user-name"><b></b></p>
      <p class="app-sidebar__user-designation"></p>
    </div>
  </div>
  <hr>
  <ul class="app-menu">
 
    <li><a class="app-menu__item active" href="profile.php"><i class='app-menu__icon bx bx-user-voice'></i><span
          class="app-menu__label">Thông Tin Cá Nhân</span></a></li>
    <li><a class="app-menu__item " href="donhang_user.php"><i
          class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Đơn Hàng Của Tôi</span></a>
    </li>
    <li><a class="app-menu__item" href="binhluan_user.php"><i class='app-menu__icon bx bx-task'></i><span
          class="app-menu__label">Quản lý bình luận</span></a></li>
         
  
    <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label"> Phản hồi với nhà sản xuất</span></a></li>
  </ul>
</aside>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      var navLinks = document.querySelectorAll('.app-sidebar a');

      navLinks.forEach(function(link) {
          link.addEventListener('click', function(event) {
              event.preventDefault();

              navLinks.forEach(function(link) {
                  link.classList.remove('active');
              });

              this.classList.add('active');

              console.log('Link clicked:', this.href);
              
              // Chuyển hướng đến URL thực khi click vào thẻ <a>
              window.location.href = this.href;
          });
      });

      // Kiểm tra URL và thêm lớp "active" cho thẻ <a> tương ứng
      var currentUrl = window.location.href;
      navLinks.forEach(function(link) {
          if (link.href === currentUrl) {
              link.classList.add('active');
          } else {
              link.classList.remove('active'); // Xóa "active" cho trang cũ
          }
      });
  });
</script>