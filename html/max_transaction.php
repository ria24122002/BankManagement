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
<h2 style="color:red;">max_transaction</h2>

<table style='background:#808080;'>
    <thead style='background:linear-gradient(45deg,dodgerblue,white,purple);'>
  <tr>
    <th>sender_acc_no</th>
    <th>name</th>

  </tr>
</thead>
<tbody>
<?php
include '../connection.php';
$selectQuery="select t.sender_acc_no, u.name from transations t,user_info u group by sender_acc_no having count(*)=
(select max(c) from
(select count(*)c from transations t,user_info u group by t.sender_acc_no)a
);";


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
    <td><?php echo $res['sender_acc_no'];?></td>
    <td><?php echo $res['name'];?></td>
    
  </tr>
<?php

}
?>
  
</tbody>
</table>

</body>
</html>

