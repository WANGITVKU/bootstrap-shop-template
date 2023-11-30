var clickCount = 0;

function changeContent(id_donhang) {
  var element = document.getElementById("myElement"+id_donhang);
  
  switch (clickCount) {
    case 0:
      element.innerHTML = '<span class="badge bg-success"> Đơn hàng đã được gửi đi </span>';
      break;
    case 1:
    element.innerHTML = '<span class="badge bg-danger">Hủy</span>';
      break;
    case 2:
    element.innerHTML = '<span class="badge bg-primary"> Hoàn Thành </span>';
      break;
    case 3:
    element.innerHTML = '<span class="badge bg-info"> Chờ xử lý </span>';
      break;
    // Thêm các trường hợp khác nếu cần
    default:
    clickCount = -1;
  }

  ++clickCount;
}
