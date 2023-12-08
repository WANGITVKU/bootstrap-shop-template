
$(document).ready(function(){
    $('#search1 input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        
        if(inputVal.length){
            $.get("include/search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                $(".result").html(data);
            });
            $.get("include/timkiem.php", {term: inputVal}).done(function(data1){
                // Display the returned data in browser
                $("#search").html(data1);
            });
        } else{
            $(".result").empty(); // Làm trống nếu không có giá trị nhập vào
            $("#search").load("include/sanpham.php");
            $(".result").empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
    $(this).closest(".search-box").find('.result').empty(); // Làm trống phần tử hiển thị kết quả
});
});
