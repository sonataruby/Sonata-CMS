<ul class="navbar-nav mr-auto">
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo site_url();?>"><?php echo lang("Apps.Home");?> <span class="sr-only">(current)</span></a>
  </li>
  <?php foreach ($node as $key => $value) { ?>
		
		<?php if(is_array($value["child"])  && count($value["child"]) > 0){ ?>
			<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdown<?php echo $value["id"];?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo @$value["name"];?></a>
		<?php
			makeULChild($value["child"],$value["id"]);
		?>
			</li>
		<?php
		}else{ ?>
			<li class="nav-item" style="border:0;"><a class="nav-link" href="<?php echo site_url(@$value["url"]);?>.html"><?php echo @$value["name"];?></a></li>
		<?php } ?>
	<?php } ?>
</ul>


<?php
if(!function_exists("makeULChild")){
	function makeULChild($arv=[],$parent=0, $class="dropdown-arrow"){
	echo '<ul class="dropdown-menu '.$class.'" aria-labelledby="navbarDropdown'.$parent.'">';
	foreach ($arv as $key => $value) {
		echo '<li class="dropdown-item"><a  href="'.site_url($value["url"]).'.html">'.$value["name"].'</a>';
		if(is_array($value["child"]) && $value["child"]){
			makeULChild($value["child"],$parent,"");
		}
		echo '<li>';
	}
	echo '</ul>';
	}
}
?>