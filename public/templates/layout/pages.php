<div class="container">
	<div class="row d-flex mb-3">
		<div class="col-8">
			<img src="https://cdn2.slidemodel.com/wp-content/uploads/4010-01-animated-powerpoint-template-5.jpg" style="width:100%;">
		</div>
		<div class="col-4">
			<?php if(count($row->widget) > 0){ ?>
				<div class="card" style="height: 100%;">
					<div class="card-header">Widgets</div>
			<?php 
				getWidget($row->widget, "left");
			} 
			?>
			

				
				<?php if(count($row->widget) > 0){ ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<div><?php echo $row->data;?></div>
</div>
