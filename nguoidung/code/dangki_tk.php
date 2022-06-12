<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include("connect.php");
        
        
        if(isset($_POST['them'])){
            $user=$_POST['user'];
            $tenkh=$_POST['firstname'];
            $pass=$_POST['password'];
            $tenct=$_POST['congty'];
            $sdt=$_POST['sdt'];
            $fax=$_POST['fax'];
            $diachi=$_POST['diachi'];
            $mk=md5($pass);

        

            $sql = "INSERT INTO taikhoan(TK_Ma, TK_TenDangNhap, PASSWORD) VALUES ('','$user','$mk')";
            if($conn->query($sql)==true){
                //lay id mới them
		        $last_id = $conn->insert_id;
                $sql1="INSERT INTO khachhang(MSKH,TK_Ma, HoTenKH, TenCongTy, SoDienThoai, SoFax) 
                            VALUES ('','$last_id','$tenkh','$tenct','$sdt','$fax')";
                         //   $conn->query($sql1);
                           
               if($conn->query($sql1)==true){

                    //lay id mới them
                    $last_id1 = $conn->insert_id;
                    $sql2="INSERT INTO diachikh (MaDC, DiaChi, MSKH) VALUES ('','$diachi','$last_id1')";
			        $conn->query($sql2);

                   // $conn->close();
                }else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
              
        $conn->close();
        header("location:dangnhap_tk.php");
        }
        include("../view/dangki.html"); 
    ?>
    
</body>
</html>