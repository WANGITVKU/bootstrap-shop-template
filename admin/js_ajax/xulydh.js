var clickCount = 0;

function changeContent(id_donhang) {
  var element = document.getElementById("myElement" + id_donhang);
  var newContent;

  switch (clickCount) {
    case 0:
      newContent = '<button class="badge bg-success"> Đơn hàng đang được gửi đi </button>';
      break;
    case 1:
      newContent = '<button class="badge bg-primary"> Hoàn Thành </button>';
    break;
    case 2:
      newContent = '<button class="badge bg-danger"> Hủy </button>';
      break;
    case 3:
      newContent = '<button class="badge bg-info"> Chờ xử lý </button>';
      break;
    // Thêm các trường hợp khác nếu cần
    default:
      clickCount = 0;
  }

  // Lấy giá trị nội dung của thẻ <td>
  var tdContent = element.innerHTML;

  // Thay đổi nội dung của thẻ <td>
  element.innerHTML = newContent;

  // Sử dụng Ajax để gửi giá trị nội dung cũ và mới
  sendToServer(tdContent, newContent, id_donhang);

  ++clickCount;
}

function sendToServer(oldContent, newContent, id_donhang) {
  // Sử dụng Ajax để gửi dữ liệu về máy chủ
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "js_ajax/xulytinhtrang.php", true);

  // Set header cho x-www-form-urlencoded 
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Tạo đối tượng chứa dữ liệu cần gửi
  var data = "oldContent=" + encodeURIComponent(oldContent) +
             "&newContent=" + encodeURIComponent(newContent) +
             "&id_donhang=" + encodeURIComponent(id_donhang);

  // Sự kiện khi trạng thái của yêu cầu thay đổi
  xhr.onreadystatechange = function() {
    // Kiểm tra nếu yêu cầu hoàn tất và trạng thái là thành công (status 200)
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Kiểm tra nếu có dữ liệu phản hồi và in ra thông báo
      if (xhr.responseText === "success") {
        console.log("Dữ liệu đã được gửi thành công!");
        // Thêm mã thông báo hoặc thực hiện các hành động khác ở đây
      } else {
        console.log("Gửi dữ liệu không thành công. Lỗi: " + xhr.responseText);
        // Xử lý lỗi nếu cần thiết
      }
    }
  };

  // Gửi dữ liệu dưới dạng x-www-form-urlencoded
  xhr.send(data); 
}
