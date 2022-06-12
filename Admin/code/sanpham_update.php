<?php 
session_start();
?>

<?php
include('connect.php');
    if(isset($_GET['MSHH'])){
        $ma1 = $_GET['MSHH'];
    }


    if(isset($_POST['sua'])){
      $masp=$_POST['masp'];
      $maloai=$_POST['maloai'];
      $ten=$_POST['tensp'];
      $gia=$_POST['gia'];
      $soluong=$_POST['soluong'];
      $ghichu=$_POST['ghichu'];

      $sql1= "UPDATE hanghoa SET MSHH='".$masp."',TenHH ='".$ten."',
      Gia='".$gia."',SoLuongHang='".$soluong."',MaLoaiHang='".$maloai."',GhiChu='".$ghichu."' WHERE MSHH = '".$ma1."'";
      $result1 =$conn->query($sql1);

      // theo doi lich su
      $nd=$_POST['sua'];
      $msnv=$_SESSION['MSNV'];
      $sql2 = "CALL lichsuNV('sản phẩm ($masp)','$nd','$msnv')";
      $conn->query($sql2);

      header("location:/webbanhang/Admin/index_tc.php?act=sanpham");

    }

   
    
?>

<?php
//lay thong tin san pham ra
    $sql = "SELECT * FROM HANGHOA where MSHH= '".$ma1."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $ma = $row['MSHH'];
    $maloai = $row['MaLoaiHang'];
    $ten = $row['TenHH'];
    $gia = $row['Gia'];
    $soluong = $row['SoLuongHang'];
    $ghichu = $row['GhiChu'];

?>

<html>
    <body>
<?php include('../view/menu.html');?>



<div class="col-sm-9 ">
                  
<div class="container">
  <h2>Update sản phẩm:</h2>
  <form action='' method='post' enctype='multipart/form-data'>
  <div class="form-group">
      <label for="text">Mã sản phẩm:</label>
      <input type="text" class="form-control"   name='masp' value ="<?php echo $ma; ?>">
    </div>
    <div class="form-group">
      <label for="text">Mã Loại:</label>
      <input type="text" class="form-control"   name='maloai' value ="<?php echo $maloai; ?>">
    </div>
    <div class="form-group">
      <label for="text">Tên sản phẩm:</label>
      <input type="text" class="form-control"   name='tensp' value ="<?php echo $ten; ?>">
    </div>
    <div class="form-group">
      <label for="text">Giá:</label>
      <input type="text" class="form-control"   name='gia' value ="<?php echo $gia; ?>">
    </div>
    <div class="form-group">
      <label for="text">Số lượng:</label>
      <input type='text' name='soluong' id='size' value= "<?php echo $soluong; ?>" class="form-control" >
    </div>
    <div class="form-group">
      <label for="text">Ghi chú:</label>
      <textarea name="ghichu" rows ="6" cols = "45" class="form-control"  ><?php echo $ghichu; ?></textarea>
    </div>
    <input type='submit' name ='sua' class="btn btn-primary" value = "UPDATE">
    <button type='reset' class="btn btn-primary">Reset</button>
  </form>
</div>
                    
               </div>
        </div>
      </div>
    
</body>
</html>

