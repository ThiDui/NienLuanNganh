<?php
session_start();
header('Content-Type: application/json');
include("connect.php");
?>
<?php
if(isset($_SESSION['MSKH'])){

    $makh = $_SESSION['MSKH'];
  //  echo $makh;
  $diachimoi=$_POST['diachi'];
  //them vao dc mới
  
  $failedResponse = array("status"=>"failed");
  $sql="INSERT INTO diachikh (MaDC, DiaChi, MSKH) VALUES ('','$diachimoi','$makh')";
  if( $result = $conn->query($sql) ){
    $diachi = array("id"=>$conn->insert_id, "ten"=>$diachimoi);
    $successResponse = array("status"=>"success","diachi"=>$diachi);
    // array_push($successResponse, $diachi);
    echo json_encode($successResponse);
  }
  else{
    echo json_encode($failedResponse);
  }
  $conn->close();
    
}
?>
