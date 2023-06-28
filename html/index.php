<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>HOME PAGE</title>
</head>
<body>
    <div class="header">
    <h1 style="text-align:center;">BANK MANAGEMENT</h1>
    <img class="logo" src="../images/BANK.jpg" > 
    </div>
    <div class="cards">
<div class="image">
    <img src="../images/images.jpg">
</div>
<!-- <a href="./account.html"></a> -->
    <!-- <a style="align-items: center;border: 2px solid black;margin-left: 60px;"href="./account.html"> create account</a> -->
    
<button onclick="window.location.href='./account.php'">Create Account</button>
    </div>
<div class="cards">
     <div class="image">
         <img style="width: 265px;height:194px" src="../images/deposit.jpg">
    </div>
        <button onclick="window.location.href='./transfer.php'">Transfer</button>
        <button onclick="window.location.href='./deposit.php'">deposit</button>
</div>
<div class="cards">
    <div class="image">
        <img style="width: 265px;height:194px" src="../images/customer.jpg">
   </div>
       <button onclick="window.location.href='./customer.php'">all customer</button>
       
</div>
<div class="cards">
    <div class="image">
        <img style="width: 265px;height:194px" src="../images/branch.jpg">
   </div>
   <button onclick="window.location.href='./branch.php'">branch</button>
   <button onclick="window.location.href='./branch_detail.php'">branch detail</button>
   
       
</div>
<div class="cards">
    <div class="image">
        <img style="width: 265px;height:190px" src="../images/BANK.jpg">
   </div>
   <button onclick="window.location.href='./bank.php'">bank</button>
   <button onclick="window.location.href='./search_by_bcode.php'">search_bcode</button>
</div>
<div class="cards">
    <div class="image">
        <img style="width: 265px;height:194px" src="../images/download.jpg">
   </div>
   <button onclick="window.location.href='./viewtranscation.php'">View</button>
       

        

</body>
</html>