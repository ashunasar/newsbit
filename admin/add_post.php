<?php include 'includes/header.php' ?>

      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Create Post</h5>
              </div>
              <div class="card-body">
                <form action="add_post.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Post Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Post Title" required>
                  </div>
                  <div class="form-group">
                    <label>Post Content</label>
                    <textarea id="summernote"  class="form-control" name="content" id="" cols="30" rows="10" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Post keywords</label>
                    <input type="text" name="keyword" class="form-control" placeholder="Separate keywords by space" required>
                  </div>
                  <div class="form-group">
                    <label class="btn-bs-file btn btn-lg btn-success" style="background-color: #2196F3;border-radius: 3px;padding: 10px;color: white;font-size: 15px;font-family: serif;">
                    Upload Post Image
                    <input type="file" name='image_file' accept="image/*" required style="width: 138px;height: 47px;margin-top: 6px;"/>
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Post Proof</label>
                    <textarea id="summernote1" class="form-control" name="proof" id="" cols="30" rows="10" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Post Status</label>
                    <select name="status" id="" style="height: 43px;border-radius: 7px;width: 134px;text-align: center;margin-left: 15px;">
                        <option value="Publish">Publish</option>
                        <option value="Draft">Draft</option>
                    </select>
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary" value="submit">
                </form>
              </div>
            </div>
          </div>
        <script>
        $('#summernote').summernote({
        placeholder: 'Write Your Content here....',
        tabsize: 2,
        height: 150
        });
            
        $('#summernote1').summernote({
        placeholder: 'Add proofs related to your post....',
        tabsize: 2,
        height: 100
        });
        </script>
        
        
        <?php 
            if(isset($_POST['submit']) && isset($_FILES['image_file'])){
                
               if(!empty($_FILES['image_file']['name'][0])){
                $title = $_POST['title'];
                $content = $_POST['content'];
                $keyword = $_POST['keyword'];
                
                $proof = $_POST['proof'];
                $status = $_POST['status'];
                
                $image_file = $_FILES['image_file']['name'];
                $tmp  = $_FILES['image_file']['tmp_name'];
                $exp = explode('.',$image_file);
                $path  = "images/" . "post_image" . rand(1,100000) . rand(1,100000) . rand(1,100000) . rand(1,100000) . rand(1,100000) .'.'. $exp[1];
                
                move_uploaded_file($tmp,$path);
                
                $query2 = "INSERT INTO `post` (`post_id`, `post_by`, `post_title`, `post_content`, `post_proof`,`post_img`, `post_like`, `post_views`, `post_status`, `post_keyword`,`post_cmnt`) VALUES (NULL, :username, :title, :content, :proof,:path,'0', '0', :status, :keyword,'0')";
                $result2 = $con->prepare($query2);
                $result2->execute(['username'=>$username,'title'=>$title,'content'=>$content,'proof'=>$proof,'path'=>$path,'status'=>$status,'keyword'=>$keyword]);
                   ?>
                   <script>window.location='add_post.php'</script>
                   <?php
            }
           }
            ?>
            
<!--
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="assets/img/bg5.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="assets/img/mike.jpg" alt="...">
                    <h5 class="title">Mike Andrew</h5>
                  </a>
                  <p class="description">
                    michael24
                  </p>
                </div>
                <p class="description text-center">
                  "Lamborghini Mercy <br>
                  Your chick she so thirsty <br>
                  I'm in that two seat Lambo"
                </p>
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
-->
        </div>
      </div>
     <?php include 'includes/footer.php' ?>