<?php include '../db.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form For SIRT BLOG</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    
    <style>
    .btn-bs-file{
    position:relative;
}
.btn-bs-file input[type="file"]{
    position: absolute;
    top: -9999999;
    filter: alpha(opacity=0);
    opacity: 0;
    width:0;
    height:0; 
    outline: none;
    cursor: inherit;
}
    
    
    
    </style>
    
    
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form  action="#" method="POST" class="register-form"  id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-face material-icons-name"></i></label>
                                <input type="text" onkeyup="underscore()"  name="username" id="username" placeholder="Your Username" required />
                            </div>
                                <div class="form-group" id="username_exist" style='display:none;'>
                                  
                                </div>
                            
                            
                            <script>
                            
                                $(document).ready(function(){
                                    $("#username").keyup(function(){
                                        var user = $("#username").val();
                                    
                                        $.ajax({
                                           url:'check_every.php',
                                           data:{user:user},
                                           type:'Post',
                                            success:function(data){
                                                $("#username_exist").css("display", "block");
                                                $("#username_exist").html(data);
                                            }
                                        });
                                    });
                                    
                                });
                        


                            </script>
                            
                            
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                            </div>
                             <div class="form-group" id="email_exist" style='display:none;'>
                                  
                                </div>
                                <script>
                                  $("#email").keyup(function(){
                                        var email = $("#email").val();
                                        $.ajax({
                                           url:'check_every.php',
                                           data:{email:email},
                                           type:'Post',
                                            success:function(data){
                                                $("#email_exist").css("display", "block");
                                                $("#email_exist").html(data);
                                            }
                                        });
                                    });</script>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-phone"></i> </label>
                                <input type="text" maxlength="10" onkeyup="func()" name="mobile_number" id="mobile_number" placeholder="Your Mobile Number" required />
                                <script> 
                                    function func(){
                                       var num = document.getElementById("mobile_number").value;
                                        if(isNaN(num)){
                                       document.getElementById("error").style.display ='block';
                                        }
                                             else{
                                        document.getElementById("error").style.display ='none';
                                             }}
                                </script>
                            </div>
<div class="form-group" id="mobile_number_exist" style='display:none;'>

</div>
                <script>
                                  $("#mobile_number").keyup(function(){
                                        var phone = $("#mobile_number").val();
                                        $.ajax({
                                           url:'check_every.php',
                                           data:{phone:phone},
                                           type:'Post',
                                            success:function(data){
                                                $("#mobile_number_exist").css("display", "block");
                                                $("#mobile_number_exist").html(data);
                                            }
                                        });
                                    });</script>
                            <p class="form-group" id="error" style="color:red;display:none;">Please Check Your Number</p>
                            
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"  required />
                            </div>
                            
<label class="btn-bs-file btn btn-lg btn-success" style="background-color: #2196F3;border-radius: 3px;padding: 10px;">
                                Upload Your Image
                                <input type="file" name='image_file'   required />
                                </label><br>
                                <div class="form-group" style="display:none;" id="img_error">
                                    <p style="color:red;">Please Upload Your Image</p>
                                </div>
                                <br>
<div class="form-group" id="display_error" style='display:none;color:red;font-size: 20px;'>

</div>


                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <?php 
if(isset($_POST['signup'])){
     setcookie("username","",time() - 3600,"/");
    $username  =mysqli_real_escape_string($con,$_POST['username']);
    $name  =mysqli_real_escape_string($con,$_POST['name']);
    $email  =mysqli_real_escape_string($con,$_POST['email']);
    $mobile_number  =mysqli_real_escape_string($con,$_POST['mobile_number']);
    $pass  =mysqli_real_escape_string($con,$_POST['pass']);
    $re_pass  =mysqli_real_escape_string($con,$_POST['re_pass']);
    $user_image = mysqli_real_escape_string($con,$_FILES['image_file']['name']);
    
    
    $username_check ="select * from user where user_username = '{$username}' ";
    $username_check_result = mysqli_query($con,$username_check);
    $count_username = mysqli_num_rows($username_check_result);
    $email_check ="select * from user where user_email = '{$email}' ";
    $email_check_result = mysqli_query($con,$email_check);
    $count_email = mysqli_num_rows($email_check_result);
    $mobile_check ="select * from user where user_phone = '{$mobile_number}' ";
    $mobile_check_result = mysqli_query($con,$mobile_check);
    $count_mobile = mysqli_num_rows($mobile_check_result);
    
    
    if(!empty($user_image)){
        if(strlen($pass) > 6){
            if($pass == $re_pass){
             if($count_username != 1){
               if($count_email != 1){
                if($count_mobile !=1 ){   
                    
    $user_image_temp = $_FILES['image_file']['tmp_name'];   
    $ext = explode('.',$user_image);
    $image_name = $username . $ext[0] .'.'. $ext[1];
    $path = "../admin/images/" . $image_name ;
    move_uploaded_file($user_image_temp ,$path);
    
    $query  = "Insert Into user(user_username,user_name,user_email,user_phone,user_pass,user_img) " ;
    $query .= "Values ('{$username}','{$name}','{$email}','{$mobile_number}','{$pass}','{$path}')";
    
    $result = mysqli_query($con,$query);
//    if(!$result){
//        echo "<h1>error</h1>" . mysqli_error($con);  
//    }
//        if(isset($_COOKIE['username'])){
//        setcookie("username","",time() - 3600,"/");
//       // setcookie("user_role","",time() - 3600,"/");
//        }
      setcookie("username",$username,time()+ (60*60*24*7),"/");
     // setcookie("user_role",$user_role,time()+ (60*60*24*7),"/");
        ?>
        <script>
        setTimeout(function(){
       window.location = '../admin';
        },500)
        </script>
        <?php
                }
                else{
            ?>
            <script>
            $('#display_error').css('display','block');
                $('#display_error').html('This Mobile Number Already Registered');
            </script>
            <?php
        }
               }
        else{
            ?>
            <script>
            $('#display_error').css('display','block');
                $('#display_error').html('This Email ID Already Registered');
            </script>
            <?php
        }
            }
            else{
            ?>
            <script>
            $('#display_error').css('display','block');
                $('#display_error').html('This Username Already Taken');
            </script>
            <?php
        }
            }
            else{
            ?>
            <script>
            $('#display_error').css('display','block');
                $('#display_error').html('Password Feilds did not match');
            </script>
            <?php
        }
        }
        else{
            ?>
            <script>
            $('#display_error').css('display','block');
                $('#display_error').html('Password Should Be More Than 6 characters');
            </script>
            <?php
        }
        
        
 
}
    if(empty($user_image)){
        ?> 
        <script>
    document.getElementById('img_error').style.display = 'block';
        </script>
        <?php
    }
}
?>
<script>
            function underscore(){
            var username = document.getElementById('username');
            var username_value = username.value;
            var new_value = username_value.replace(/\s+/g,'_');
            username.value = new_value;
            }
</script>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>