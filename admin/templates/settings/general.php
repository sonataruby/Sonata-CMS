<?php echo form_open();?>
  <div class="card mb-4">
    <div class="card-header"><?php echo lang("SiteTitle");?></div>
    <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Site Name</label>
          <input type="text" name="settings[Core][SiteTitle]" value="<?php echo @$data->SiteTitle;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
    </div>
  </div>
  
  <div class="card mb-4">
    <div class="card-header"><?php echo lang("SiteMeta");?></div>
    <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Header</label>
          <textarea name="settings[Core][HeaderMeta]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"><?php echo @$data->HeaderMeta;?></textarea>
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Footer</label>
          <textarea name="settings[Core][FooterMeta]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"><?php echo @$data->FooterMeta;?></textarea>
          
        </div>

    </div>
  </div>


  <div class="card mb-4">
    <div class="card-header"><?php echo lang("DateTime");?></div>
    <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo lang("Timeformat");?></label>
          <input type="text" name="settings[Core][Timeformat]" value="<?php echo @$data->Timeformat ? $data->Timeformat : "hh:mm:ss";?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo lang("Shortdateformat");?></label>
          <input type="text" name="settings[Core][Shortdateformat]" value="<?php echo @$data->Shortdateformat ? $data->Shortdateformat : "d-m-Y";?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo lang("Longdateformat");?></label>
          <input type="text" name="settings[Core][Longdateformat]" value="<?php echo @$data->Longdateformat ? $data->Longdateformat : "d-m-Y hh:mm:ss";?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header"><?php echo lang("NumberFormat");?></div>
    <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo lang("NumberFormat");?></label>
          <input type="text" name="settings[Core][NumberFormat]" value="<?php echo @$data->NumberFormat ? $data->NumberFormat : "000,000.00";?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
    </div>
  </div>


  <div class="card mb-4">
    <div class="card-header"><?php echo lang("Cookies");?></div>
    <div class="card-body">
        There are several laws in Europe about the use of cookies. With this Cookie-bar you fulfill the most strict law.
        <div class="form-group form-check">
          <input type="checkbox" name="settings[Core][CookiesBar]" <?php echo @$data->CookiesBar == 1 ? "checked" : "";?>  class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Show the cookie bar</label>
        </div>
    </div>
  </div>


  <button type="submit" class="btn btn-primary"><?php echo lang("Save");?></button>
<?php echo form_close();?>