<h5 class="title">Nav Pages</h5>
<ul class="list-group list-group-flush listTree">
	<li class="list-group-item"><a href="/pages/manager/"><?php echo lang("Apps.Dashboard");?></a></li>
	<?php foreach ($node as $key => $value) { ?>
		<li class="list-group-item" style="border:0;"><a href="/pages/manager/create/<?php echo @$value["id"];?>"><i class="fa fa-file-alt"></i> <?php echo @$value["name"];?></a></li>
		<?php if(is_array($value["child"])){ 
			makeULChild($value["child"]);
		} ?>
	<?php } ?>
	
</ul>
<h5 class="title border-top">Static Page</h5>
<ul class="list-group list-group-flush">
	<li class="list-group-item"><a href=""><?php echo lang("dashboard");?></a></li>
	<li class="list-group-item"><a href="/manager"><?php echo lang("manager");?></a></li>
	<li class="list-group-item"><a href="/create"><?php echo lang("create");?></a></li>
</ul>

<h5 class="title">Error Page</h5>
<ul class="list-group list-group-flush">
	<li class="list-group-item"><a href=""><?php echo lang("404");?></a></li>
	
</ul>

<?php
function makeULChild($arv=[]){
echo '<ul>';
foreach ($arv as $key => $value) {
	if($value["name"]){
		echo '<li><a href="/pages/manager/create/'.$value["id"].'">'.$value["name"].'</a><a href="/pages/manager/delete/'.$value["id"].'" class="float-right delete" style="padding-top:5px; padding-right:15px;"><span class="fa fa-trash"></span></a></li>';
		if(is_array($value["child"]) && $value["child"]){
			makeULChild($value["child"]);
		}
	}
}
echo '</ul>';
}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('a.delete').on("click", function (e) {
		    e.preventDefault();

		    var choice = confirm('<?php echo lang('Apps.ConfirmDelete');?>');

		    if (choice) {
		        window.location.href = $(this).attr('href');
		    }
		});
	});
</script>