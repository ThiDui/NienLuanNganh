<?php
// Start the session
session_start();
?>

<?php include('connect.php'); ?>
<?php
    if(isset($_GET['SoDonDH']) && isset($_GET['TrangThaiDH'])){
        $sodon = $_GET['SoDonDH'];
        $trangthai = $_GET['TrangThaiDH'];

        $sql="CALL Huydon('$sodon','$trangthai') ";
         $conn-> query($sql);
        header('location:donmua.php');
    }
    $conn->close();

?>