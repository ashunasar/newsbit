<div class="col-md-6 col-lg-4">
					<div class="pl-20 pl-md-0">
						<ul class="list-block list-li-ptb-15 list-btm-border-white bg-primary text-center">
							<li><b>ADS</b></li>
							<li><b>ADS</b></li>
							<li><b>ADS</b></li>
							<li><b>ADS</b></li>
							<li><b>ADS</b></li>
							<li><b>ADS</b></li>
						
						</ul>
						
						<div class="mtb-50">
							<h4 class="p-title"><b>MOST VIEWED POSTS</b></h4>
							<?php 
                            $query = "SELECT * FROM `post` ORDER BY post_views DESC LIMIT 5";
                            $result =  $conn->prepare($query);
                            $result->execute();
                            
                            while($post = $result->fetch()){
                                echo '<a class="oflow-hidden pos-relative mb-20 dplay-block" href="post.php?p_id='.$post->post_id.'">
								<div class="wh-100x abs-tlr"><img src="admin/'.$post->post_img.'" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>'.$post->post_title.'</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Danile Palmer,</b></span> Jan 25, 2018</h6>
								</div>
							</a>';
                            }
                            
                            ?>
							
							
						
						</div><!-- mtb-50 -->
						
						<div class="mtb-50 pos-relative">
							<img src="images/banner-1-600x450.jpg" alt="">
							<div class="abs-tblr bg-layer-7 text-center color-white">
								<div class="dplay-tbl">
									<div class="dplay-tbl-cell">
										<h4><b>Available for mobile & desktop</b></h4>
										<a class="mt-15 color-primary link-brdr-btm-primary" href="#"><b>Download for free</b></a>
									</div><!-- dplay-tbl-cell -->
								</div><!-- dplay-tbl -->
							</div><!-- abs-tblr -->
						</div><!-- mtb-50 -->
						
						<div class="mtb-50 mb-md-0">
							<h4 class="p-title"><b>NEWSLETTER</b></h4>
							<p class="mb-20">Subscribe to our newsletter to get notification about new updates,
								information, discount, etc..</p>
							<form class="nwsltr-primary-1">
								<input type="text" placeholder="Your email"/>
								<button type="submit"><i class="ion-ios-paperplane"></i></button>
							</form>
						</div><!-- mtb-50 -->
						
					</div><!--  pl-20 -->
				</div><!-- col-md-3 -->