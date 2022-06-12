<?php 
session_start();
?>

<?php
include('connect.php');

    if(isset($_POST['them'])){
        $mahinh=$_POST['ma'];

        $mshh=$_POST['mahang'];
  
          $duongdan="/webbanhang/img".$_FILES['myfile']['name'];
  
        $sql="INSERT INTO hinhhanghoa(MaHinh,TenHinh,MSHH) VALUES('$mahinh','$duongdan','$mshh')";
        $conn->query($sql);
        move_uploaded_file($_FILES['myfile']['tmp_name'],$duongdan);

       // theo doi lich su
       $nd=$_POST['them'];
       $msnv=$_SESSION['MSNV'];
       $sql2 = "CALL lichsuNV('hình ảnh sản phẩm ($masp)','$nd','$msnv')";
       $conn->query($sql2);

      header("location:/webbanhang/Admin/index_tc.php?act=sanpham_img");

    }

   
    
?>
<html>
    <body>
<?php include('../view/menu.html');?>



<div class="col-sm-9 ">
                  
<div class="container">
  <h2>Thêm hình ảnh sản phẩm:</h2>
  <form action='' method='post' enctype='multipart/form-data'>
    <div class="form-group">
      <label for="text">Mã Hình:</label>
      <input type="text" class="form-control"   name='ma'>
    </div>
    <div class="form-group">
      <label for="myfile">Tên Hình:</label>
      <input type='file' name='myfile' id='size' class="form-control" >
    </div>
    <div class="form-group">
      <label for="text">Mã Hàng:</label>
      <input type="text" class="form-control"   name='mahang'>
    </div>
    <input type='submit' name ='them' class="btn btn-primary" value = "INSERT">
    <button type='reset' class="btn btn-primary">Reset</button>
  </form>
</div>
                    
               </div>
        </div>
      </div>
    
</body>
</html>

