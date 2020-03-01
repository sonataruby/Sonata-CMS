<?php namespace Components;

class Meta{
	public function HeaderTag(){
		ob_start();
		?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1,user-scalable=no,width=device-width">
      <title>Welcome Site</title>  
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
      <link rel="stylesheet" href="/assent/css/modules.css" name="Module CSS">
      
</head>
<body class="app theme-default" itemscope itemtype="http://schema.org/WebPage">
	<?php
	$data = ob_end_flush();
	return $data;
	}


	
	public function FooterTag(){
		ob_start();
		?>
<script src="/assent/js/apps.js"></script>
</body>

</html>
	<?php
	$data = ob_end_flush();
	return $data;
	}
}
?>