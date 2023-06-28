<!DOCTYPE html>
<html>
    <head>
        <title>Transfer form</title>
        
        <link rel="stylesheet" type="text/css" href="../css/transfer.css"> 
        <style>
            input[type=text], select {
  
  padding: 10px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=number], select {
  
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
        </style>

    </head>
    <body>
    
        <div class="transfer" style="margin-top:-20px;height: 650px;">
        <p style="font-size:30px;margin-left: 550px;">TRANSFER</p>
        <button  style="float:right;width:90px; height:30px;" onclick="window.location.href='./logs.php'">LOGS</button>
        <button  style="float:right;margin-left:-30px; width:150px; height:30px;" onclick="window.location.href='./max_transaction.php'">MAX_TRANSACTION</button>
        <form method="POST">
            <table>
                <tr>
                    <td>
                        Sender acct_no:
                    </td>
                    <td>
                        <input type="number" placeholder="sender acct_no" name="sender_acc_no">
                    </td>
                </tr>
                <tr>
                    <td>
                        Receiver acct_no:
                    </td>
                    <td>
                        <input type="number" placeholder="receiver acct_no" name="receiver_acc_no">
                    </td>
                </tr>
                <tr>
                    <td>
                        holder_name:
                        </td>
                        <td>
                        <input type="text" placeholder="holder_name" name="name">
                    </td>
                    </tr>
                    <tr>
                    <td>
                        Bank Code:
                        </td>
                        <td>
                        <input type="text" placeholder="bank code" name="bcode">
                    </td>
                    </tr>
                    <tr>
                        <td>
                            Amount:
                        </td>
                        <td>
                            <input type="number" placeholder="Amount" name="amt">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="submit" value="Transfer">Transfer</button>
                        </td>
                    </tr>
            </table>
</div>
                    </html>
                    <?php
include  '../connection.php';

if(isset($_POST['submit'])){
    $sender_acc_no=$_POST['sender_acc_no'];
    $receiver_acc_no=$_POST['receiver_acc_no'];
    $name=$_POST['name'];
    $amt=$_POST['amt'];
    $bcode=$_POST['bcode'];
    $selectQuery="select * from user_info where acc_no=$receiver_acc_no";
    $selectQuery2="select * from user_info where acc_no=$sender_acc_no";

if($sender_acc_no==$receiver_acc_no){
    ?>
    <script>
    alert("Same Account Number Please Enter Other Account No.")
    </script>
    <?php 
}
else{
$query=mysqli_query($con,$selectQuery);
$nums=mysqli_num_rows($query);
if($nums==0){
  ?>
  <script>
  alert("No Account Available")
  </script>
  <?php
}
else{

$query2=mysqli_query($con,$selectQuery2);
$nums2=mysqli_num_rows($query2);

if($nums2==0){
  ?>
  <script>
  alert("No Account Available")
  </script>
  <?php
}
else{

while($res=mysqli_fetch_array($query)){
    
    $receivernewbal=$res['acc_bal']+$amt;
}
while($res2=mysqli_fetch_array($query2)){
    
    
    if($amt>$res2['acc_bal']){
        ?>
        <script>
        alert("Insufficient Balance");
       </script>
       <?php
       $amt=0;
       $sendernewbal=$res2['acc_bal']-$amt;

   
   }
   else{
    $sendernewbal=$res2['acc_bal']-$amt;
    
    $updateQuery="update user_info set acc_bal=$receivernewbal where acc_no=$receiver_acc_no";
    $updateQuery2="update user_info set acc_bal=$sendernewbal where acc_no=$sender_acc_no";
    function transcationId(){
        $str_result='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result),0,15);
    }
    $tid=transcationId();
    $currentDate=date('y-m-d  h:m:s');
    $insertTranscation="insert into transations(trans_id,transaction_date,amount,sender_acc_no,bcode) values ('$tid','$currentDate','$amt','$sender_acc_no','$bcode')";
    // echo $tid,$currentDate,$insertTranscation;
    $res=mysqli_query($con,$insertTranscation);
    // echo $res;
    $res1=mysqli_query($con,$updateQuery);
    
    $res2=mysqli_query($con,$updateQuery2);
    if($res1 && $res2 && $res ){
        
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
}
}
}

?>                 
