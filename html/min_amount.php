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
  background-color: #add8e6;
}
</style>
</head>
<body>
<h2 style="color:red;">MINIMUM AMOUNT</h2>

<table style='background:#808080;'>
    <thead>
  <tr>
    <th>acc_no</th>
    <th>name</th>

  </tr>
</thead>
<tbody>
<?php
include '../connection.php';
$selectQuery="select acc_no,name from user_info where acc_bal<3000;";


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
    <td><?php echo $res['acc_no'];?></td>
    <td><?php echo $res['name'];?></td>
    
    
  </tr>
<?php

}
?>
  
</tbody>
</table>

</body>
</html>

