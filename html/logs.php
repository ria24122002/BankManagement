
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
<h2 style="color:red;">LOGS TABLE</h2>

<table style='background:pink;'>
    <thead style='background:linear-gradient(45deg,dodgerblue,white,purple);'>
  <tr>
    <th>id</th>
    <th>acc_no</th>
    <th>action</th>
    <th>cdate</th>
  </tr>
</thead>
<tbody>
<?php
include '../connection.php';
$selectQuery="select * from logs;";


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
    <td><?php echo $res['id'];?></td>
    <td><?php echo $res['acc_no'];?></td>
    <td><?php echo $res['action'];?></td>
    <td><?php echo $res['cdate'];?></td>
  </tr>
<?php

}
?>
  
</tbody>
</table>

</body>
</html>

