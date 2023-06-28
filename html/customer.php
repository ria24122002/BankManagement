
<!-- create table -->
<!DOCTYPE html>
<html>
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
  background-color: pink;
}
</style>
</head>
<body>
  <div>
<button style="float:right; width:200px; height:30px; background:pink;"onclick="window.location.href='./searchByAccNo.php'">search_by_accno</button>
<button  style="float:right; width:250px; height:30px;margin-left:250px;background:pink;" onclick="window.location.href='./min_amount.php'">MINIMUM_ACC_BALANCE</button>
</div>
<h2>Customer Table</h2>

<table style='background:#808080;'>
    <thead style='background:linear-gradient(45deg,dodgerblue,white,purple);'>
  <tr>
    <th>Name</th>
    <th>Password</th>
    <th>Gender</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Acc_no</th>
    <th>Acc_bal</th>
    <th>Account_type</th>
    <th>Actions</th>
  </tr>
</thead>
<tbody>
<?php
include '../connection.php';
$selectQuery="call `get_users`();";


$query=mysqli_query($con,$selectQuery);
$nums=mysqli_num_rows($query);
if($nums==0){
  ?>
  <script>
  alert("No Data Available");
  </script>
  <?php
}
while($res=mysqli_fetch_array($query)){
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
?>
  
</tbody>
</table>

</body>
</html>

