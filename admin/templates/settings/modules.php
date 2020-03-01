<h4>Ready Install <div class="float-right"><a class="btn btn-info btn-sm">Upload Modules</a> <a class="btn btn-info btn-sm">Find Modules</a></div></h4>
<div class="card mb-4">
    <div class="card-header"><?php echo lang("Sendinge-mails");?></div>
    <div class="card-body">

    </div>
    <table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Version</th>
		      <th scope="col">Install</th>
		      <th scope="col">Update</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($data as $key => $value) { ?>
		    <tr>
		      <th scope="row"><?php echo $key + 1;?></th>
		      <td><?php echo $value->name;?><p><?php echo @$value->description;?></p></td>
		      <td><?php echo @$value->version;?></td>
		      <td><?php echo @$value->created_at;?></td>
		      <td><?php echo @$value->updated_at;?></td>
		      <td class="text-right">
		      	<?php if($value->is_system == 0){ ?>
			      	<a class="btn btn-sm btn-info" href="/settings/general/module/uninstall/<?php echo $value->name;?>">Un Install</a>
			    <?php } ?>
		      </td>
		    </tr>
		    <?php } ?>
		  </tbody>
		</table>
</div>

<h4>On Location</h4>
<div class="card mb-4">
    <div class="card-header"><?php echo lang("Sendinge-mails");?></div>
    <div class="card-body">
    </div>
    <table class="table">
		  <thead>
		    <tr>
		     
		      <th scope="col">Name</th>
		      <th scope="col">Version</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($dataLocale as $key => $value) { ?>
		  		
		    <tr>
		      
		      <td><?php echo @$value["name"];?><p><?php echo @$value["description"];?></p></td>
		      <td><?php echo @$value["version"];?></td>
		      <td class="text-right"><a class="btn btn-sm btn-info" href="/settings/general/module/install/<?php echo $key;?>">Install</a></td>
		    </tr>
		    <?php } ?>
		  </tbody>
		</table>
</div>