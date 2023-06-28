

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
 <style>
     
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
} 
    
        
</style>
  <title>search by accno</title>
</head>
  <body>
<div>
<form  method="POST">
  <input type="text" placeholder="ENTER ACCNO" name="accno"/>
  <input type="submit" placeholder="search" name="search" value="Search" />
</form>
</div>
<h2>SEARCH BY ACCOUNT_NO</h2>

<table>
    <thead>
  <tr>
    <th>name</th>
    <th>password</th>
    <th>gender</th>
    <th>email</th>
    <th>phone</th>
    <th>acc_no</th>
    <th>acc_bal</th>
    <th>account_type</th>
  </tr>
</thead>
<tbody>
<?php
include '../connection.php';


if(isset($_POST['search'])){
  
  $acc_no=$_POST['accno'];
  $selectQuery2="call `get_user_by_accno`($acc_no);";
  $query2=mysqli_query($con,$selectQuery2);
$nums2=mysqli_num_rows($query2);

if($nums2==0){
  ?>
  <script>
  alert("No Data Available");
  </script>
  <?php
}
while($res=mysqli_fetch_array($query2)){
  //echo $res['name'];
  ?>
  <tr>
  <td><?php echo $res['name'];?></td>
  <td><?php echo $res['password'];?></td>
  <td><?php echo $res['gender'];?></td>
  <td><?php echo $res['email'];?></td>
  <td><?php echo $res['phone'];?></td>
  <td><?php echo $res['acc_no'];?></td>
  <td><?php echo $res['acc_bal'];?></td>
  <td><?php echo $res['account_type'];?></td>
  <td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['id']; ?>" class="text-white"> Delete </a>  </button> </td>
  
</tr>
<?php

}


}
?>
</tbody>
</table>

</body>
</html>







