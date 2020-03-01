<ul class="list-group list-group-flush">
	<li class="list-group-item"><a href="/settings/general"><i class="fa fa-cogs"></i> <?php echo lang("General");?></a></li>
	<li class="list-group-item">
		<a href="/settings/general/email"><i class="fa fa-user"></i> <?php echo lang("Advanced");?></a>
		<ul>
			<li><a href="/settings/general/email"><i class="fa fa-user"></i> <?php echo lang("Email");?></a></li>
			<li><a href="/settings/general/seo"><i class="fa fa-user"></i> <?php echo lang("SEO");?></a></li>
			<li><a href="/settings/general/tool"><i class="fa fa-user"></i> <?php echo lang("Tools");?></a></li>
		</ul>
	</li>
	<li class="list-group-item"><a href="/create"><i class="fa fa-user"></i> <?php echo lang("Translations");?></a></li>
	<li class="list-group-item"><a href="/settings/users/manager"><i class="fa fa-user"></i> <?php echo lang("Users");?></a></li>
	<li class="list-group-item"><a href="/settings/users/groups"><i class="fa fa-user"></i> <?php echo lang("Groups");?></a></li>
	<li class="list-group-item"><a href="/settings/general/module"><i class="fa fa-user"></i> <?php echo lang("Modules");?></a>
		<ul>
			<?php foreach ($data as $key => $value) { ?>
			
			<li><a href="/settings/general/email"><i class="fa fa-user"></i> <?php echo lang("Email");?></a></li>
			<?php } ?>
			
		</ul>
	</li>
	<li class="list-group-item"><a href="/settings/general/template"><i class="fa fa-user"></i> <?php echo lang("Themes");?></a></li>
</ul>