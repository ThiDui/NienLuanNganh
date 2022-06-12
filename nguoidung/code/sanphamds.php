
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../view/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<title>Danh sách</title>
</head>
<body>
   <?php 
   include("connect.php");
   include("../view/header.php");

   ?> 
   <div class="container">

    <div class="row">
       
       <?php

       if(isset($_GET['MaLoaiHang'])){

       
       $mal= $_GET['MaLoaiHang'];
       
         $sql = "SELECT hh.MSHH, hh.TenHH, hh.Gia, ha.TenHinh FROM loaihanghoa l join hanghoa hh on hh.MaLoaiHang=l.MaLoaiHang
                  JOIN hinhhanghoa ha on ha.MSHH=hh.MSHH
                  WHERE l.MaLoaiHang='".$mal."'";
         $result = $conn->query($sql);
      }

            if(isset($_GET['timkiem'])){
               $q= $_GET['tukhoa'];
               //echo $q;
               $sql = "SELECT hh.MSHH, hh.TenHH, hh.Gia, ha.TenHinh FROM hanghoa hh 
                        JOIN hinhhanghoa ha on ha.MSHH=hh.MSHH
                        WHERE TenHH LIKE '%$q%'";
               $result = $conn->query($sql);
             }
         
         //xu ly ket qua 
         if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
               $mshh= $row['MSHH'];
               $tenhh = $row['TenHH'];
               $gia = $row['Gia'];
				   $hinh = $row['TenHinh'];
               echo "<div class='padding'><div class='ksp'><a href='chitietsp.php?MSHH=$mshh'>
                     <img src='$hinh' alt='HTML5 Icon' style='width:300px;height:350px;'></a>
                     <br>$tenhh <br><p>$gia (VNĐ)</p></div> </div>  ";
            }
         }
       ?>
       
         
    </div>  
  </div>
  <?php   include("../view/footer.html"); ?>

</body>
</html>