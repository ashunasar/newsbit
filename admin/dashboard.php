<?php include 'includes/header.php' ?>

      <div class="panel-header">
<!-- ss       <canvas id="bigDashboardChart"></canvas>-->
      </div>
      
      
      <?php 
       $query  = "select * from post where post_by=:username";
       $result = $con->prepare($query);
       $result->execute(['username'=>$username]);
       $count = $result->rowCount();
        $likes = 0;
        $views = 0;
       while($counts = $result->fetch()){
           $likes += $counts->post_like;
           $views += $counts->post_views;
       }
       ?>
      
      <div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Post</h5>
                <h3 class="card-title"><?php echo $count ?></h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="font-icon-detail">
                      <i class="now-ui-icons files_single-copy-04" style="font-size: 140px;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Views</h5>
                <h4 class="card-title"><?php echo $views ?></h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="font-icon-detail">
                      <i class="now-ui-icons business_globe" style="font-size: 140px;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Likes</h5>
                <h4 class="card-title"><?php echo $likes ?></h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="font-icon-detail">
                      <i class="now-ui-icons ui-2_favourite-28" style="font-size: 140px;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
     <?php include 'includes/footer.php' ?>