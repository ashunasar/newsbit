<?php include 'includes/header.php' ?>
	
	<section>
		<div class="container">
			<div class="row">
			
				<div class="col-md-12 col-lg-8">
				 <?php 
                    if(isset($_GET['p_id']) && !empty($_GET['p_id'])){
                        $id = $_GET['p_id'];
                        $inc_view = "UPDATE post SET post_views=post_views + 1 WHERE post_id=:id";
                        $res_inc_view = $conn->prepare($inc_view);
                        $res_inc_view->execute(['id'=>$id]);
                        
                        $query = "select * FROM post ,user WHERE post_by=user_username and post_id=:id";
                        $result = $conn->prepare($query);
                        $result->execute(['id'=>$id]);
                        
                        while($post = $result->fetch()){
                        echo '<img src="admin/'.$post->post_img.'" alt="">
					<h3 class="mt-30"><b>'.$post->post_title.'</b></h3>
					<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>'.$post->user_name.', </b></a>
								 '.$post->date.'</li>';
                            if(isset($_COOKIE['username'])){
                                $username = $_COOKIE['username'];
                            $query1  = "SELECT * FROM `likes` WHERE like_by= :username and post_id=:id";
                            $result1 = $conn->prepare($query1);
                            $result1->execute(['username'=>$username,'id'=>$post->post_id]);
                            $count = $result1->rowCount();

                            if($count < 1){
                            echo '<li style="display:none;"><span id="username">'.$_COOKIE['username'].'</span><span id="post_id">'.$post->post_id.'</span></li>
                            <button><li><button class="like color-primary mr-5 font-12 ion-android-favorite-outline"></button><span id="like_count">'.$post->post_like.'</span></li></button>';
                            }else{
                                echo '<li style="display:none;"><span id="username">'.$_COOKIE['username'].'</span><span id="post_id">'.$post->post_id.'</span></li>
								 <button><li><button class="unlike color-primary mr-5 font-12 ion-android-favorite"></button><span id="like_count">'.$post->post_like.'</span></li></button>';}
                            }else{
                                 echo '<button><li><button class="login color-primary mr-5 font-12 ion-android-favorite-outline"></button><span id="like_count">'.$post->post_like.'</span></li></button>';
                            }
                                 
								echo ' <li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>'.$post->post_views.'</li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>'.$post->post_cmnt.'</li>
							</ul>
					
					
					<p class="mtb-15">'.$post->post_content.'</p>
					
                    <section class="pt-0" style="margin-top: 40px;">
                    <div class="container">

                        <div class="accordian">
                            <h5><a data-accordian="#accordian-1" id="dee" class="a-title" href="#">
                                <b>view Proof</b><i class="ion-plus"></i></a></h5>

                            <div class="a-body" id="accordian-1">
                                <div class="a-body-inner ">
                                    <div class="quote-primary mtb-20">
                                       <p class="mtb-15">'.$post->post_proof.'</p>
                                    </div>	
                                </div>	
                            </div>
                        </div>
                    </div>
                </section>';
                        }
                                                    
                        
                        
                    }else {?><script>window.location='index.php'</script><?php } ?>
				  

					
					<script>
                      $(function(){
                        $(document).on('click','.like',function(){
                       //  $(".like").click(function(){
                            $(this).removeClass("ion-android-favorite-outline");
                            $(this).addClass("ion-android-favorite");
                             
                             $("#like_count").text(parseInt($("#like_count").text()) + 1);
                             var username  = $("#username").text();
                             var post_id   = $("#post_id").text();
                             $.ajax({
                                url:'like.php',
                                data:{username:username,post_id:post_id,like:'like'},
                                type:'Post'
                             });
                             //$('.like').attr('class','unlike');
                             $(this).removeClass("like");
                             $(this).addClass("unlike");
                            //return false ; 
                         });
                          
                          $('.like').unbind("click");
                          $(document).on('click','.unlike',function(){
                        //$(".unlike").click(function(){
                            
                            $(".unlike").removeClass("ion-android-favorite");
                            $(".unlike").addClass("ion-android-favorite-outline");
                             
                             $("#like_count").text(parseInt($("#like_count").text()) - 1);
                             var username  = $("#username").text();
                             var post_id   = $("#post_id").text();
                             $.ajax({
                                url:'like.php',
                                data:{username:username,post_id:post_id,unlike:'unlike'},
                                type:'Post'
                             });
                             $(this).removeClass("unlike");
                             $(this).addClass("like");
                         });
                          
                        $(document).on('click','.login',function(){
                        alert("Please Login To Like ");
                        });
                          
                          
                      });
                    </script>
					<div class="float-left-right text-center mt-40 mt-sm-20">
				
<!--
						<ul class="mb-30 list-li-mt-10 list-li-mr-5 list-a-plr-15 list-a-ptb-7 list-a-bg-grey list-a-br-2 list-a-hvr-primary ">
							<li><a href="#">MULTIPURPOSE</a></li>
							<li><a href="#">FASHION</a></li>
							<li class="mr-0"><a href="#">BLOGS</a></li>
						</ul>
-->
<!--
						<ul class="mb-30 list-a-bg-grey list-a-hw-radial-35 list-a-hvr-primary list-li-ml-5">
							<li class="mr-10 ml-0">Share</li>
							<li><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter"></i></a></li>
							<li><a href="#"><i class="ion-social-google"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram"></i></a></li>
						</ul>
-->
						
					</div><!-- float-left-right -->
				
<!--					<div class="brdr-ash-1 opacty-5"></div>-->
					
					<h4 class="p-title mt-20"><b> COMMENTS</b></h4>
					<?php 
                     $query = "SELECT cmnt_txt,user_name,user_img,date FROM comment,user WHERE cmnt_username=user_username and post_id = :id";
                    $result  =$conn->prepare($query);
                    $result->execute(['id'=>$id]);
                    while($cmnt = $result->fetch()){
                        echo '<div class="sided-70 mb-50">
					
						<div class="s-left rounded">
							<img src="dashboard/'.$cmnt->user_img.'" alt="">
						</div>
						
						<div class="s-right ml-100 ml-xs-85">
							<h5><b>'.$cmnt->user_name.'</b> <span class="font-8 color-ash">'.$cmnt->date.'</span></h5>
							<p class="mt-10 mb-15">'.$cmnt->cmnt_txt.'</p>

						</div>
						
					</div>';
                    }
                    
                    ?>
                    <?php 
                    if(isset($_COOKIE['username'])){
                    ?>
                    <h4 class="p-title mt-20"><b>LEAVE A COMMENT</b></h4>

                    <form action="#" method="post" class="form-block form-plr-15 form-h-45 form-mb-20 form-brdr-lite-white mb-md-50">
                    <textarea class="ptb-10" name="cmnt_txt" placeholder="Your Comment"  rows="4" cols="50" required></textarea>
                    <button name="submit1" class="btn-fill-primary plr-30" type="submit"><b>COMMENT</b></button>
                    </form>
                    <?php
                    }else{
                        ?>
                        <h4 class="p-title mt-20"><b>Please Login To Comment</b></h4>
                        <div class="form-block form-plr-15 form-h-45 form-mb-20 form-brdr-lite-white mb-md-50">
                        <a href="user/login.php"><button class="btn-fill-primary plr-30"><b>Login</b></button></a>
                        
                        </div>
                        <?php
                    }?>

				</div><!-- col-md-9 -->
				<?php 
                if(isset($_POST['submit1'])){
                    $cmnt_txt = $_POST['cmnt_txt'];
                    $query = "INSERT INTO `comment` (`cmnt_id`, `post_id`, `cmnt_username`, `cmnt_txt`) VALUES (NULL, :id, :username, :cmnt_txt)";
                    $result = $conn->prepare($query);
                    $result->execute(['id'=>$id,'username'=>$_COOKIE['username'],'cmnt_txt'=>$cmnt_txt]);
                    
                    $inc_cmnt = "UPDATE post SET post_cmnt=post_cmnt + 1 WHERE post_id=:id";
                    $res_inc_cmnt = $conn->prepare($inc_cmnt);
                    $res_inc_cmnt->execute(['id'=>$id]);
                    
                    $inc_view = "UPDATE post SET post_views=post_views - 2 WHERE post_id=:id";
                        $res_inc_view = $conn->prepare($inc_view);
                        $res_inc_view->execute(['id'=>$id]);
                    ?>
                    <script>window.location='post.php?p_id=<?php echo $id ?>'</script>
                    <?php
                }
                ?>
				
				<?php include 'includes/side.php' ?>
				
			</div><!-- row -->
			
		</div><!-- container -->
	</section>
	
     <?php include 'includes/footer.php' ?>