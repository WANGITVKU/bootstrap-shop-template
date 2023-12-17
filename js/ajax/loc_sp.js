
    // Bắt sự kiện khi chọn một giá trị từ dropdown
    $('.loc').click(function(e) {
        e.preventDefault();

        // Lấy giá trị và dữ liệu từ mục đã chọn
        var selectedValue = $(this).text();
        var additionalData = $(this).data('additional');

        // Gửi giá trị và dữ liệu đến server bằng AJAX
        $.ajax({
            type: 'POST',
            url: 'include/loc_sp.php',
            data: {
                sortValue: selectedValue,
                additionalData: additionalData
            },
            success: function(response) {
                // Cập nhật nội dung của phần tử có id là 'search'
                $('#search').html(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
