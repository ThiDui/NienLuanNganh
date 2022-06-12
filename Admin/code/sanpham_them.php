<?php 
session_start();
?>

<?php
include('connect.php');
    


    if(isset($_POST['them'])){
     
      $maloai=$_POST['maloai'];
      $ten=$_POST['tensp'];
      $gia=$_POST['gia'];
      $soluong=$_POST['soluong'];
      $ghichu=$_POST['ghichu'];

      $sql="INSERT INTO hanghoa(MSHH, TenHH, Gia, SoLuongHang, MaLoaiHang, ghichu)
             VALUES('','$ten','$gia','$soluong','$maloai','$ghichu')";
      $conn->query($sql);

       // theo doi lich su
       $nd=$_POST['them'];
       $msnv=$_SESSION['MSNV'];
       $sql2 = "CALL lichsuNV('$ten','$nd','$msnv')";
       $conn->query($sql2);
      
      header("location:/webbanhang/Admin/index_tc.php?act=sanpham");

    }

   
    
?>

<html>
    <body>
<?php include('../view/menu.html');?>



<div class="col-sm-9 ">
                  
<div class="container">
  <h2>Thêm sản phẩm:</h2>
  <form action='' method='post' enctype='multipart/form-data'>
  
    <div class="form-group">
      <label for="text">Mã Loại:</label>
      <input type="text" class="form-control"   name='maloai' >
    </div>
    <div class="form-group">
      <label for="text">Tên sản phẩm:</label>
      <input type="text" class="form-control"   name='tensp' >
    </div>
    <div class="form-group">
      <label for="text">Giá:</label>
      <input type="text" class="form-control"   name='gia' >
    </div>
    <div class="form-group">
      <label for="text">Số lượng:</label>
      <input type='text' name='soluong' id='size' class="form-control" >
    </div>
    <div class="form-group">
      <label for="text">Ghi chú:</label>
      <textarea name="ghichu" rows ="6" cols = "45" class="form-control"  ></textarea>
    </div>
    <input type='submit' name ='them' class="btn btn-primary" value = "Thêm">
    <button type='reset' class="btn btn-primary">Reset</button>
  </form>
</div>
                    
               </div>
        </div>
      </div>
    
</body>
</html>

