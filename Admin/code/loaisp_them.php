<?php 
session_start();
?>

<?php
include('connect.php');

    if(isset($_POST['them'])){
      $maloai=$_POST['maloai'];
      $tenloai=$_POST['tenloai'];

      $sql= "INSERT loaihanghoa(MaLoaiHang,TenLoaiHang) VALUES('$maloai','$tenloai')";
      $result =$conn->query($sql);

       // theo doi lich su
       $nd=$_POST['them'];
       $msnv=$_SESSION['MSNV'];
       $sql2 = "CALL lichsuNV('mã loại sản phẩm ($maloai)','$nd','$msnv')";
       $conn->query($sql2);
 

      header("location:/webbanhang/Admin/index_tc.php?act=loaisp");

    }

   
    
?>
<html>
    <body>
<?php include('../view/menu.html');?>



<div class="col-sm-9 ">
                  
<div class="container">
  <h2>Thêm loại sản phẩm:</h2>
  <form action='' method='post' enctype='multipart/form-data'>
    <div class="form-group">
      <label for="text">Mã Loại:</label>
      <input type="text" class="form-control"   name='maloai'>
    </div>
    <div class="form-group">
      <label for="text">Tên loại:</label>
      <input type='text' name='tenloai' id='size' class="form-control" >
    </div>
    <input type='submit' name ='them' class="btn btn-primary" value ='INSERT'>
    <button type='reset' class="btn btn-primary">Reset</button>
  </form>
</div>
                    
               </div>
        </div>
      </div>
    
</body>
</html>

