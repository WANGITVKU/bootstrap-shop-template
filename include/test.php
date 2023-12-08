<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Demo search-AJAX</title>

  <script>
    var xmlhttp;
    function getSearch(a){
      xmlhttp=GetXmlHttpObject();
      null==xmlhttp?alert("Trình duyệt không hỗ trợ HTTP Request"):(xmlhttp.onreadystatechange=stateChanged,xmlhttp.open("GET","getData.php?key="+a,!0),xmlhttp.send(null))
    }
    function stateChanged(){
      4==xmlhttp.readyState&&(document.getElementById("result").innerHTML=xmlhttp.responseText)
    }
    adfunction GetXmlHttpObject(){
      return window.XMLHttpRequest?new XMLHttpRequest:window.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):null
    }
  </script>

</head>

<body>
  <section>
    <form>
      <section>
        <label>Keyword: </label><input type="search" name="keyword" oninput="getSearch(value);">
      </section>
    </form>
    <hr>
    <section id="result"></section>
  </section>
</body>
</html>