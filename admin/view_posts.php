<?php include 'includes/header.php' ?>
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
<!--
              <div class="card-header">
                <h5 class="title">100 Awesome Nucleo Icons</h5>
                <p class="category">Handcrafted by our friends from <a href="https://nucleoapp.com/?ref=1712">NucleoApp</a></p>
              </div>
-->
              <div class="card-body all-icons">
          <table class="table">
    <thead>
        <tr>
            <th class="text-center">Title</th>
            <th class="text-center">Status</th>
            <th class="text-center">Like</th>
            <th class="text-center">Views</th>
            <th class="text-center">Comments</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    
    <tbody>
       
       <?php 
        $query = "SELECT * FROM `post` WHERE post_by=:username ORDER by date DESC";
        $result = $con->prepare($query);
        $result->execute(['username'=>$username]);
        
        
        while($post = $result->fetch()){
        echo '<tr>
        <td class="text-center"><a href="../post.php?p_id='.$post->post_id.'">'.$post->post_title.'</a></td>
        <td class="text-center">'.$post->post_status.'</td>
        <td class="text-center">'.$post->post_like.'</td>
        <td class="text-center">'.$post->post_views.'</td>
        <td class="text-center">'.$post->post_cmnt.'</td>
        <td class="td-actions text-right">
        <a href="edit.php?p_id='.$post->post_id.'"><button type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon" style="height: 32px;width: 32px;">
        <i class="now-ui-icons ui-2_settings-90" style="font-size: 16px;margin-top: 3px;"></i>
        </button></a>
        <button type="button" data-toggle="modal" data-target="#exampleModal" rel="'.$post->post_id.'" class="delete_me btn btn-danger btn-sm btn-icon" style="height: 32px;width: 32px;">
        <i class="now-ui-icons ui-1_simple-remove" style="font-size: 16px;margin-top: 3px;"></i>
        </button>
        </td>
        </tr>';
        }
        ?>
       
       
       

    </tbody>
</table>
                    <script>
            $(document).ready(function(){
               
                $(".delete_me").on('click', function(){
                    
                    var id = $(this).attr("rel");
                    
                    var delete_url = "view_posts.php?delete="+ id +"";
                    
                    $(".modal_delete_link").attr("href", delete_url);
                    
                    $("#myModal").modal('show');
   
                });

            });
       </script>  
             
                    <?php 

              if(isset($_GET['delete'])){                  
                  $the_post_id = $_GET['delete']; 
                  $delete_query = "DELETE FROM post where post_id=:id";
                  $result = $con->prepare($delete_query);
                  $result->execute(['id'=>$the_post_id]);
                   ?>
                   
                   <script>
                 window.location= 'view_posts.php';
                  </script>
              <?php
            

              }
           ?> 
             
             
             
              </div>
            </div>
          </div>
        </div>
      </div>
     <?php include 'includes/footer.php' ?>