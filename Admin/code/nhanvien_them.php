<?php 
session_start();
?>

<?php
include('connect.php');
?>

<html>
    <body>
<?php include('../view/menu.html');?>
<?php
if(isset($_POST['them'])){
            $user=$_POST['tentk'];
            $tennv=$_POST['tennv'];
            $pass=$_POST['password'];
            $diachi=$_POST['diachi'];
            $sdt=$_POST['sdt'];
            $chucvu=$_POST['chucvu'];
            
            $mk=md5($pass);

        

            $sql = "INSERT INTO taikhoan(TK_Ma, TK_TenDangNhap, PASSWORD) VALUES ('','$user','$mk')";
            if($conn->query($sql)==true){
                //lay id mới them
		        $last_id = $conn->insert_id;
                $sql1="INSERT INTO nhanvien(MSNV,TK_Ma, HoTenNV, ChucVu, DiaChi, SoDienThoai) 
                            VALUES ('','$last_id','$tennv','$chucvu','$diachi','$sdt')";
              $conn->query($sql1);
                
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
              
        $conn->close();
        header("location:/webbanhang/Admin/index_tc.php?act=nhanvien");
        }
?>


<div class="col-sm-9 ">
                  
<div class="container">
  <h2>Thêm tài khoản nhân viên:</h2>
  <form action='' method='post' enctype='multipart/form-data'>
  
    <div class="form-group">
      <label for="text">Tên tài khoản:</label>
      <input type="text" class="form-control"   name='tentk' >
    </div>
    <div class="form-group">
      <label for="text">Tên nhân viên:</label>
      <input type="text" class="form-control"   name='tennv' >
    </div>
    <div class="form-group">
      <label for="text">Mật khẩu:</label>
      <input type="password"  class="form-control" id="pass" name="password">
    </div>
    <div class="form-group">
      <label for="text">Gõ lại mật khẩu:</label>
      <input type="password"  class="form-control"  id="pass-confirm"name="password">
    </div>
    <div class="form-group">
      <label for="text">Địa chỉ:</label>
      <textarea name="diachi" rows ="2" cols = "45" id="dc" class="form-control"> </textarea>  
    </div>
    <div class="form-group">
      <label for="text">Số điện thoại:</label>
      <input type="text" name="sdt" id="sdt" class="form-control"  >
    </div>
    <div class="form-group">
      <input type="radio" id="nhanvien" name="chucvu" value="Nhân viên" >
      <label for="nhanvien">Nhân viên</label><br>
      <input type="radio" id="Quanly" name="chucvu" value="Quản lý" >
      <label for="quanly">Quản lý</label><br>
    </div>
    <button type='submit' name ='them' class="btn btn-primary">Thêm</button>
    <button type='reset' class="btn btn-primary">Reset</button>
  </form>
</div>
               
</div>
        </div>
      </div>           
    
    
</body>
</html>

