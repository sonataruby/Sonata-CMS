<?php echo form_open();?>
  <div class="card mb-4">
    <div class="card-header"><?php echo lang("Sendinge-mails");?></div>
    <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo lang("Sendinge-mails");?></label>
          <select type="text" name="settings[Core][MailType]" class="form-control">
            <option value="sendmail" <?php echo @$data->MailType == "sendmail" ? "selected" : "";?>>sendmail</option>
            <option value="smpt" <?php echo @$data->MailType == "smpt" ? "selected" : "";?>>SMPT</option>
          </select>
          <small  class="form-text text-muted">You can send emails in 2 ways. By using PHP's built-in mail method or via SMTP. We advise you to use SMTP</small>
        </div>
    </div>
  </div>


  <div class="card mb-4">
    <div class="card-header"><?php echo lang("SMPT");?></div>
    <div class="card-body">
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Server & port</label>
          <div class="col-sm-8">
            <input type="text" name="settings[Core][SMPTServer]" value="<?php echo @$data->SMPTServer;?>" class="form-control" >
          </div>
          <div class="col-sm-2">
            <input type="text" name="settings[Core][SMPTPort]" value="<?php echo @$data->SMPTPort;?>" class="form-control" >
          </div>
        </div>


        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="settings[Core][SMPTUsername]" value="<?php echo @$data->SMPTUsername;?>">
          </div>
          
        </div>


        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="settings[Core][SMPTPassword]" value="<?php echo @$data->SMPTPassword;?>">
          </div>
          
        </div>

        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Security</label>
          <div class="col-sm-10">
            <select type="text" class="form-control" name="settings[Core][SMPTSecurity]">
              <option value="">..</option>
              <option value="tls" <?php echo @$data->SMPTSecurity == "tls" ? "selected" : "";?>>TLS</option>
              <option value="ssl" <?php echo @$data->SMPTSecurity == "ssl" ? "selected" : "";?>>SSL</option>
            </select>
          </div>
          
        </div>

    </div>
  </div>



  <div class="card mb-4">
    <div class="card-header"><?php echo lang("SendForm");?></div>
    <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Send Name</label>
          <input type="text" name="settings[Core][SendFormName]" value="<?php echo @$data->SendFormName;?>" class="form-control">
          <small  class="form-text text-muted">You can send emails in 2 ways. By using PHP's built-in mail method or via SMTP. We advise you to use SMTP</small>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Send form email</label>
          <input type="text" name="settings[Core][SendFormEmail]" value="<?php echo @$data->SendFormEmail;?>" class="form-control">
          <small  class="form-text text-muted">You can send emails in 2 ways. By using PHP's built-in mail method or via SMTP. We advise you to use SMTP</small>
        </div>

    </div>
  </div>



  <div class="card mb-4">
    <div class="card-header"><?php echo lang("SendTo");?></div>
    <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Send name</label>
          <input type="text" name="settings[Core][SendToName]" value="<?php echo @$data->SendToName;?>" class="form-control">
          <small  class="form-text text-muted">You can send emails in 2 ways. By using PHP's built-in mail method or via SMTP. We advise you to use SMTP</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Send to email</label>
          <input type="text" name="settings[Core][SendToEmail]" value="<?php echo @$data->SendToEmail;?>" class="form-control">
          <small  class="form-text text-muted">You can send emails in 2 ways. By using PHP's built-in mail method or via SMTP. We advise you to use SMTP</small>
        </div>
    </div>
  </div>


  <div class="card mb-4">
    <div class="card-header"><?php echo lang("ReplyTo");?></div>
    <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Send name</label>
          <input type="text" name="settings[Core][RelyToName]" value="<?php echo @$data->RelyToName;?>" class="form-control">
          <small  class="form-text text-muted">You can send emails in 2 ways. By using PHP's built-in mail method or via SMTP. We advise you to use SMTP</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Send to email</label>
          <input type="text" name="settings[Core][RelyToEmail]" value="<?php echo @$data->RelyToEmail;?>" class="form-control">
          <small  class="form-text text-muted">You can send emails in 2 ways. By using PHP's built-in mail method or via SMTP. We advise you to use SMTP</small>
        </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary"><?php echo lang("Save");?></button>
<?php echo form_close();?>


