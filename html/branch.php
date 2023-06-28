<!DOCTYPE html>
<html>
<head>
    <title> Branch</title>
    <link rel="stylesheet" type="text/css" href="../css/branch.css">
    </head>
    <div class="branch">
    <h1>BRANCH</h1>
</head>
<body>
<form style="height:500px"; method="POST">
    <table>
        <tr>
            <td>
                Branch name:
</td>
<td>
    <input type="text" name="branch_name" >
</td>
</tr>
<tr>
    <td>
        Branch id:
</td>
<td>
    <input type="number" name="branch_id">
</td>
</tr>
<tr>
    <td>
        address:
</td>
<td>
    <input type="text" name="address">
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
        <input type="submit" name="submit" value="Add">
</td>
<tr>
</div>
</table>
</form>
</html>
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
    $table="select * from branch";
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
    $branch_name=$_POST['branch_name'];
    $branch_id=$_POST['branch_id'];
    $address=$_POST['address'];
    $bank_code=$_POST['bcode'];
    echo $branch_name,$branch_id,$address,$bank_code;
    // $phone=$_POST['phone'];
    // $accno=$_POST['acc_no'];
    // $accbal=$_POST['acc_bal'];

    $insertQuery="insert into branch(branch_name, branch_id, address,bcode) values ('$branch_name','$branch_id','$address','$bank_code')";
    echo $insertQuery;
    $res=mysqli_query($con,$insertQuery);
    
    if($res){
        
        ?>
        <script>
            alert("Branch Created Successfully")
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


