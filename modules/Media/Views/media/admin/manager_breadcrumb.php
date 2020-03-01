
<div class="panel border-bottom d-flex justify-content-between">
	<nav aria-label="breadcrumb" class="justify-content-start bg-transparent">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i> <?php echo lang("Apps.Home");?></a></li>
	    <li class="breadcrumb-item" aria-current="page"><a href="/manager"><?php echo lang("Media.title");?></a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>
	  </ol>
	  
	</nav>
	<ul class="nav justify-content-end">

	<ul class="nav justify-content-end">
	  <?php if(@$button == "create") { ?>
	  <li class="nav-item">
	    <a class="nav-link btn btn-info btn-sm" href="//create"><?php echo lang('Apps.Create');?></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link btn btn-info btn-sm" href="//report"><?php echo lang('Apps.Report');?></a>
	  </li>

	  <?php } ?>
	  <?php if(@$button == "submit") { ?>
	  	<li class="nav-item">
		    <button class="nav-link btn btn-info btn-sm" onclick="$('#savecontent').submit();"><?php echo lang('Apps.Save');?></button>
		</li>
		<li class="nav-item">
		    <a class="nav-link btn btn-info btn-sm" href="/manager"><?php echo lang('Apps.Back');?></a>
		</li>
	  <?php } ?>
	</ul>
</div>
