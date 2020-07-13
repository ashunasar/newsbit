<?php include 'includes/header.php' ?>
      <div class="panel-header panel-header-sm">
      </div>
      
      <?php  
     $query  = "SELECT * FROM `user` WHERE user_username = :username";
     $result =$con->prepare($query);
     $result->execute(['username'=>$username]);
     $user = $result->fetch();
       ?>
      
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form method="post" action="user.php">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" disabled="" value="<?php echo $user->user_username ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Your Email address" value="<?php echo $user->user_email ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Your Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Your Full Name" value="<?php echo $user->user_name ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Your Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="Your Phone Number" value="<?php echo $user->user_phone ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Your Password</label>
                        <input type="text" name="pass" class="form-control" placeholder="Your Password" value="<?php echo $user->user_pass ?>">
                      </div>
                    </div>
                  </div>
                  
                  <input type="submit" name="submit_userdata" class="form-control btn btn-primary" value="Update">
                </form>
              </div>
            </div>
          </div>
          
          <?php 
if(isset($_POST['submit_userdata'])){
$email = $_POST['email'];
$name  = $_POST['name'];
$phone = $_POST['phone'];
$pass  = $_POST['pass'];

$query = "UPDATE `user` SET `user_name`=:name,
                            `user_email`=:email,
                            `user_phone`=:phone,
                            `user_pass`=:pass
                            WHERE user_username =:username";
$result = $con->prepare($query);
    $result->execute(['username'=>$username,
                      'name'=>$name,
                      'email'=>$email,
                      'phone'=>$phone,
                      'pass'=>$pass]);
    ?>
    <script>window.location='user.php'</script>
    <?php 
}
            ?>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="assets/img/bg5.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="<?php echo $user->user_img ?>" alt="...">
                    <h5 class="title"><?php echo $user->user_name ?></h5>
                  </a>
                  <p class="description">
                    <?php echo $user->user_username ?>
                  </p>
                </div>
                
                   <form action="user.php" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                    <label class="btn-bs-file btn btn-lg btn-success" style="display: inherit;background-color: #2196F3;border-radius: 3px;padding: 10px;color: white;font-size: 15px;font-family: serif;">
                    Change Profile Pic
                    <input type="file" onchange="this.form.submit()" name='image_file' accept="image/*" style="width: 138px;height: 47px;margin-top: 6px;"/>
                    </label>
                  </div>
                   </form>
                <?php
                  if(isset($_FILES['image_file'])){
                      if(!empty($_FILES['image_file']['name'][0])){
                     $name  = $_FILES['image_file']['name'];
                     $tmp   = $_FILES['image_file']['tmp_name'];
                    $ext = explode('.',$name);
                    $image_name = $username . rand(1,100000) . rand(1,100000) . rand(1,100000) . rand(1,100000) . rand(1,100000) .'.'. $ext[1];
                    $path = "images/" . $image_name ;
                    move_uploaded_file($tmp ,$path); 
                         try{
                         $query1 = "UPDATE `user` SET `user_img`=:path WHERE user_username =:username";
$result1 = $con->prepare($query1);
$result1->execute(['username'=>$username,
                      'path'=>$path]);    
                         }catch(Exception $e){
                             die($e->getMessage());
                         }

                          
    ?>
    <script>window.location='user.php'</script>
    <?php 

                      }
                     
                  }
                  
                  ?>
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
     <?php include 'includes/footer.php' ?>