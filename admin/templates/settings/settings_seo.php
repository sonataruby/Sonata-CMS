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
  <button type="submit" class="btn btn-primary"><?php echo lang("Save");?></button>
<?php echo form_close();?>