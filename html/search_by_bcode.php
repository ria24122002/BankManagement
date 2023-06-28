<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
 <style>
     
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 1900px;
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
  <title>search by bcode</title>
</head>
  <body>
<div>
<form  method="POST">
  <input type="text" placeholder="ENTER bankcode" name="b_code"/>
  <input type="submit" placeholder="search" name="search" value="Search" />
</form>
</div>
<h2>SEARCH BY BANK CODE.</h2>

<table>
    <thead>
  <tr>
    <th>branch_name</th>
  </tr>
</thead>
<tbody>
<?php
include '../connection.php';


if(isset($_POST['search'])){
  
  $branch_name=$_POST['b_code'];
  $selectQuery2="select distinct br.branch_name from branch br,bank b where br.bcode=$branch_name;";
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
  <td><?php echo $res['branch_name'];?></td>
  
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







