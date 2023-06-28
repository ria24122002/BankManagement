
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

<h2>Transcatiion Table</h2>

<table>
    <thead>
  <tr>
    <th>transaction_id</th>
    <th>transaction_date</th>
    <th>amount</th>
    <th>sender_acc_no</th>
    <th>bcode</th>
    <!-- <th>account_type</th> -->
  </tr>
</thead>
<tbody>
<?php
include '../connection.php';
$selectQuery="select * from transations";

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
    <td><?php echo $res['trans_id'];?></td>
    <td><?php echo $res['transaction_date'];?></td>
    <td><?php echo $res['amount'];?></td>
    <td><?php echo $res['sender_acc_no'];?></td>
    <td><?php echo $res['bcode'];?></td>
    <!-- <td><?php echo $res['account_type'];?></td>
    -->
    
  </tr>
<?php

}
?>
  
</tbody>
</table>

</body>
</html>

