<?php echo form_open("",["id" => "savecontent"]);?>
<div class="form-group">
  <label for="exampleInputEmail1">Page Name</label>
  <input type="text" name="Pages[title]" id="PageTitle" value="<?php echo @$record->title;?>" class="form-control">
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="homeContents-tab" data-toggle="tab" href="#homeContents" role="tab" aria-controls="homeContents" aria-selected="true">Contents</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="tabsimage-tab" data-toggle="tab" href="#tabsimage" role="tab" aria-controls="tabsimage" aria-selected="false"><i class="fa fa-image"></i> Image</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="tabsseo-tab" data-toggle="tab" href="#tabsseo" role="tab" aria-controls="tabsseo" aria-selected="false">SEO</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="tabssettings-tab" data-toggle="tab" href="#tabssettings" role="tab" aria-controls="tabssettings" aria-selected="false"><i class="fa fa-cogs"></i> Settings</a>
  </li>

  
</ul>
<div class="tab-content bg-white p-3 border-left border-right border-bottom" id="myTabContent">
  <div class="tab-pane fade show active" id="homeContents" role="tabpanel" aria-labelledby="homeContents-tab">
  	
  	Template : <a data-toggle="modal" data-target="#TemplateModal" href="#">Change Templates</a>
  	<div id="AttachContents">
  		
  	</div>

  </div>

  <div class="tab-pane fade" id="tabsimage" role="tabpanel" aria-labelledby="tabsimage-tab">
      <?php include __DIR__."/tabs_image.php";?>
  </div>

  <div class="tab-pane fade" id="tabsseo" role="tabpanel" aria-labelledby="tabsseo-tab">
      <?php include __DIR__."/tabs_seo.php";?>
  </div>
  

  <div class="tab-pane fade" id="tabssettings" role="tabpanel" aria-labelledby="tabssettings-tab">
      <?php include __DIR__."/tabs_settings.php";?>
  </div>

</div>
<?php echo form_close();?>

<script type="text/javascript">
	$(document).ready(function(){
		var LoaddingTemplate = function(layout="",pageid=0){
			var attachContent = $("#homeContents > #AttachContents");
			attachContent.load("/pages/manager/template/"+layout+"/"+pageid);
		};
		LoaddingTemplate("home");
		$(".btnChangeTemplate").on("click", function(){
			LoaddingTemplate();
		});
	});
</script>

<div class="modal fade" id="TemplateModal" tabindex="-1" role="dialog" aria-labelledby="TemplateModalExp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TemplateModalExp">Select Template</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              
                <?php for($i=1;$i<=4;$i++){ ?>
              <div class="col-6 mb-3">
                <div class="border" style="min-height: 100px;"></div>
              </div>
              <?php } ?>
              
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btnChangeTemplate" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="TemplateBlocks" tabindex="-1" role="dialog" aria-labelledby="TemplateBlocksExp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TemplateBlocksExp">Select Blocks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <select type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></select>
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>

		<div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <select type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></select>
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>


		<div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <select type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></select>
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btnChangeTemplate" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
