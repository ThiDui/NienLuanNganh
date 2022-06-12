<?php 
session_start();
include("connect.php");
include("function.php");
?>
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
    <title>Giỏ hàng</title>
</head>
<body class = 'body'>

<?php
if(isset($_SESSION['MSKH'])){
    $makh = $_SESSION['MSKH'];
  //  echo $makh;
  
    
}
?>

<?php 
/*

    if(isset($_POST['themdc'])){
      $diachimoi=$_POST['diachi'];
              //them vao dc mới
         $sql="INSERT INTO diachikh (MaDC, DiaChi, MSKH) VALUES ('','$diachimoi','$makh')";
         $conn->query($sql);
         $conn->close();
        // header("location:dathang.php");
          }
     
  */
   
?>

    <div class= 'title-dathang'>
        <h2>TBLUE | THANH TOÁN</h2>
    </div>
    <br>
     
    <div class='container thanhtoan'>
    <h3><i class='fas fa-map-marker-alt'></i>Địa Chỉ Nhận Hàng</h3>

    <!-- them dia chi moi cho dat hang -->
    <div class = 'diachi-them'>
     <button  type='button' id="myBt"><i class='fas fa-bible'></i>Thêm Địa Chỉ</button>
    </div> 
    <!-- The Modal -->
    <div id="myMd" class="md">

        <div class="md-content">
            <span class="close">&times;</span>
            <form action='' method='POST' id='AD-form' enctype='multipart/form-data' >
                <h3>Địa chỉ giao: </h3>
                <hr>
                <textarea name="diachi" rows ="4" cols = "70" id="dc" > Nhập địa chỉ cụ thể...</textarea><br>
                <input class="themdc" type="submit" name="themdc" value="Thêm" >
            
            </form>
         </div>

    </div>
    </div>
<form action='dathang_them.php' method='POST' enctype='multipart/form-data'>
      <div class='container dc-thanhtoan'>
      <div id = 'newadr'></div>
        <?php 
        //thong tin kh
        thongtinkh();
        diachi();
                
        ?>
        
      </div>  
        <br>
        
           <?php 
          //hien thi lai san pham chon mua
           if(isset($_POST['sanpham'])){
            $sp = $_POST['sanpham'];

            echo "<div class='container thanhtoan-sanpham'>";
            echo "<table class = 'table'>
                            <tr>
                              <th>Sản Phẩm</th>
                              <th></th>
                              <th>Đơn Giá </th>
                              <th>Số lượng</th>
                              <th>Thành tiền</th>
                            </tr>";
                            $tong=0;
            foreach( $sp as $VALUE ){

                $masp = $VALUE;
               
                echo "<input type='hidden' name='masp[]' value='$masp' >";
                $sql = "SELECT * FROM giohang where MAHH = '$masp'";
                $result = $conn->query($sql);
                     if($result->num_rows>0){
                        
                          
                       
                        while($row = $result->fetch_assoc()){
                             
                           
                              $ten = $row['TENSP'];
                              $hinh = $row['HINHSP'];
                              $gia = $row['GiaSP'];
                              $soluong = $row['SOLUONG'];
                            
                              $sotien = $gia * $soluong;
                              //$tong = $sotien;
                          echo "
                                <tr>
                                  <td><img src='$hinh' alt='HTML5 Icon' style='width:150px;height:120px;'></td>
                                 <td> $ten</td>
                                  <td>$gia</td>
                                  <td>$soluong</td>
                                  <td>$sotien</td>
                                </tr> ";
                      
                        }
                        
                        
    
                         }
                         $tong+= $sotien;
           
            }
            
            echo "<table><hr>";
            
            $thanhtoan = $tong+30000;
            echo "<div class = 'thongtin-thanhtoan'>
            <input type='hidden' name='tonghd' value='$tong' >
                <p>Tổng tiền hàng:$tong (VNĐ) </p>
                <p>Tổng phí ship: 30.000 (VNĐ) </p>
                <p>Tổng thanh toán:$thanhtoan (VNĐ) </p>  
            </div>
            <hr>
            <div class = 'thongtin-thanhtoan'>
            <button type='submit' name ='muahang' class='giohang'>Mua Hàng</button>
            </div>";
            $conn->close();
            echo "</div>";
            
        }

        ?>
        
</form>   
    


<?php //  include("../view/footer.html"); ?>
<script>
// lay id
let diachiSelect = document.getElementById("diachi");
var modal = document.getElementById("myMd");

// lấy id của nút thêm dịa chỉ
var btn = document.getElementById("myBt");

// lấy class để đóng
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//AJAX them dia chi

document.getElementById("AD-form").addEventListener("submit", add_address);
function add_address(event){
  let adForm = document.getElementById("AD-form");
  let adFormData = new FormData(adForm);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        // document.getElementById("newadr").innerHTML = this.responseText;
        let response = JSON.parse(this.responseText); // chuyen qua object
        let optionSelect = `
          <option value='${response.diachi.id}'>${response.diachi.ten}</option>
        `
        diachi.innerHTML += optionSelect;
        modal.style.display ="none";
    }
  }
  xmlhttp.open("POST", "new_address.php", true);
  xmlhttp.send(adFormData);
  event.preventDefault();
}
</script>
</body>
</html>