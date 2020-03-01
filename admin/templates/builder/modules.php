<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>


<form method="post">
  <div class="form-row">
    <div class="col form-group">
      <label for="exampleInputEmail1">Modules Name</label>
      <input type="text" name="module" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="col form-group">
      <label for="exampleInputEmail1">Database Name</label>
      <select type="text" name="databasedefault" class="form-control changeData" id="exampleInputEmail1" aria-describedby="emailHelp">
        <option value="">..</option>
        <?php foreach ($tables as $key => $value) { ?>
          <option value="<?php echo $value;?>"><?php echo $value;?></option>
        <?php }?>
      </select>
    </div>

  </div>
  <h4>Add Controller <button type="button" class="btn btn-info float-right btn-sm btnAdd">+ Add</button></h4>
  <div id="formcontroll"></div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>


<div class="card">
  <div class="card-header">Field Allow</div>
  <div class="card-body">
    <textarea class="form-control AllowFiled"></textarea>
  </div>
</div>
<script type="text/html" id="formcontroller">
  <div class="form-row">
    <div class="col form-group">
      Name Controller
      <input type="text" name="controller[]" class="form-control" placeholder="First name">
    </div>
    <div class="col form-group">
      Database Access
      <input type="text" name="database[]" class="form-control" placeholder="Last name">
    </div>
  </div>

</script>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery(".btnAdd").on("click", function(){
     
      jQuery("#formcontroll").append(jQuery("#formcontroller").html());
    });
    $(".changeData").on("change", function(){
     
      $.get("/render/builder/allowfield/"+$(".changeData").val(), function(data, status){
        $(".AllowFiled").val(data);
      });
      
    });
  });
</script>