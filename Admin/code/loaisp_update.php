<?php 
session_start();
?>

<?php
include('connect.php');
    if(isset($_GET['MaLoaiHang'])){
        $maloai = $_GET['MaLoaiHang'];
        $tenloai = $_GET['TenLoaiHang'];
    
    }


    if(isset($_POST['sua'])){
      $maloai1=$_POST['maloai'];
      $tenloai1=$_POST['tenloai'];

      $sql1= "UPDATE loaihanghoa SET MaLoaiHang='".$maloai1."',TenLoaiHang='".$tenloai1."' WHERE MaLoaiHang = '".$maloai."'";
      $result1 =$conn->query($sql1);

       // theo doi lich su
       $nd=$_POST['sua'];
       $msnv=$_SESSION['MSNV'];
       $sql2 = "CALL lichsuNV('mã loai sản phẩm ($maloai)','$nd','$msnv')";
       $conn->query($sql2);
 

      header("location:/webbanhang/Admin/index_tc.php?act=loaisp");

    }

   
    
?>
<html>
    <body>
<?php include('../view/menu.html');?>



<div class="col-sm-9 ">
                  
<div class="container">
  <h2>Update loại sản phẩm:</h2>
  <form action='' method='post' enctype='multipart/form-data'>
    <div class="form-group">
      <label for="text">Mã Loại:</label>
      <input type="text" class="form-control"   name='maloai' value ="<?php echo $maloai; ?>">
    </div>
    <div class="form-group">
      <label for="text">Tên loại:</label>
      <input type='text' name='tenloai' id='size' value= "<?php echo $tenloai; ?>" class="form-control" >
    </div>
    <input type='submit' name ='sua' class="btn btn-primary" value = 'UPDATE'>
    <button type='reset' class="btn btn-primary">Reset</button>
  </form>
</div>
                    
               </div>
        </div>
      </div>
    
</body>
</html>

