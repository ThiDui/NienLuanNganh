<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>TBlue</title>
</head>
<body>
    <?php
    include("./code/connect.php"); 
    include('./view/header.php');?>
    <div class="slideshow">
       
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                  <div class="carousel-item active ">
                    <img src="../img/thuysinh.jpg" alt="Los Angeles" width="1522" height="590">
                    <div class="carousel-caption">
                      <h3 class="size">Hoa cảnh mini</h3>
                      <p class="size">Sản phẩm được chăm sóc, thiết kế độc đáo</p>
                    </div>   
                  </div>
                  <div class="carousel-item">
                    <img src="../img/cayvanphong.jpg" alt="Chicago" width="1522" height="590">
                    <div class="carousel-caption">
                      <h3 class="size">Cây cảnh văn phòng</h3>
                      <p class="size">Sản phẩm được chăm sóc, thiết kế độc đáo</p>
                    </div>   
                  </div>
                  <div class="carousel-item ">
                    <img src="../img/t1.jpg" alt="New York" width="1522" height="590">
                    <div class="carousel-caption">
                      <h3 class="size">Sen đá cảnh</h3>
                      <p class="size">Sản phẩm được chăm sóc, thiết kế độc đáo!</p>
                    </div>   
                  </div>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              </div>
        </div>
    </div> 
   
  <hr>
  <center><h3 id="gioithieu" class="tieude">TBlue Shop - cửa hàng chuyên cung cấp <br>các loại cây cảnh chất lượng cao</h3></center><br>
  <div class="gioithieu">
    <div class="container">
        <div class="row ">
          <div class="col-sm ">
            <h3 style="font-size: 40px;">Tại sao lại chọn chúng tôi?</h3>
            <p>TBlue Shop là một cửa hàng chuyên bán các loại cây cảnh nhỏ và vừa, ở đây chúng tôi luôn đặc biệt 
              chăm sóc từng cây cảnh một. Vói niềm đam mê và yêu thương cây cảnh TBLue Shop luôn mong muốn mang 
              đến khách hàng của mình những loại cây chất lượng nhất, thỏa mãn sở thích chăm sóc cây cảnh của khắc hàng. Mang thiên nhiên đến mọi nhà!!! </p>
          </div>
          
          <div class="col-sm "> <img src="../img/chamsoc1.jpg" alt="Los Angeles"  height="400" ></div>
          
        </div> 
        <div class="row ">
          <div  class="col-sm-5"><h3>Cam kết từ chúng tôi</h3>
          <p>Chúng tôi từ TBlue Shop cam kết cung cấp các loại cây cảnh được chăm sóc cẩn thận.<br>
             Chúng tôi ưu tiên chất lượng sản phẩm, sẽ được hoàn trả nếu gặp bất kì sai sót nào!</p></div>
          
          <div class="col-sm "><h3>TBlue Shop từ năm 2010</h3>
          <p>  TBlue Shop luôn tập trung vào một điều: Sự hài lòng của khách hàng.<br>
          Chúng tôi cung cáp sự hài lòng đó thông qua các dịch vụ chăm sóc, thông qua sự tỉ mỉ trên từng sản phẩm</p></div>
          <div class="col-sm "><h3>Châm ngôn</h3>
          <h5 style="font-style: italic; color: rgb(69, 119, 98);"> Hãy ngắm nhìn thiên nhiên bạn sẽ thấy hình ảnh tâm hồn chính mình!</h5></div>
        </div>   
      </div>
</div>

<?php include("./view/footer.html")?>
</body>
</html>