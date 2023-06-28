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
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Branch Table</h2>

<table>
    <thead>
  <tr>
    <th>branch name</th>
    <th>branch id</th>
    <th>branch address</th>
    <th>bank code</th>
  </tr>
</thead>
<tbody>
<?php
include '../connection.php';
$selectQuery="select * from branch";

$query=mysqli_query($con,$selectQuery);
$nums=mysqli_num_rows($query);
if($nums==0){
  ?>
  <script>
  alert("No Data Available")
  </script>
  <?php
}
while($res=mysqli_fetch_array($query)){
    //echo $res['name'];
    ?>
    <tr>
    <td><?php echo $res['branch_name'];?></td>
    <td><?php echo $res['branch_id'];?></td>
    <td><?php echo $res['address'];?></td>
    <td><?php echo $res['bcode'];?></td>
    
    
  </tr>
<?php

}
?>
  
</tbody>
</table>

</body>
</html>

