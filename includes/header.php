<?php include 'includes/db.php' ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Newsbit</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet">
	
	<!-- Stylesheets -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="plugin-frameworks/bootstrap.css" rel="stylesheet">
	
	<link href="fonts/ionicons.css" rel="stylesheet">
	
		
	<link href="common/styles.css" rel="stylesheet">
	
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<style>
	    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #f9b500;
    border-color: #337ab7;
    border: 1px solid #ddd;
}
        .pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #f9b500;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
	</style>
</head>
<body>
	
	<header>
		<div class="container">
			<a class="logo" href="index.php"><img src="images/logo-black.png" alt="Logo"></a>
			
			<a class="right-area src-btn" href="#" >
				<i class="active src-icn ion-search"></i>
				<i class="close-icn ion-close"></i>
			</a>
			<div class="src-form">
				<form action="search.php" method="post" enctype="multipart/form-data">
					<input type="text" placeholder="Search here" name="search_txt">
					<input type="submit" name="search"><i class="ion-search"></i>
				</form>
			</div><!-- src-form -->
			
			<a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>
			
			<ul class="main-menu" id="main-menu">
				<li><a href="index.php">HOME</a></li>
<!--
				<li class="drop-down"><a href="03_single-post.html">GUIDES & ANALYTICS<i class="ion-arrow-down-b"></i></a>
					<ul class="drop-down-menu drop-down-inner">
						<li><a href="#">PAGE 1</a></li>
						<li><a href="#">PAGE 2</a></li>
					</ul>
				</li>
-->
                <?php if(isset($_COOKIE['username'])){
                  ?><li><a href="admin">Dashboard</a></li>
                  <?php
                }else{
                    ?><li><a href="user/login.php">Login</a></li>
                    <?php
                } ?>
<!--
				<li><a href="05_FAQS-single.html">EXPLAINED</a></li>
				<li><a href="06_contact-us.html">ICON CLAENDER</a></li>
-->
			</ul>
			<div class="clearfix"></div>
		</div><!-- container -->
	</header>