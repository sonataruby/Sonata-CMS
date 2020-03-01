<ul class="list-group list-group-flush">
	<?php foreach ($data as $key => $value) { ?>
		<li class="list-group-item"><a href="/settings/general/template"><i class="fa fa-user"></i> <?php echo lang($value->name);?></a></li>
	<?php } ?>
	
</ul>
