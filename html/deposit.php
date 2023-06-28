<!DOCTYPE html>
<html>
<style>
input[type=number], select {
  
  padding: 10px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=text], select {
  
  padding: 10px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* input[type=submit]:hover {
  background-color: purple;
} */

div {
  border-radius: 5px;
  background: linear-gradient(45deg,dodgerblue,white,purple); ;
  padding: 20px;
  height:650px;
}
</style>
<body>


<div>
<h3 style="margin-left:550px;font-size:30px;">Deposit Form</h3>

  <form method="POST">
    <label for="acc_no">Enter Your Account No:</label>
    <input style="width:20%;" type="number" id="acc_no" name="acc_no" placeholder="Your Acc No.."><br>

    <label for="name">Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input style="margin-left:50px;"type="text" id="name" name="name" placeholder="Your name.."><br>
     
    <label for="amt">Amount To Deposit:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input style="width:20%;" type="number" id="atm" name="amt" placeholder="Amount to Deposit.."><br>

    <label for="amt">Bank Code:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" placeholder="bank code" name="bcode"><br>
                    
    
    <input style="width:20%;"type="submit" value="Deposit" name="submit" >
  </form>
</div>

</body>
</html>
<?php
include  '../connection.php';

if(isset($_POST['submit'])){
    $sender_acc_no=$_POST['acc_no'];
    
    $name=$_POST['name'];
    $amt=$_POST['amt'];
    $bcode=$_POST['bcode'];
  
    $selectQuery2="select * from user_info where acc_no=$sender_acc_no";


$query=mysqli_query($con,$selectQuery2);
$nums=mysqli_num_rows($query);
if($nums==0){
  ?>
  <script>
  alert("No Account Available")
  </script>
  <?php
}

else{

while($res=mysqli_fetch_array($query)){
    
    $receivernewbal=$res['acc_bal']+$amt;
    $updateQuery="update user_info set acc_bal=$receivernewbal where acc_no=$sender_acc_no";
    function transcationId(){
      $str_result='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      return substr(str_shuffle($str_result),0,15);
  }
  $tid=transcationId();
  $currentDate=date('y-m-d h:m:s');
  $insertTranscation="insert into transaction(transaction_id,transaction_date,amount,sender_acc_no,bcode) values ('$tid','$currentDate','$amt','$sender_acc_no','$bcode')";
  // echo $tid,$currentDate,$insertTranscation;
  $res=mysqli_query($con,$insertTranscation);
  // echo $res;
  $res1=mysqli_query($con,$updateQuery);
  if($res && $res1 ){
        
    ?>
    <script>
        alert("Transcation Successfully");
        </script>
        <?php
}
else
{
    ?>
    <script>
        alert("Something went Wrong!!");
        </script>
        <?php

}


}

}
}



?>      


