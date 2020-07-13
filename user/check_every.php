<?php include '../db.php'?>
<?php 

if(isset($_POST['user'])){
    $user = $_POST['user'];
    
    if(strlen($user) >= 4){
            $query = "select * from user where user_username = '{$user}' ";
            $result = mysqli_query($con,$query);
            $count = mysqli_num_rows($result);
            if($count == 1){
            echo  "<p id='username_exist_data' style='color:red'>This Username Already Taken</p>";
            }
            else{
            echo  "<p id='username_exist_data' style='color:green'>You Can Choose This Username</p>";
            }
    }else{

    echo "<p id='username_exist_data' style='color:red'>Username Is Too Short</p>";
     }
    

}

if(isset($_POST['email'])){
    $email = $_POST['email'];
            $query = "select * from user where user_email = '{$email}'";
            $result = mysqli_query($con,$query);
            $count = mysqli_num_rows($result);
            if($count == 1){
            echo  "<p style='color:red'>This Email id Already Registered</p>";
            }
    }

if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
            $query = "select * from user where user_phone = '{$phone}'";
            $result = mysqli_query($con,$query);
            $count = mysqli_num_rows($result);
            if($count == 1){
            echo  "<p style='color:red'>This Mobile Number Already Registered</p>";
            }
    }

?>