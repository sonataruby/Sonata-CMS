
<div class="form-group">
    <label>Title</label>
    <input type="text" name="Seo[name]" id="basictitleSEO" class="form-control">
    <small class="form-text text-muted">Pages Title.</small>
</div>

<label for="basic-url">Your vanity URL</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3"><?php echo PUBLIC_URL;?>/</span>
  </div>
  <input type="text" name="Seo[urlrewrite]" class="form-control" id="basicurlSEO" aria-describedby="basic-addon3">
  <div class="input-group-append">
    <button type="button" class="btn btn-sm btn-info" id="makeURLSEO">Make</button>
  </div>
</div>





<div class="form-group">
    <label>Description</label>
    <textarea type="text" name="Seo[description]" class="form-control"></textarea>
    
</div>



<div class="form-group">
    <label>Keyword</label>
    <textarea type="text" name="Seo[keyword]" class="form-control"></textarea>
    
</div>

<h5>Image </h5>
<div class="form-group">
    <label>Image</label>
    <input type="text" name="Seo[image]" class="form-control">
    
</div>

<h5>Tag's </h5>
<div class="form-group">
    <label>Tag's</label>
    <input type="text" name="Seo[tags]" class="form-control">
    
</div>



<script type="text/javascript">
	$(document).ready(function(){
		$("#makeURLSEO").on("click", function(){
			var basicurlSEO = $("#basicurlSEO").val();
			var basictitleSEO = $("#basictitleSEO").val();
			var PageTitle = $("#PageTitle").val();
			$.post("/pages/manager/renderurl",
			  {
			    url: basicurlSEO,
			    name: basictitleSEO,
			    title : PageTitle
			  },
			  function(data, status){
			    alert("Data: " + data + "\nStatus: " + status);
			  });
			
		});
	});
</script>