<?php include '../db.php'?>
<?php ob_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create a new account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
<p class="form-group" id="mobile_error" style="color:red;display:none;">Mobile Number Not registered!</p>
<p class="form-group" id="pass_error" style="color:red;display:none;">Incorrect Password!</p>

                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-phone material-icons-name"></i></label>
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
                            <p class="form-group" id="error" style="color:red;display:none;">Please Check Your Number</p>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

   
   
   <?php      
            if(isset($_POST['signin'])){
            setcookie("username","",time() - 3600,"/");
//            setcookie("user_role","",time() - 3600,"/");
            $mobile_number = mysqli_real_escape_string($con,$_POST['mobile_number']);
            $password = mysqli_real_escape_string($con,$_POST['your_pass']);
            $query ="SELECT * FROM user WHERE user_phone = '{$mobile_number}' ";   
            $query_result = mysqli_query($con, $query);
                    
                $count = mysqli_num_rows($query_result);
                
                 if($count){
             while($row = mysqli_fetch_assoc($query_result)){
                $user_username       = $row['user_username'];
                $user_phone          = $row['user_phone'];
                $db_user_password    = $row['user_pass'];
//                $db_user_role        = $row['user_role'];
            }
            if($mobile_number ==$user_phone &&  $password ==$db_user_password){
            setcookie("username",$user_username,time()+ (60*60*24*7),"/");
//            setcookie("user_role",$db_user_role ,time()+ (60*60*24*7),"/");                  
            header('Location:../admin');
            } 
                else{
                    ?>
                    <script>
                   document.getElementById("pass_error").style.display ='block';
                   </script>
                <?php
                }
                 }
                else {
                    
                ?>
                <script>
                    document.getElementById("mobile_error").style.display ='block';
                </script>
                <?php      
                }}?>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>