

$(document).ready(function() {
    // Xử lý sự kiện khi form được submit
    $("#btnGui").click(function(e) {
        // Ngăn chặn hành động mặc định của form
        e.preventDefault();

        // Thu thập dữ liệu từ các trường form
        var noidung = $("#noidung").val();
        var name = $("#name").text(); // Sử dụng text() để lấy nội dung của div
        var email = $("#email").text();
        var idsp = $("#idsp").val();
        var id_user = $("#id_user").val();
        // Gửi dữ liệu qua AJAX
        $.ajax({
            type: "POST",
            url: "include/binhluan.php", // Thay đổi đường dẫn đến script xử lý trên server
            data: {
                noidung: noidung,
                name: name,
                email: email,
                idsp: idsp,
                id_user: id_user
            },
            success: function(data) {
            
                // Cập nhật nội dung bình luận mà không làm tươi trang trang
                $("#binhluan12").html(data);
                console.log(data);
              },
              error: function(error) {
                console.log('Lỗi khi tải bình luận mới: ', error);
              }
            });
          });
        })
// function loadBinhLuan() {
//     $.ajax({
//         type: "GET",
//         url: "html/binhluan.php",
//         data: { idsp: idsp },
//         success: function(newContent) {
//             // Cập nhật nội dung của tab-pane-3 với nội dung mới
//             $("#tab-pane-3").html(newContent);
//             console.log(id);
//         },
//         error: function(error) {
//             console.error("Error loading binhluan.php: " + error);
//         }
//     });
// }
