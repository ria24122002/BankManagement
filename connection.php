<?php
$username="root";
$password="";
$server="localhost";
$db="bms";
$con=mysqli_connect($server,$username,$password,$db);
if($con){
    // echo "connection succesful";
    ?>
    <script>
        alert("connection succesfull");
        </script>
        <?php
}
else{
    echo "fail";
}
?>
