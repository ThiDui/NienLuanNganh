
<html>
 <head>
 <link rel="stylesheet" href="/webbanhang/Admin/view/style.css">
 </head>
<body> 
              <?php include('./view/menu.html');?>
              <div class="col-sm-9 ">
                  <?php
                  if(isset($_GET['act'])){

                 
                  switch ($_GET['act']) {
                    case 'sanpham':
                      include('./code/sanpham.php');
                      break;

                    case 'loaisp':
                      include('./code/loaisp.php');
                      break;

                    case 'sanpham_img':
                      include('./code/sanpham_img.php');
                      break;

                    case 'nhanvien':
                      include('./code/nhanvien.php');
                      break; 
                      
                    case 'lichsu':
                      include('./code/lichsu.php');
                      break;   

                    default:
                    include('./code/donhang.php');
                      break;
                  }
                }else{
                  include('./code/donhang.php');
                }
                  ?>
                   <?php // include('./code/loaisp.php');?>
                    
               </div>
        </div>
      </div>
    
</body>
</html>