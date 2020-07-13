
<?php include 'includes/header.php' ?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8">
<!--					<h4 class="p-title mt-30"><b>CRYPTO MINING NEWS</b></h4>-->
					<div class="row">
                    <?php 
                    if(isset($_GET['page'])){
                    $page  = $_GET['page'];
                }else{
                    $page =""; 
                }

               if($page == "" || $page == 1){
                   $page_1 =0;
               }
               else{
                   $page_1 = ($page * 5) - 5;
               }
            $post_query_count  = "SELECT * FROM post";
            $post_query_count_result = $conn->prepare($post_query_count);
            $post_query_count_result->execute();
            $count_row  = $post_query_count_result->rowCount();
            $count_row = ceil($count_row/10);
             ?>
                    <?php

                    $query = "SELECT * FROM `user` ,`post` WHERE post_by=user_username and post_status='Publish' ORDER BY date DESC LIMIT $page_1,10";
                    $result = $conn->prepare($query);
                    $result->execute();
                    
                    
                    while($post = $result->fetch()){
                        echo '<div class="col-sm-6">
							<a href="post.php?p_id='.$post->post_id.'"><img src="admin/'.$post->post_img.'" alt=""></a>
							<h4 class="pt-20"><a href="post.php?p_id='.$post->post_id.'"><b>'.$post->post_title.'</b></a></h4>
							<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>'.$post->user_name.',</b></a>
								'.$post->date.'</li>
								<li><i class="color-primary mr-5 font-12 ion-android-favorite"></i>'.$post->post_like.'</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>'.$post->post_views.'</li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>'.$post->post_cmnt.'</li>
							</ul>
						</div>';
                    }
                    ?>
                    
<!--					<a href="admin/"></a>-->
					
<!--
						<div class="col-sm-6">
							<img src="images/crypto-news-6-600x450.jpg" alt="">
							<h4 class="pt-20"><a href="#"><b>2017 Market Performance: <br/>Crypto vs.Stock</b></a></h4>
							<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Olivia Capzallo,</b></a>
								Jan 25, 2018</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>47</li>
							</ul>
						</div>
-->
						<!-- col-sm-6 -->
						

						
						
					</div><!-- row -->
<!--
					
					<a class="dplay-block btn-brdr-primary mt-20 mb-md-50" href="#"><b>VIEW MORE CRYPTO MINING EVENTS</b></a>
-->
            <div class="row">
			          <div class="col-sm-6">
			                       <div class="container">
			              <ul class="pagination">
                        <?php
                    for($i = 1;$i <=$count_row; $i++ ){

                    if($i == $page){
                    echo "<li class='active'><a style='font-size: 20px;' href='index.php?page={$i}'><span>{$i}</span></a></li>";
                    }
                    else{
                    echo "<li><a style='font-size: 20px;' href='index.php?page={$i}'><span>{$i}</span></a></li>";
                    }
                    } 
                              ?>
			              </ul>
<!--			              f9b500-->
			              </div>
<!--
            <div class="container">
            <ul class="pagination">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            </ul>
            </div>
-->
			          </div>
			        </div>
				</div><!-- col-md-9 -->
                  
						
<?php include 'includes/side.php' ?>
				
			</div><!-- row -->
		</div><!-- container -->
	</section>
	
	<?php include 'includes/footer.php' ?>
	
	