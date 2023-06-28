<!DOCTYPE html>
<html>
<head>
    <title> BANK DETAILS</title>
    <link rel="stylesheet" type="text/css" href="../css/bank.css">
    </head>
    <div class="detail">
    <h1>BANK DETAILS</h1>
</head>
<body>
<form method="POST" style="height:500px";>
    <table>
        <tr>
            <td>
                Bank name:
</td>
<td>
    <input type="text" name="bname" >
</td>
</tr>
<tr>
    <td>
        Bank code:
</td>
<td>
    <input type="number" name="bcode">
</td>
</tr>
<tr>
    <td>
        <input type="submit" name="submit" >
</td>
<tr>
</div>
</table>
</form>
</body>

<?php
include  '../connection.php';
//check if db exists
$db=mysqli_select_db($con,"bms");
if(empty($db)){
    echo "Database not Found";
    $dbcr="create database bms";
    $check=mysqli_query($con,$dbcr);
    if(!$check){
        echo "Db Creation Failed";
    }
    else{
        echo "DB Created";
    }
}
else{
    echo "Db Found";
    $table="select * from bank";
    $checktable=mysqli_query($con,$table);
    if(!$checktable){
        echo "table not present";
        $createt="create table branch(
            id int(100) NOT NULL AUTO_INCREMENT,
            name varchar (255) NOT NULL,
            password varchar (255) NOT NULL,
            gender varchar (255) NOT NULL,
            email varchar (255) NOT NULL,
            phone varchar (255) NOT NULL,
            acc_no varchar (255) NOT NULL,
            acc_bal varchar (255) NOT NULL,
            PRIMARY KEY(id)

            )";
            $ok=mysqli_query($con,$createt);
            if(!$ok){
                echo "table creation failed";
            }
            else{
                echo "table created";
            }
    }
    else{
        echo "table present";
    }
}
if(isset($_POST['submit'])){
    $bank_name=$_POST['bname'];
    // $branch_id=$_POST['branch_id'];
    // $address=$_POST['address'];
    $bank_code=$_POST['bcode'];
    echo $bank_name,$bank_code;
    // $phone=$_POST['phone'];
    // $accno=$_POST['acc_no'];
    // $accbal=$_POST['acc_bal'];

    $insertQuery="insert into bank(bname,bcode) values ('$bank_name','$bank_code')";
    echo $insertQuery;
    $res=mysqli_query($con,$insertQuery);
    
    if($res){
        
        ?>
        <script>
            alert("Bank Created Successfully")
            </script>
            <?php
    }else{
        ?>
        <script>
            alert("Something went Wrong!!")
            </script>
            <?php

    }
}

?>
