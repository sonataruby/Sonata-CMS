<!doctype html>
<html class="no-js" lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1,user-scalable=no,width=device-width">
      <title>Administrator</title>  
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">    
      <meta name="author" content="VTNPLUS Co.,ltd 2009-<?php echo date("Y");?>">
      <meta name="copyright" content="2019">
      <meta name="datetime" content="<?php echo date("r");?>">
      <meta name="token" content="<?php echo date("r");?>">
      <link rel="canonical" href="<?php echo site_url();?>"/>
      <link rel="icon" href="" type="image/x-icon" />
      <link rel="shortcut icon" href="" type="image/x-icon" />
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="robots" content="index,follow"/>
      <meta name="googlebot" content="index, follow"/>
      <meta name="Googlebot-News" content="index, follow"/>
      <meta name="Googlebot-Shopping" content="index, follow">
      <meta name="Feedfetcher-Google" content="index, follow">
      <meta name="Bingbot" content="index, follow">
      <meta name="msnbot" content="index, follow">
      <?php echo csrf_meta();?>
      <meta property="og:title" content=""/>
      <meta property="og:description" content=""/>
      <meta property="og:url" content="<?php echo current_url();?>"/>
      <meta property="og:image" content=""/>
      <meta property="og:type" content="website"/>
      <meta property="og:site_name" content=""/>
      <link rel="stylesheet" href="/assent/css/apps.css" name="Bootstrap CSS">
      <link rel="stylesheet" href="/assent/css/icon.css" name="Bootstrap CSS">
      
      <link rel="stylesheet" href="/assent/css/modules.css" name="Module CSS">
      <link rel="stylesheet" href="/assent/css/customs.css" name="Customs CSS">
      <script src="/assent/js/apps.js"></script>
  	 <script src="/assent/js/material.js"></script>
</head>
<body class="app theme-default small" itemscope itemtype="http://schema.org/WebPage">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
	  
	  <a class="navbar-brand" href="#"><img src="/assent/image/logo.png" class="d-inline-block align-top" alt=""></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	  	
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Contents
		        </a>
		        <div class="dropdown-menu dropdown-arrow" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Pages</a>
		          <a class="dropdown-item" href="#">Form Builder</a>
		        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Apps</a>
	      </li>
	      
	    </ul>
	    <ul class="navbar-nav">
	    	 <li class="nav-item dropdown">
	    		 <a class="nav-link">Helper</a>
	    	</li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          English
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
		    		 <a href="/auth/login" class="btn btn-outline-primary btn-sm"><i class="fa fa-power-on"></i> Login</a>
		    	</li>

		    	<li class="nav-item">
		    		 <a href="/auth/register" class="btn btn-outline-info btn-sm"><i class="fa fa-users"></i> Register</a>
		    	</li>
		  	  <?php } ?>
	     </ul>
	    </div>
	  
	</nav>

	

	
</header>
<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		
		<div class="col-md-3 col-xl-2 bd-sidebar">
			<div id="cpanel" role="menu">
				<ul class="nav flex-column">
				  <li class="nav-link active"><a href="#"><i class="fa fa-tachometer-alt"></i><span>Dashboard</span></a></li>
				  <li class="nav-link"><a href="/pages/manager"><i class="fa fa-file-word"></i><span>Pages</span></a></li>
				  <li class="nav-link"><a href="/media/manager"><i class="fa fa-file-pdf"></i><span>Media</span></a></li>
				  <li class="nav-link"><a href="/settings/modules/manager" title="Modules"><i class="fa fa-file-medical-alt"></i><span>Modules</span></a></li>
				  <li class="nav-link"><a href="/settings/general"><i class="fa fa-cogs"></i><span>Settings</span></a></li>
				</ul>
			</div>

			<div class="submenu">
				
				<?php Widgets($Wingets,"cpanel");?>
			</div>

		</div>
		
	    <main id="content" class="col-md-9 col-xl-10" role="main">
	    		<?php Widgets($Wingets,"breadcrumb");?>
	    		
	    		<div class="py-md-3  bd-content">
	            	<?php echo $content; ?>
	            </div>
	    </main>
		
	</div>
</div>
<footer>
	<div class="container-fluid">
		Copyright 2020
	</div>
</footer>

  	
</body>

</html>