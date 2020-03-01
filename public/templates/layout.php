<!doctype html>
<html class="no-js" lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1,user-scalable=no,width=device-width">
      <title><?php echo @$title;?></title>  
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">    
      <meta name="author" content="VTNPLUS Co.,ltd 2009-<?php echo date("Y");?>">
      <meta name="copyright" content="2019-<?php echo date("Y");?> SmartTrader">
      <meta name="datetime" content="<?php echo date("r");?>">
      <link rel="canonical" href="<?php echo site_url();?>"/>
      <link rel="icon" href="<?php echo site_url('favicon.ico');?>" type="image/x-icon" />
      <link rel="shortcut icon" href="<?php echo site_url('favicon.ico');?>" type="image/x-icon" />
      <meta name="description" content="<?php echo @$description;?>">
      <meta name="keywords" content="<?php echo @$keyword;?>">
      <meta name="robots" content="index,follow"/>
      <meta name="googlebot" content="index, follow"/>
      <meta name="Googlebot-News" content="index, follow"/>
      <meta name="Googlebot-Shopping" content="index, follow">
      <meta name="Feedfetcher-Google" content="index, follow">
      <meta name="Bingbot" content="index, follow">
      <meta name="msnbot" content="index, follow">
      <?php echo csrf_meta();?>
      <meta property="og:title" content="<?php echo @$title;?>"/>
      <meta property="og:description" content="<?php echo @$description;?>"/>
      <meta property="og:url" content="<?php echo current_url();?>"/>
      <meta property="og:image" content="<?php echo site_url(@$image);?>"/>
      <meta property="og:type" content="website"/>
      <meta property="og:site_name" content="<?php echo @$title;?>"/>
      <link rel="stylesheet" href="/assent/css/apps.css" name="Bootstrap CSS">
      <link rel="stylesheet" href="/assent/css/icon.css" name="Bootstrap CSS">
      
      <link rel="stylesheet" href="/assent/css/modules.css" name="Module CSS">
      <link rel="stylesheet" href="/assent/css/customs.css" name="Module CSS">
      
</head>
<body class="app theme-default" itemscope itemtype="http://schema.org/WebPage">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
	  <div class="container">
	  <a class="navbar-brand" href="<?php echo site_url();?>"><img src="/assent/image/logo.png" class="d-inline-block align-top" alt=""></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	  	
	    
	    <?php Widgets('Modules\\Pages\\Menu',"navbar");?>
	    <?php Widgets('Modules\\Pages',"menu");?>
	    <ul class="navbar-nav">
	    	 <li class="nav-item dropdown">
	    		 <a class="nav-link"><?php echo lang("Apps.Helper");?></a>
	    	</li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <?php echo lang("Apps.Language");?>
		        </a>
		        <div class="dropdown-menu dropdown-arrow" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		      <?php if($account->isLogin()){ ?>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle border-left" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <?php echo $account->info()->first_name;?> <?php echo $account->info()->last_name;?> <img src="https://www.zulutrade.com/Image.ashx?type=follower&size=L&ignore=true&platform=f&id=2008860&637136582750128212" width="30" class="rounded-circle align-self-end" alt="...">
		        </a>
		        <div class="dropdown-menu dropdown-arrow dropdown-menu-right" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="/auth/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
		          <a class="dropdown-item" href="/auth/settings"><i class="fa fa-user-cog"></i> Settings</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="/auth/logout"><i class="fa fa-power-off"></i> Logout</a>
		        </div>
		      </li>
		      <?php }else{ ?>
		      	<li class="nav-item pr-2">
		    		 <a href="/auth/login" class="btn btn-outline-primary btn-sm"><i class="fa fa-power-on"></i> <?php echo lang("Users.Login");?></a>
		    	</li>

		    	<li class="nav-item">
		    		 <a href="/auth/register" class="btn btn-outline-info btn-sm"><i class="fa fa-users"></i> <?php echo lang("Users.Register");?></a>
		    	</li>
		  	  <?php } ?>
	     </ul>
	    </div>
	  </div>
	</nav>

	<?php //Components('Users::HeaderPanel',["user" => $account]); ?>

	

	<?php Widgets($Wingets,"breadcrumb");?>
</header>
<?php echo $content; ?>
    
<footer>
	<div class="container">
		Copyright 2020
	</div>
</footer>

  	<script src="/assent/js/apps.js"></script>
  	<script src="/assent/js/material.js"></script>
</body>

</html>