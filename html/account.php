<!DOCTYPE html>
<html>
    <head>
        <title>Register form</title>
        <link rel="stylesheet" type="text/css" href="../css/account.css"> 
        <style>
            input[type=text], select {
  
  padding: 10px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=number], select,input[type=email],input[type=radio],input[type=password],input[type=tel]{
  
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
    <div class="account" style="width:1300px;height:600px;margin-top:0px;" >
        <form  method="POST">

            <h1 style="margin-left:550px;">Create Account</h1>
            <table>
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        <input type="text" placeholder="Name" name="name"  required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                      <input type="password" placeholder="Password" name="password"  required>  
                    </td>
                </tr>
                <tr>
                   <td>
                    Gender:
                   </td> 
                   <td>
                    <input type="radio" name="gender" value="male" >Male
                    <input type="radio" name="gender" value="female" >Female
                   </td>
                </tr>
                <tr>
                    <td>
                        Email:
                    </td>
                    <td>
                        <input type="email" placeholder="Email" name="email" required >
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone:
                    </td>
                    <td>
                        <input type="tel" placeholder="" name="phone"  maxlength="10" minlength="10" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Account type:
                    </td>
                    <td>
                        <input type="text" placeholder="" name="account_type" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Genrate acct_no:
                    </td>
                    <td>
                         <input id="generateacc" type="number" name="acc_no" required > 
                        <!-- <button type="submit" > Genrate Acc</button> -->
                        <!-- <script>
                            function func(){
                                var d=new Date().getTime().toString();
                                console.log(d);
                                document.getElementById("generateacc").value=d


                            }
                        </script> -->
                    </td>
                </tr>
                <tr>
                <td>
                        Account Balance:
                    </td>
                    <td>
                        <input type="number" placeholder="" name="acc_bal">
                    </td> 

                </tr>
                <tr>
                    <!-- <td>
                        Submit:
                    </td> -->
                    <td>
                        <input type="submit" placeholder="" name="submit" value="Register">
                    </td>
                </tr>
             </div>

            </table>
        </form>
    </body>
</html>


<?php
include  '../connection.php';
//check if db exists
$db=mysqli_select_db($con,"bms");
if(empty($db)){
    echo "Database not Found";
    $dbcr="create database bms";
    $check=mysqli_query($con,$dbcr);
    if(!$check){
        echo "Db Creation Failed";
    }
    else{
        echo "DB Created";
    }
}
else{
    echo "Db Found";
    $table="select * from user_info";
    $checktable=mysqli_query($con,$table);
    if(!$checktable){
        echo "table not present";
        $createt="create table user_info(
            id int(100) NOT NULL AUTO_INCREMENT,
            name varchar (255) NOT NULL,
            password varchar (255) NOT NULL,
            gender varchar (255) NOT NULL,
            email varchar (255) NOT NULL,
            phone varchar (255) NOT NULL,
            acc_no varchar (255) NOT NULL,
            acc_bal varchar (255) NOT NULL,
            account_type varchar(50) not null,
            PRIMARY KEY(id)

            )";
            $ok=mysqli_query($con,$createt);
            if(!$ok){
                echo "table creation failed";
            }
            else{
                echo "table created";
            }
    }
    else{
        echo "table present";
    }
}
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $accno=$_POST['acc_no'];
    $accbal=$_POST['acc_bal'];
    $acctype=$_POST['account_type'];
    

    $insertQuery="insert into user_info(name, password, gender, email,phone,acc_no,acc_bal,account_type) values ('$name','$password','$gender','$email','$phone','$accno','$accbal','$acctype')";
    
    $res=mysqli_query($con,$insertQuery);
    
    if($res){
        
        ?>
        <script>
            alert("User Account Created Successfully")
            </script>

            <?php
    }else{
        ?>
        <script>
            alert("Something went Wrong!!")
            </script>
            <?php
            
         

    }
}

?>
