<div class="panel border-bottom d-flex justify-content-between">
	<nav aria-label="breadcrumb" class="justify-content-start bg-transparent">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i> <?php echo lang("Apps.Home");?></a></li>
	    <li class="breadcrumb-item" aria-current="page"><a href="/pages/manager"><?php echo lang("Pages");?></a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>
	  </ol>
	  
	</nav>
	<ul class="nav justify-content-end">
	  <?php if(@$button == "create") { ?>
	  <li class="nav-item">
	    <a class="nav-link btn btn-info btn-sm" href="#">Views</a>
	  </li>
	  <li class="nav-item dropdown ml-2">
	    <a class="nav-link dropdown-toggle btn btn-primary btn-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Add Pages</a>
	    <div class="dropdown-menu dropdown-menu-right dropdown-arrow">
	      <a class="dropdown-item" href="/pages/manager/create">Add Pages</a>
	      <a class="dropdown-item" href="#">Add Sub Pages</a>
	      <a class="dropdown-item" href="#">Report</a>
	      <div class="dropdown-divider"></div>
	      <a class="dropdown-item" href="#">SEO</a>
	    </div>
	  </li>
	  <?php } ?>
	  <?php if(@$button == "submit") { ?>

	  	<li class="nav-item">
		    <a class="nav-link btn btn-info btn-sm" href="<?php echo PUBLIC_URL;?>/<?php echo @$seo->urlrewrite;?>.html" target="_bank"><?php echo lang('Apps.Views');?></a>
		</li>

	  	<li class="nav-item ml-2">
		    <button class="nav-link btn btn-info btn-sm" onclick="$('#savecontent').submit();"><?php echo lang('Apps.Save');?></button>
		</li>
		<li class="nav-item dropdown ml-2">
		    <a class="nav-link dropdown-toggle btn btn-primary btn-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Add Pages</a>
		    <div class="dropdown-menu dropdown-menu-right dropdown-arrow">
		      <a class="dropdown-item" href="/pages/manager/create">Add Pages</a>
		      <a class="dropdown-item" href="/pages/manager/create?parent=<?php echo @$record->id;?>">Add Sub Pages</a>
		      <a class="dropdown-item" href="#">Report</a>
		      <div class="dropdown-divider"></div>
		      <a class="dropdown-item" href="#">SEO</a>
		    </div>
		  </li>

	  <?php } ?>
	</ul>
</div>