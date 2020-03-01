<?php 
namespace Components;
use \Components\Items;
class Users extends Items{
	public function HeaderPanel($user=NULL){

		ob_start();
		
		?>

<div class="header">
		<div class="container">
			<div class="row d-flex align-items-xl-stretch">
				<div class="col-4 pt-3">
					<div class="media">
					  <img src="<?php echo $user->info()->avatar;?>" class="rounded-circle align-self-end mr-3" alt="...">
					  <div class="media-body">
					    <h5 class="mt-0"><?php echo $user->info()->first_name;?> <?php echo $user->info()->last_name;?></h5>
						    <div class="dropdown">
							  <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <?php echo $user->getSession()->child;?>
							  </button>
							  <div class="dropdown-menu dropdown-arrow w-sm" aria-labelledby="dropdownMenuButton">
							  	<div class="p-4">
								    <div class="row">
								    	<?php 

								    	foreach ($user->getChild() as $key => $value) { ?>
								    		
								    	<div class="col-6">
								    		<a href="/auth/focus/<?php echo $value->account_serial;?>">
									    		<h5><?php echo $value->account_serial;?></h5>
									    		<p>300 Point</p>
									    	</a>
								    	</div>
								    	<?php } ?>
								    	
								    </div>
							    </div>
							  </div>
							</div>
					  </div>
					</div>
				</div>
				<div class="col-8 border-right border-left bg-white pt-3">
					<div class="row">
						<div class="col-4">
							<div class="d-block">
								Order
								<h4>5</h4>
							</div>
							<div class="d-block">
								Balance
								<h4>500.000 VND</h4>
							</div>
						</div>
						<div class="col-4">
							<div class="d-block">
								Visist
								<h4>5</h4>
							</div>
							<div class="d-block">
								Rank
								<h4>500.000 VND</h4>
							</div>
						</div>
						<div class="col-4">
							<a href="#" class="btn btn-lg btn-primary btn-block">Open ADS</a>
							<div class="d-block">
								More Visist
								<h4>500.000 VND</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	$data = ob_end_flush();
	return $data;
	}

	/*
	Login Form
	*/

	public function LoginForm(){

	}

	public function RegisterForm(){

	}
}
?>