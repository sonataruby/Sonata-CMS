<link rel="stylesheet" href="/assent/js/dropzone.css" name="Customs CSS">
<div class="row d-flex">
	<div class="col-7">
		<div class="border"  style="min-height: 80vh;">
			
		</div>
	</div>
	<div class="col-5">
		<div style="height: 50%; margin-bottom: 30px;">
			<label class="fallback border" id="FileExtract">
				Drapfile Upload
				    <input name="file" type="file" multiple />
		    </label>
		</div>
		<div class="border" style="height: calc(50% - 30px);padding:30px;">
			
			<div class="form-group">
			    <label>Name</label>
			    <input type="text" id="fileName" class="form-control">
			</div>

			<div class="form-group">
			    <label>Description</label>
			    <input type="text" id="fileDescription" class="form-control">
			</div>

			<div class="form-group">
			    <label>Tags</label>
			    <input type="text" id="fileTags" class="form-control">
			</div>

			<button type="submit" class="btn btn-primary"><?php echo lang("Apps.Save");?></button>
		</div>
	</div>
</div>


<style type="text/css">
	.fallback{
		width: 100%;
		height: 100%;
		vertical-align: middle;
		line-height: 100%;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$('#FileExtract input[type="file"]').change(function(e){

            var fileName = e.target.files[0].name;
            $("#fileName").val(fileName);
            

        });
		
		
	});
</script>